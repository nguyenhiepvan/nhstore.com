<?php

namespace nhstore\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
	protected $fillable = ['type','code','user_id','deleted_at'];
	public function user()
	{
		return $this->belongsTo('nhstore\Models\User');
	}
	public function products()
	{
		return $this->belongsTo('nhstore\Models\Product','receipt_id','product_id');
	}
}
