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
    // Hàm này dùng để lấy thông tin sản phẩm
    public function product()
    {
        return $this->belongsTo('nhstore\Models\Product');
    }
     // Hàm này dùng để lấy thông tin màu sắc
    public function color()
    {
        return $this->belongsTo('nhstore\Models\Color');
    }
     // Hàm này dùng để lấy thông tin kích thước
    public function size()
    {
        return $this->belongsTo('nhstore\Models\Size');
    }
    /**
    * Hàm này dùng để lấy ảnh của sản phẩm
    *
    * @return \Illuminate\Http\Response
    */
    public function images()
    {
        return $this->hasMany('nhstore\Models\Image','product_id','product_id');
    }
}
