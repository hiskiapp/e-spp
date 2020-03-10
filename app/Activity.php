<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
	protected $table = 'activity';

	protected $fillable = [
		'admins_id', 'page', 'description', 'method', 'url', 'ip', 'agent'
	];

	public function admin()
	{
		return $this->belongsTo('App\Admin','admins_id');
	}
}
