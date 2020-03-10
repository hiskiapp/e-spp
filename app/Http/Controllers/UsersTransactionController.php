<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\TransactionDetail;
use App\User;

class UsersTransactionController extends Controller
{
    public function getIndex(){
    	$data['page_title'] = "Transaksi";

        
        $data['is_waiting'] = Transaction::where('users_id', auth()->user()->id)
        ->where('status','Waiting Payment')
        ->first();

    	$user = User::where('id', auth()->user()->id)->first();
		$data['amount_spp'] = $user->spp->amount;

    	$detail = TransactionDetail::where('users_id', $user->id)
		->count();

    	if ($detail) {
			$data['last_month'] = spp_month($detail);
			$data['last_month_int'] = $detail;
		}else{
			$data['last_month'] = "Belum Ada";
			$data['last_month_int'] = 0;
		}

		$months = [];
		$i = $detail+1;
		for ($i > $detail; $i <= 12; $i++) { 
			$arr['value'] = $i;
			$arr['text'] = spp_month($i);
			$months[] = $arr;
		}

		$data['months'] = $months;

    	return view('users.transactions.index', $data);
    }

    public function postAdd(Request $request){
    	$user = User::where('id', auth()->user()->id)->first();

    	$new = New Transaction;
    	$new->users_id = $user->id;
    	$new->spp_id = $user->spp->id;
    	$new->payment_method = $request->payment_method;

    	$last_month = TransactionDetail::where('users_id', $user->id)->count();

    	$amount = ($request->for_month - $last_month) * $user->spp->amount;
    	$new->amount = $amount;
    	$new->amount_verify = $amount + rand(1,999);

    	$for_month = [];
    	for ($i=$last_month+1; $i <= $request->for_month; $i++) { 
    		$for_month[] = $i;
    	}

    	$new->for_month = implode(',', $for_month);
    	$new->description = $request->description;
    	$new->expired_at = now()->addDays(1);
    	$new->status = "Waiting Payment";
    	$new->save();

    	return redirect('history')->with([
    		'message_type' => 'success',
    		'message' => 'Invoice Telah Dibuat! Silahkan Melakukan Pembayaran Dengan Nominal Rp'.number_format($amount + substr($user->username, -3)).' Ke 085155064115 Sebelum Tanggal '.now()->addDays(1).' !'
    	]);
    }
}
