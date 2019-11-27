<?php
namespace nhstore\Http\Controllers\Admin;
use Illuminate\Http\Request;
use nhstore\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use DebugBar\StandardDebugBar;
use Intervention\Image\ImageManagerStatic as Photo;
use Illuminate\Support\Facades\Cache;
use File;
use Auth;
use nhstore\Models\Product;
use nhstore\Models\Material;
use nhstore\Models\Color;
use nhstore\Models\Country;
use nhstore\Models\Supplier;
use nhstore\Models\Size;
use nhstore\Models\Brand;
use nhstore\Models\Price;
use nhstore\Models\Category;
use nhstore\Models\Tag;
use nhstore\Models\Image;
class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
/**
* Display a listing of the product.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
    if ($request->ajax()) {
        $products = Cache::remember('products', 3600, function() {
            return Product::with(['user'])->whereNull('deleted_at')->orderBy('created_at','DESC')->get();
        });
        return Datatables::of($products)
        ->addIndexColumn()
        ->editColumn('name', function ($product)
        {
            return '<a href="javascript:;" data-id="'.$product->id.'" class="detail-product" title="Xem chi tiết">'.$product->name.'</a>';
        })
        ->editColumn('user',function ($product)
        {
            return $product->user->name;
        })
        ->editColumn('created_at', function ($product)
        {
            return $product->created_at->diffForHumans();
        })
        ->editColumn('status', function ($product)
        {
            if ($product->status) {
                return '<center><input title="Hiển thị" type="checkbox" data-id="'.$product->id.'" name="status" class="js-switch" checked></center>';
            } else {
                return '<center><input title="Ẩn" type="checkbox" data-id="'.$product->id.'" name="status" class="js-switch"></center>';
            }
        })
        ->editColumn('action', function($product){
            $btn = '<center>';
            if(Auth::user()->can('update',$product)){
                $btn .= '<a href="products/'.$product->id.'/edit" class="edit btn btn-warning btn-sm" title="Sửa thông tin"><i class="fa  fa-edit"></i></a> ';
            } if(Auth::user()->can('delete',$product)){
                $btn .= '<a href="javascript:;" data-id="'.$product->id.'" class="delete btn btn-danger btn-sm" title="Xóa sản phẩm"><i class="fa  fa-trash"></i></a>';
            }
            return $btn .= "</center>";
        })
        ->rawColumns(['action','name','status'])
        ->make(true);
    }
    return view('backend.admin.products.productsList');
}
 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function create()
 {
    $materials = Cache::remember('materials', 3600, function() {
        return Material::whereNull('deleted_at')->get();
    });
    $brands = Cache::remember('brands', 3600, function() {
        return Brand::whereNull('deleted_at')->get();
    });
    $colors = Cache::remember('colors', 3600, function() {
        return Color::whereNull('deleted_at')->get();
    });
    $suppliers = Cache::remember('suppliers', 3600, function() {
        return Supplier::whereNull('deleted_at')->where('status',true)->get();
    });
    $categories = Cache::remember('categories', 3600, function() {
        return Category::whereNull('deleted_at')->where('status',true)->get();
    });
    $tags = Cache::remember('tags', 3600, function() {
        return Tag::whereNull('deleted_at')->get();
    });
    $sizes = Cache::remember('sizes', 3600, function() {
        return Size::whereNull('deleted_at')->get();
    });
    $countries = Cache::remember('countries', 3600, function() {
        return Country::whereNull('deleted_at')->get();
    });
    return view('backend/admin/products/product_add')
    ->with([
        // 'products'=>Product::whereNull('deleted_at')->where('status',true)->get(),
        'materials'=>$materials,
        'brands'=>$brands,
        'colors'=>$colors,
        'suppliers'=>$suppliers,
        'categories'=>$categories,
        'tags'=>$tags,
        'sizes'=>$sizes,
        'countries'=>$countries
    ]);
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
    // if(Auth::user()->can('create')){
    // dd($request->all());
 $request->validate([
    'slug'=>['required','max:255','unique:products'],
    'thumbnail'=>['required','max:255',],
    'material_id'=>['required'],
    'brand_id'=>['required'],
    'country_id'=>['required'],
    'supplier_id'=>['required'],
    'category_id'=>['required'],
]);
//Thêm sản phẩm
 $product = Product::create(array_merge($request->except(['_token','images','tag_id','color_id','size_id','thumbnail']),['user_id' => Auth::user()->id]));
 if (Cache::has('products')) {
    $products = Cache::get('products');
    $products->prepend($product);
    Cache::put('products', $products, 3600);
}
$this->addAttribute($request,$product->id,$product->user_id);
   // \Session::flash('status', 'Thêm mới thành công!');
return response()->json(['msg'=>!empty($product)]);
 // }
}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show(Request $request,$id)
{
    $product = Product::with(['images','prices','colors','sizes'])->find($id);
    $prices = $product->prices()->where([
        'deleted_at'=>null,
        // 'status'=>true,
    ]);
    $temp = $prices->where([
        ['color_id'=>NULL],
        ['size_id'=>NULL],
    ])->first();
    if (isset($request->color)||isset($request->size)) {
       $color = $request->color;
       $size = $request->size;
       if (isset($color) && isset($size)) {
        $price = $prices->where('color_id',$color)->where('size_id',$size)->first();
        if (isset($price)) {
            $quantities = $price->sum('quantity');
            $in_price = $price->in_price;
            $out_price = $price->out_price;
            $general_price = $price->general_price;
            $sale_price = $price->sale_price;
        }else{
            $quantities = 0;
            $in_price = $temp->in_price;
            $out_price = $temp->out_price;
            $general_price = $temp->general_price;
            $sale_price = $temp->sale_price;
        }
    }
    else if (isset($size)) {
        $price = $prices->where('size_id',$size)->get();
        if (isset($price)) {
            $quantities = $price->sum('quantity');
            $in_price = $price[0]->in_price;
            $out_price = $price[0]->out_price;
            $general_price = $price[0]->general_price;
            $sale_price = $price[0]->sale_price;
        }else{
            $quantities = 0;
            $in_price = $temp->in_price;
            $out_price = $temp->out_price;
            $general_price = $temp->general_price;
            $sale_price = $temp->sale_price;
        }
    }
    else if (isset($color)) {
        // dd($color);
        $price = $prices->where('color_id',$color)->get();
        // dd($price);
        if ($prices->count() != 0) {
            $quantities = $price->sum('quantity');
            $in_price = $price[0]->in_price;
            $out_price = $price[0]->out_price;
            $general_price = $price[0]->general_price;
            $sale_price = $price[0]->sale_price;
        }else{
            $quantities = 0;
            $in_price = $temp->in_price;
            $out_price = $temp->out_price;
            $general_price = $temp->general_price;
            $sale_price = $temp->sale_price;
        }
    }
    return response()->json([
        'quantities'=>$quantities,
        'in_price'=>number_format($in_price),
        'out_price'=>number_format($out_price),
        'general_price'=>number_format($general_price),
        'sale_price'=>number_format($sale_price),
    ]);
    // return redirect()->route('admin.products.index');
}
$quantities = $product->prices->sum('quantity');
$colors = $product->colors;
$sizes = $product->sizes;
return response()->json([
    'product'=>$product,
    'in_price'=>isset($temp)?number_format($temp->in_price):0,
    'out_price'=>isset($temp)?number_format($temp->out_price):0,
    'general_price'=>isset($temp)?number_format($temp->general_price):0,
    'sale_price'=>isset($temp)?number_format($temp->sale_price):0,
    'colors'=>$colors,
    'sizes'=>$sizes,
    'quantities'=>$quantities,
    'slides'=>$this->make_slide($product->images)
]);
}
/******************************************************************************/
// Hàm này dùng để tạo slide
/******************************************************************************/
public function make_slide($images)
{
    $ols = '<ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
    $items ='<div class="item active">
    <a data-fancybox="gallery" href="'.$images->where('is_thumbnail',true)->first()['470X610'].'"><img src="'.$images->where('is_thumbnail',true)->first()['470X610'].'"/></a>
    </div>';
    foreach ($images->where('is_thumbnail',false) as $key => $image) {
        $ols .='<li data-target="#carousel-example-generic" data-slide-to="'.($key+1).'" class=" more-item"></li>';
        $items .='<div class="item more-item"><a data-fancybox="gallery" href="'.$image['470X610'].'"><img src="'.$image['470X610'].'"></a></div>';
    }
    $ols .= '</ol>';
    $slides = '
    <div>
    <div class="box-body">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    '.$ols.'
    <div class="carousel-inner">
    '.$items.'
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="fa fa-angle-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="fa fa-angle-right"></span>
    </a>
    </div>
    </div>
    </div>';
    return $slides;
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit(Request $request,$id)
{
    // dd(Cache::has('products'));
    if (Cache::has('products'))
    {
        $product = Cache::get('products')->where('id',$id)->first();
    }
    else
    {
        $product = Product::with(['images','colors','tags','sizes','prices'])->find($id);
    }
    if($request->ajax()){
        $product = Cache::remember('product', 3600, function() use($id) {
            return  Product::with(['images','colors','tags','sizes','prices'])->find($id);
        });
        $tags = array();
        foreach ($product->tags as $value) {
            $tags[] = $value->id;
        }
        $colors = array();
        foreach ($product->colors as $value) {
            $colors[] = $value->id;
        }
        $sizes = array();
        foreach ($product->sizes as $value) {
            $sizes[] = $value->id;
        }
        $prices =$product->prices->where('size_id',NULL)->where('color_id',NULL);
        return response()->json([
            'product'=>$product,
            'images'=>$product->images->where('is_thumbnail',false),
            'thumbnail'=>$product->images->where('is_thumbnail',true)->first(),
            'tags'=>$tags,
        ]);
    }
    $materials = Cache::remember('materials', 3600, function() {
        return Material::whereNull('deleted_at')->get();
    });
    $brands = Cache::remember('brands', 3600, function() {
        return Brand::whereNull('deleted_at')->get();
    });
    $colors = Cache::remember('colors', 3600, function() {
        return Color::whereNull('deleted_at')->get();
    });
    $suppliers = Cache::remember('suppliers', 3600, function() {
        return Supplier::whereNull('deleted_at')->where('status',true)->get();
    });
    $categories = Cache::remember('categories', 3600, function() {
        return Category::whereNull('deleted_at')->where('status',true)->get();
    });
    $tags = Cache::remember('tags', 3600, function() {
        return Tag::whereNull('deleted_at')->get();
    });
    $sizes = Cache::remember('sizes', 3600, function() {
        return Size::whereNull('deleted_at')->get();
    });
    $countries = Cache::remember('countries', 3600, function() {
        return Country::whereNull('deleted_at')->get();
    });
    return view('backend/admin/products/product_edit')
    ->with([
        // 'products'=>Product::whereNull('deleted_at')->where('status',true)->get(),
        'materials'=>$materials,
        'brands'=>$brands,
        'colors'=>$colors,
        'suppliers'=>$suppliers,
        'categories'=>$categories,
        'tags'=>$tags,
        'sizes'=>$sizes,
        'countries'=>$countries
    ]);
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
    // dd($request->all());
    $request->validate([
        'slug'=>'max:255|unique:products,id,'.$id,
        'thumbnail'=>'max:255',
    ]);

    if (Cache::has('products'))
    {
        $product = Cache::get('products')->where('id',$id)->first();
    }
    else
    {
        $product = Product::with(['images','colors','tags','sizes','prices'])->find($id);
    }
    if(Auth::user()->can('update',$product)){
//Nếu thay đổi trạng thái hiển thị của sản phẩm
        if (isset($request->status)) {
// dd(($request->status == '0')?0:1);
            $product->update(['status'=>($request->status == '0')?0:1]);
            if (Cache::has('products')) {
                Cache::forget('products')->where('id',$id)->first();
                $products = Cache::get('products');
                $products->prepend($product);
                Cache::put('products', $products, 3600);
            }
        }
//Nếu thay đổi thông tin sản phẩm
        if(isset($request->name)||isset($request->slug)||isset($request->name)||isset($request->material_id)||isset($request->country_id)||isset($request->supplier_id)||isset($request->category_id)||isset($request->overview)||isset($request->description)){
            $product->update($request->except(['_token','_method','images','tag_id','color_id','size_id','thumbnail']));
            if (Cache::has('products')) {
                Cache::forget('products')->where('id',$id)->first();
                $products = Cache::get('products');
                $products->prepend($product);
                Cache::put('products', $products, 3600);
            }
        }
//Nếu thay đổi thumbnail
        if(isset($request->thumbnail)){
            $thumbnail = $product->images->where('is_thumbnail',true);
            if($thumbnail->count() != 0){
               if(File::exists($thumbnail[0]['242X314'])) {
                File::delete($thumbnail[0]['242X314']);
            }
            if(File::exists($thumbnail[0]['255X311'])) {
                File::delete($thumbnail[0]['255X311']);
            }
            if(File::exists($thumbnail[0]['263X341'])) {
                File::delete($thumbnail[0]['263X341']);
            }
            if(File::exists($thumbnail[0]['75X75'])) {
                File::delete($thumbnail[0]['75X75']);
            }
            if(File::exists($thumbnail[0]['394X511'])) {
                File::delete($thumbnail[0]['394X511']);
            }
            if(File::exists($thumbnail[0]['470X610'])) {
                File::delete($thumbnail[0]['470X610']);
            }
            $thumbnail->each->delete();
        }
    }
//Nếu thay đổi ảnh
// Phiên bản này đang xóa toàn bộ ảnh và thêm mới lại
    if (isset($request->images)) {
        $images = $product->images->where('is_thumbnail',false);
        foreach ($images as $image) {
            if(File::exists($image['242X314'])) {
                File::delete($image['242X314']);
            }
            if(File::exists($image['255X311'])) {
                File::delete($image['255X311']);
            }
            if(File::exists($image['263X341'])) {
                File::delete($image['263X341']);
            }
            if(File::exists($image['75X75'])) {
                File::delete($image['75X75']);
            }
            if(File::exists($image['394X511'])) {
                File::delete($image['394X511']);
            }
            if(File::exists($image['470X610'])) {
                File::delete($image['470X610']);
            }
        }
        $images->each->delete();
    }
//Nếu thay đổi thẻ
    if (isset($request->tag_id)) {
        \DB::table('product_tags')->where('product_id',$id)->delete();
    }
    $this->addAttribute($request,$product->id);
}
}
/******************************************************************************/
// Hàm này dùng để thêm thuộc tính của sản phẩm
/******************************************************************************/
public function addAttribute(Request $request,$product_id)
{
//Thêm thumbnail
    if (isset($request->thumbnail)) {
        Photo::configure(array('driver' => 'imagick'));
        $time = now()->timestamp;
        $img = Photo::make(public_path(parse_url($request->thumbnail, PHP_URL_PATH)))
        ->resize(242, 314)
        ->save('photos/product/'.$time.'_242X314.jpg');
        $img = Photo::make(public_path(parse_url($request->thumbnail, PHP_URL_PATH)))
        ->resize(255, 311)
        ->save('photos/product/'.$time.'_255X311.jpg');
        $img = Photo::make(public_path(parse_url($request->thumbnail, PHP_URL_PATH)))
        ->resize(263, 341)
        ->save('photos/product/'.$time.'_263X341.jpg');
        $img = Photo::make(public_path(parse_url($request->thumbnail, PHP_URL_PATH)))
        ->resize(75, 75)
        ->save('photos/product/'.$time.'_75X75.jpg');
        $img = Photo::make(public_path(parse_url($request->thumbnail, PHP_URL_PATH)))
        ->resize(394, 511)
        ->save('photos/product/'.$time.'_394X511.jpg');
        $img = Photo::make(public_path(parse_url($request->thumbnail, PHP_URL_PATH)))
        ->resize(470, 610)
        ->save('photos/product/'.$time.'_470X610.jpg');
        $image = Image::create([
            'product_id'=>$product_id,
            '242X314'=>'/photos/product/'.$time.'_242X314.jpg',
            '255X311'=>'/photos/product/'.$time.'_255X311.jpg',
            '263X341'=>'/photos/product/'.$time.'_263X341.jpg',
            '75X75'=>'/photos/product/'.$time.'_75X75.jpg',
            '394X511'=>'/photos/product/'.$time.'_394X511.jpg',
            '470X610'=>'/photos/product/'.$time.'_470X610.jpg',
            'user_id'=>Auth::user()->id,
            'is_thumbnail'=>true,
        ]);
    }
//Thêm ảnh sản phẩm
    if (isset($request->images)) {
        Photo::configure(array('driver' => 'imagick'));
        $time = now()->timestamp;
        $images = array_filter(explode(";",$request->images));
        if(!empty($images)){
            foreach ($images as $key => $image) {
                $img = Photo::make(public_path(parse_url($image, PHP_URL_PATH)))
                ->resize(470, 610)
                ->save('photos/product/'.($time+1+$key).'_470X610.jpg');
                Image::create([
                    'product_id'=>$product_id,
                    '470X610'=>'/photos/product/'.($time+1+$key).'_470X610.jpg',
                    'user_id'=>Auth::user()->id,
                ]);
            }
        };
    }
//Thêm thẻ sản phẩm
    if (isset($request->tag_id)) {
        // $tags = explode(",",$request->tag_id);;
        $tags = array_filter($request->tag_id);
        // dd($tags);
        if (!empty($tags)) {
            foreach ($tags as $tag) {
                \DB::table('product_tags')->insert([
                    'product_id' => $product_id,
                    'tag_id' => $tag
                ]);
            }
        }
    }
//Thêm màu sản phẩm
    if (isset($request->color_id)) {
        $colors=array_filter($request->color_id);
        if (!empty($colors)) {
            foreach ($colors as $color) {
                \DB::table('product_colors')->insert([
                    'product_id' => $product_id,
                    'color_id' => $color
                ]);
            }
        }
    }
//Thêm kích thước sản phẩm
    if (isset($request->size_id)) {
        $sizes=array_filter($request->size_id);
        if (!empty($sizes)) {
            foreach ($sizes as $size) {
                \DB::table('product_sizes')->insert([
                    'product_id' => $product_id,
                    'size_id' => $size
                ]);
            }
        }
    }
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
    // dd(Product::find($id));
    Product::find($id)->update(['deleted_at'=>now()]);
    \DB::table('images')->where('product_id',$id)->update(['deleted_at'=>now()]);
    \DB::table('product_colors')->where('product_id',$id)->update(['deleted_at'=>now()]);
    \DB::table('product_tags')->where('product_id',$id)->update(['deleted_at'=>now()]);
    \DB::table('product_prices')->where('product_id',$id)->update(['deleted_at'=>now()]);
    \DB::table('product_sizes')->where('product_id',$id)->update(['deleted_at'=>now()]);
}
}