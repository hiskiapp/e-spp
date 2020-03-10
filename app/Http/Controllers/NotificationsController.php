<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notif;

class NotificationsController extends Controller
{
    public function getIndex(){
    	$data['page_title'] = "List Notifikasi";
    	$data['data'] = Notif::list();

    	return view('notifications.index', $data);
    }
}
