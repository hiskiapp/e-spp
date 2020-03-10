<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function getIndex(){
        $data['page_title'] = 'Web Pembayaran SPP Online';

        return view('welcome', $data);
    }
}
