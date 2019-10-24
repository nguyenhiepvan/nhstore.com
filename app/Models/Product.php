<?php
namespace nhstore\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'name', 'acronym', 'slug','material_id', 'brand_id', 'country_id','supplier_id', 'description','user_id','category_id','overview',
	];
	/**
	* Hàm này dùng để lấy thẻ của sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function tags()
	{
		return $this->belongsToMany('nhstore\Models\Tag', 'product_tags', 'tag_id', 'product_id');
	}
	/**
	* Hàm này dùng để kích cỡ sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function sizes()
	{
		return $this->belongsToMany('nhstore\Models\Size','product_sizes','product_id','size_id');
	}
	/**
	* Hàm này dùng để màu sắc sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function colors()
	{
		return $this->belongsToMany('nhstore\Models\Color','product_colors','product_id','color_id');
	}
	/**
	* Hàm này dùng để lấy giá của sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function prices()
	{
		return $this->hasMany('nhstore\Models\Price');
	}
	/**
	* Hàm này dùng để lấy ảnh của sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function images()
	{
		return $this->hasMany('nhstore\Models\Image');
	}
	/**
	* Hàm này dùng để lấy danh mục của sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function category()
	{
		return $this->belongsTo('nhstore\Models\Category');
	}
	/**
	* Hàm này dùng để lấy chất liệu của sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function material()
	{
		return $this->belongsTo('nhstore\Models\Material');
	}
	/**
	* Hàm này dùng để lấy xuất xứ của sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function country()
	{
		return $this->belongsTo('nhstore\Models\Country');
	}
	/**
	* Hàm này dùng để lấy thông tin người tạo sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function user()
	{
		return $this->belongsTo('nhstore\Models\User');
	}
	/**
	* Hàm này dùng để lấy thương hiệu của sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function brand()
	{
		return $this->belongsTo('nhstore\Models\Brand');
	}
	/**
	* Hàm này dùng để lấy nhà cung cấp sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function supplier()
	{
		return $this->belongsTo('nhstore\Models\Supplier');
	}
	/**
	* Hàm này dùng để lấy lượt xem sản phẩm
	*
	* @return \Illuminate\Http\Response
	*/
	public function view_counts()
	{
		return $this->hasMany('nhstore\Models\View_count');
	}
	// public function latest_record()
	// {
	// 	return $this->hasOne('nhstore\Models\View_count')->latest();
	// }
}