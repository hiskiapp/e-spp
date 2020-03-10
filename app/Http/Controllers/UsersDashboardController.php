<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transaction;
use App\TransactionDetail;

class UsersDashboardController extends Controller
{
    public function getIndex(){
    	$data['page_title'] = "Dashboard";
        $data['data'] = User::findOrFail(auth()->user()->id);
        $data['history'] = Transaction::where('status', 'Success Payment')->where('users_id', auth()->user()->id)->get();
        $data['total'] = Transaction::where('status', 'Success Payment')->where('users_id', auth()->user()->id)->sum('amount');
        $data['last_month'] =  TransactionDetail::where('users_id', auth()->user()->id)->count(); 

        foreach ($data['history'] as $d) {
            $implode = explode(',',$d->for_month);

            $namemonth = [];
            foreach ($implode as $key => $i) {
                $namemonth[] = spp_month($i);
            }

            $d->for_month = implode(', ', $namemonth);
        }

    	return view('users.dashboard.index', $data);
    }
}
