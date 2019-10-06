<?php

namespace nhstore;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = [
		'name', 'acronym', 'slug','user_id'
	];
	/**
	* Hàm này dùng để lấy thẻ của sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function tag()
	{
    	# code...
		return $this->belongsToMany('App\Product', 'product_tags', 'tag_id', 'product_id');
	}
}
