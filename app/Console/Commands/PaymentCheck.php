<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Transaction;
use App\TransactionDetail;
use Carbon\Carbon;

class PaymentCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Payment';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Checking..............');

        $transactions = Transaction::where('status','Waiting Payment')
        ->where('payment_method','OVO')
        ->get();

        $count = 0;
        foreach ($transactions as $transaction) {
            $data = array(
                "search"  => array(
                    "date"            => array(
                        "from"    => Carbon::parse($transaction->created_at)->format('Y-m-d H:i:s'),
                        "to"      => Carbon::parse($transaction->expired_at)->format('Y-m-d H:i:s')
                    ),
                    "account_number"  => setting('ovo'),
                    "amount"          => $transaction->amount_verify
                )
            );

            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL             => "https://api.cekmutasi.co.id/v1/ovo/search",
                CURLOPT_POST            => true,
                CURLOPT_POSTFIELDS      => http_build_query($data),
                CURLOPT_HTTPHEADER      => ["Api-Key: ".env('CEKMUTASI_API'), "Accept: application/json"],
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_HEADER          => false,
                CURLOPT_IPRESOLVE       => CURL_IPRESOLVE_V4,
            ));
            $json = curl_exec($ch);
            curl_close($ch);

            $result = json_decode($json);

            if (count($result->response) != 0) {
                $set = Transaction::find($transaction->id);
                $set->status = "Success Payment";
                $set->approved_at = now();
                $set->save();

                $months = explode(',',$transaction->for_month);
                foreach($months as $row){
                    $detail = New TransactionDetail;
                    $detail->users_id = $transaction->users_id;
                    $detail->month = $row;
                    $detail->transactions_id = $transaction->id;
                    $detail->save();
                }

                $count += 1;
            }
        }

        $this->info('Done ^_^');
        $this->info('==============');
        $this->info($count.' Payment Successfully!');
    }
}
