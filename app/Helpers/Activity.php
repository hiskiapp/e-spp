<?php

namespace App\Helpers;

use Request;
use App\Activity as LogActivity;

class Activity
{
	public static function add($data)
	{
		$log 				= New LogActivity;
		$log->admins_id 	= auth('admin')->check() ? auth('admin')->user()->id : 1;
		$log->page 			= $data['page'];
		$log->description 	= $data['description'];
		$log->method 		= Request::method();
		$log->url 			= Request::fullUrl();
		$log->ip 			= Request::ip();
		$log->agent 		= Request::header('user-agent');
		$log->save();
	}

	public static function list()
	{
		if (auth('admin')->check()) {
			$data = LogActivity::where('admins_id', auth('admin')->user()->id)->latest()->get();
		}else{
			$data = LogActivity::latest()->get();
		}
		
		return $data;
	}

}