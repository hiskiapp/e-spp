<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $table = 'transactions';

	protected $fillable = [
		'users_id', 'spp_id', 'payment_method', 'amount', 'for_month', 'photo', 'description', 'status', 'expired_at', 'approved_at', 'expired_at', 'is_expired', 'admins_id'
	];

	public function user()
    {
        return $this->belongsTo('App\User','users_id');
    }

    public function spp()
    {
        return $this->belongsTo('App\Spp','spp_id');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin','admins_id');
    }
}
