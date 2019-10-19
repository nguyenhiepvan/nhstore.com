<?php

namespace nhstore\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use nhstore\Http\Controllers\Controller;
use nhstore\Models\Product;
use nhstore\Models\Material;
use nhstore\Models\Color;
use nhstore\Models\Country;
use nhstore\Models\Supplier;
use nhstore\Models\Size;
use nhstore\Models\Brand;
use nhstore\Models\Price;
use nhstore\Models\Category;
class ProductController extends Controller
{
	/******************************************************************************/
    // Hàm này dùng để hiển thị danh sách sản phẩm
	/******************************************************************************/
	public function index()
	{
		$products = Product::where([
			['status',1],
			['deleted_at',null]
		])->with(['prices','category','images'])
		->latest('created_at')
		->paginate(6);
		// dd($products);
		return view('fontend.products')->with([
			'products'=>$products,
			'sizes'=>Size::all(),
			'colors'=>Color::all(),
			'materials'=>Material::all(),
			'countries'=>Country::all(),
			'brands'=>Brand::all(),
		]);
	}
	/******************************************************************************/
    // Hàm này dùng để hiển thị danh sách sản phẩm full width
	/******************************************************************************/
	public function index_fullwidth()
	{
		$products = Product::where([
			['status',1],
			['deleted_at',null]
		])->with(['prices','category','images'])
		->latest('created_at')
		->paginate(15);
		// dd($products);
		return view('fontend.products-full-width')->with([
			'products'=>$products,
			'sizes'=>Size::all(),
			'colors'=>Color::all(),
			'materials'=>Material::all(),
			'countries'=>Country::all(),
			'brands'=>Brand::all(),
		]);
	}
	/******************************************************************************/
	// Hàm này dùng để xem chi tiết sản phẩm
	/******************************************************************************/
	public function show($slug)
	{
		$product = Product::with(['images','prices','sizes','colors','tags'])->where('slug',$slug)->firstOrFail();
		return view('fontend.product')->with(['product'=>$product]);
	}
	/******************************************************************************/
	// Hàm này dùng để lấy sản phẩm theo category
	/******************************************************************************/
	public function getProductsByCategory($slug = null)
	{
		$products = Category::with('products')->where('slug',$slug)->firstOrFail();
		view('fontend.products')->with([
			'products'=>$category->products->where([
				['status',1],
				['deleted_at',null]
			])->with(['prices','category'])
			->latest('created_at')
			->paginate(6),
			'category'=>$category
		]);
	}
}
