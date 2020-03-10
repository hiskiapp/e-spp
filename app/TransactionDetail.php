<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaction_detail';

	protected $fillable = [
		'users_id', 'month', 'transactions_id'
	];

	public function user()
    {
        return $this->belongsTo('App\User','users_id');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Transaction','transactions_id');
    }
}
