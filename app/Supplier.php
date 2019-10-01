<?php

namespace nhstore;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'acronym', 'slug',
    ];
    /**
	* Hàm này dùng để lấy sản phẩm thuộc về nhà cung cấp này
	*
	* @return \Illuminate\Http\Response
	*/
    public function products()
    {
    	# code...
    	return $this->hasMany('nhstore\Product');
    }
}
