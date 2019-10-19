<?php

namespace nhstore\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $dates = ['deleted_at'];
	protected $table = 'images';
	protected $fillable = [
		'242X314','255X311','263X341','75X75','394X511','470X610','is_thumbnail', 'product_id','user_id',
	];
}
