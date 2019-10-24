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
	public function index(Request $request)
	{
		$sort = $request->sort;
		$prices = $request->price;
		$style = $request->style;
		$products = Price::join('products','product_prices.product_id','=','products.id')->where([
			['product_prices.color_id',null],
			['product_prices.size_id',null],
			['products.status',1],
			['products.deleted_at',null]]);
		if (isset($prices)) {
			$prices = explode("-", $prices);
			$products = $products->where([
				['product_prices.out_price','>=',$prices[0]],
				['product_prices.out_price','<=',$prices[1]],
			]);
		}
		switch ($sort) {
			case 'newest':
			case null:
			$products = $products->latest('products.created_at')
			;
			break;
			case 'oldest':
			$products = $products->oldest('products.created_at')
			;
			break;
			case 'popularity':
			$products = $products->join('view_counts','view_counts.product_id','=','product_prices.product_id')->whereDate('view_counts.created_at',today())->orderBy('view_counts.views','desc');
			break;
			case 'pricedesc':
			$products = $products->orderBy('product_prices.out_price','desc');
			break;
			case 'priceasc':
			$products = $products->orderBy('product_prices.out_price','asc');
			break;
			default:
			return view('fontend.404');
			break;
		}
		switch ($style) {
			case null:
			case '2col':
			return view('fontend.products')->with([
				'products'=>$products->paginate(6),
				'sizes'=>Size::all(),
				'colors'=>Color::all(),
				'materials'=>Material::all(),
				'countries'=>Country::all(),
				'brands'=>Brand::all(),
			]);
			break;
			case 'fw':
			return view('fontend.products-full-width')->with([
				'products'=>$products->paginate(15),
				'sizes'=>Size::all(),
				'colors'=>Color::all(),
				'materials'=>Material::all(),
				'countries'=>Country::all(),
				'brands'=>Brand::all(),
			]);
			default:
			return view('fontend.404');
			break;
		}
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
		$category = Category::with('products')->where('slug',$slug)->firstOrFail();
		// dd($category->products()->paginate(6));
		return view('fontend.products')->with([
			'products'=>$category->products()
			->paginate(6),
			'category'=>$category,
			'sizes'=>Size::all(),
			'colors'=>Color::all(),
			'materials'=>Material::all(),
			'countries'=>Country::all(),
			'brands'=>Brand::all(),
		]);
	}
}
