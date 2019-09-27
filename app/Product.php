<?php

namespace nhstore;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	/**
	* Hàm này dùng để lấy thương hiệu của sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function brand()
	{
    	# code...
		return $this->belongsTo('nhstore\Brand');
	}
	/**
	* Hàm này dùng để lấy nhà cung cấp sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function supplier()
	{
		# code...
		return $this->belongsTo('nhstore\Supplier');
	}
}
