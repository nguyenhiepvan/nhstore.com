<?php

namespace nhstore\Models;

use Illuminate\Database\Eloquent\Model;

class View_count extends Model
{
	protected $fillable = [
		'product_id', 'views',
	];
}
