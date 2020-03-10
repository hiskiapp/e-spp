<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rombel;
use App\Spp;

class DashboardController extends Controller
{
    public function getIndex(){
    	$data['page_title'] = 'Dashboard';
    	$data['incoming'] = 0;
    	$data['user'] = User::count();
    	$data['rombel'] = Rombel::count();
    	$data['spp'] = Spp::count();

    	return view('dashboard.index', $data);
    }
}
