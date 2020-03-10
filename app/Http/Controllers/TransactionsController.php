<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\TransactionDetail;
use App\User;
use Activity;

class TransactionsController extends Controller
{
	public function getIndex(){
    	$data['page_title'] = "Transaksi";
    	$data['students'] = User::all();

    	return view('transactions.index', $data);
    }

    public function postAdd(Request $request){
    	$user = User::findOrFail($request->users_id);
    	$tdetail = TransactionDetail::where('users_id', $user->id)->count();

    	$data = New Transaction;
    	$data->users_id = $user->id;
    	$data->spp_id = $user->spp_id;
    	$data->payment_method = "Cash";
    	$data->amount = $request->total_spp;

    	$for_month = [];
    	for ($i=$tdetail+1; $i <= $request->for_month; $i++) { 
    		$for_month[] = $i;
    	}

    	$data->for_month = implode(',', $for_month);
    	$data->description = "-";
        $data->status = "Success Payment";
    	$data->approved_at = now();
    	$data->admins_id = auth('admin')->user()->id;
    	$data->save();

    	foreach ($for_month as $row) {
    		$detail = New TransactionDetail;
    		$detail->users_id = $user->id;
    		$detail->month = $row;
    		$detail->transactions_id = $data->id;
    		$detail->save();
    	}

        Activity::add([
            'page' => 'Transaksi',
            'description' => 'Menambahkan Transaksi Baru: '.$user->name
        ]);

    	return redirect()->back()->with([
            'message_type' => 'success',
            'message'   => 'Transaksi Berhasil!'
        ]);
    }
}
