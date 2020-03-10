<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Activity;

class ActivityController extends Controller
{
    public function getIndex(){
    	$data['page_title'] = "Log Activity";
    	$data['data'] = Activity::list();

    	return view('activity.index', $data);
    }
}
