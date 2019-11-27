<?php

namespace nhstore\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
     protected $fillable = [
    	'product_id',
    	'color_id',
    	'size_id',
        'quantities',
        'start_salse',
        'end_salse',
    ];
}
