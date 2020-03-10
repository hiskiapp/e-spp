<?php

namespace App\Helpers;

use Request;
use App\Notification as Notifications;

class Notification
{
	public static function add($data)
	{
		$new 				= New Notifications;
		
		if (!empty($data['id'])) {
			$new->users_id = $data['id'];
		}else{
			$new->is_admin = 1;
		}

		$new->description = $data['description'];
		$new->url = $data['url'];
		$new->save();
	}

	public static function list($id = NULL)
	{
		if ($id) {
			$data = Notifications::where('users_id', $id)->get();
		}else{
			$data = Notifications::where('is_admin', 1)->get();
		}
		
		return $data;
	}


}