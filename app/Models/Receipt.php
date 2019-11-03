<?php

namespace nhstore\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
	protected $fillable = ['type','code','product_id','color_id','size_id','quantitys','in_price','user_id'];
	public function user()
	{
		return $this->belongsTo('nhstore\Models\User');
	}
}
