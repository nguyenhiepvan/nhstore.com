<?php

namespace nhstore\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'name', 'acronym', 'slug','user_id','parent_id','status','cover'
	];
	/******************************************************************************/
    // Hàm này để lấy danh mục con
	/******************************************************************************/
	public function children()
	{
		return $this->hasMany(self::class, 'parent_id');
	}
	/******************************************************************************/
    // Hàm này để lấy danh mục cha
	/******************************************************************************/
	public function parent()
	{
		return $this->belongsTo(self::class, 'parent_id');
	}
	/******************************************************************************/
	// hàm này để lấy ra user đã tạo
	/******************************************************************************/
	public function user()
	{
		return $this->belongsTo('nhstore\Models\User');
	}
	/******************************************************************************/
	// hàm này để lấy ra các sản phẩm thuộc category
	/******************************************************************************/
	public function products()
	{
		return $this->hasMany('nhstore\Models\Product');
	}

}
