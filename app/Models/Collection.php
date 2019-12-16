<?php

namespace nhstore\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
	protected $fillable = [ 'name',
	'slug',
	'1920x1056',
	'450x362',
	'540x494',
	'540x340',
	'status',
	'deleted_at',
	'possion'];
}
