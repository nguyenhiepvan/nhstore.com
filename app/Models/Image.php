<?php

namespace nhstore\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'src', 'product_id','user_id',
	];
}
