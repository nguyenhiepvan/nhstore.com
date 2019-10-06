<?php

namespace nhstore;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
		'name', 'acronym', 'slug','material_id', 'brand_id', 'country_id','supplier_id', 'description', 'thumbnail','user_id','category_id'
	];
	/**
	* Hàm này dùng để lấy thẻ của sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function tag()
	{
    	# code...
		return $this->belongsToMany('App\Tag', 'product_tags', 'product_id', 'tag_id');
	}
	/**
	* Hàm này dùng để ảnh của sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function image()
	{
    	# code...
		return $this->hasMany('nhstore\Image');
	}
	/**
	* Hàm này dùng để lấy danh mục của sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function category()
	{
    	# code...
		return $this->belongsTo('nhstore\Category');
	}
	/**
	* Hàm này dùng để lấy chất liệu của sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function material()
	{
    	# code...
		return $this->belongsTo('nhstore\Material');
	}
	/**
	* Hàm này dùng để lấy xuất xứ của sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function country()
	{
    	# code...
		return $this->belongsTo('nhstore\Country');
	}
	/**
	* Hàm này dùng để lấy thông tin người tạo sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function user()
	{
    	# code...
		return $this->belongsTo('nhstore\User');
	}
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
