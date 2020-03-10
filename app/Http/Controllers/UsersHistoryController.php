<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\TransactionDetail;

class UsersHistoryController extends Controller
{
	public function getIndex(){
		$data['page_title'] = "History";

		$data['data'] = Transaction::where('users_id', auth()->user()->id)
		->orderBy('created_at', 'desc')
		->get();

		foreach ($data['data'] as $d) {
            $implode = explode(',',$d->for_month);

            $namemonth = [];
            foreach ($implode as $key => $i) {
                $namemonth[] = spp_month($i);
            }

            $d->for_month = implode(', ', $namemonth);

            if ($d->status == "Waiting Payment") {
            	$d->badge = "warning";
            }elseif ($d->status == "Success Payment") {
            	$d->badge = "success";
            }else{
            	$d->badge = "default";
            }
        }

		return view('users.history.index', $data);
	}
}
