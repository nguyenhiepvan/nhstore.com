<?php

namespace nhstore\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = [
		'src', 'product_id','user_id',
	];
}
