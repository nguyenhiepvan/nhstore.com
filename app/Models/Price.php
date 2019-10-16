<?php

namespace nhstore\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $dates = ['deleted_at'];
    protected $table = 'product_prices';
    protected $fillable = [
    	'product_id',
    	'color_id',
    	'size_id',
    	'in_price',
        'general_price',
    	'out_price',
    	'sale_price',
    	'status',
        'quantity',
    ];
}
