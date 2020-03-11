<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Transaction;

class PaymentFailed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:failed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking Payment Failed';

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

        $count = 0;
        $transactions = Transaction::where('status','Waiting Payment')->get();

        foreach ($transactions as $transaction) {
            if ($transaction->expired_at <= now()->format('Y-m-d H:i:s')) {
                $update = Transaction::find($transaction->id);
                $update->status = "Failed";
                $update->is_expired = now();
                $update->save();

                $count += 1;
            }
        }

        $this->info('Done ^_^');
        $this->info('====================');
        $this->info($count.' Payment Failed!');
    }
}
