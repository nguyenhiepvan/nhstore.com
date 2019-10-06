<?php

namespace nhstore;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	protected $fillable = [
        'name', 'acronym', 'slug','user_id',
    ];
	/**
	* Hàm này dùng để lấy sản phẩm thuộc về thương hiệu này
	*
	* @return \Illuminate\Http\Response
	*/
    public function products()
    {
    	# code...
    	return $this->hasMany('nhstore\Product');
    }
}
