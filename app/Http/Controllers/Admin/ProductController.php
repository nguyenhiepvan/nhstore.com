<?php
namespace nhstore\Http\Controllers\Admin;
use Illuminate\Http\Request;
use nhstore\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use DebugBar\StandardDebugBar;
use Intervention\Image\ImageManagerStatic as Photo;
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
        $products = Product::with(['user'])->whereNull('deleted_at')->orderBy('created_at','DESC')->get();
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
                return '<input title="Hiển thị" type="checkbox" data-id="'.$product->id.'" name="status" class="js-switch product-show" checked>';
            } else {
                return '<input title="Ẩn" type="checkbox" data-id="'.$product->id.'" name="status" class="js-switch product-show">';
            }
        })
        ->editColumn('action', function($product){
            $btn = '';
            if(Auth::user()->can('update',$product)){
                $btn .= '<a href="javascript:;" data-id="'.$product->id.'" class="edit btn btn-warning btn-sm" title="Sửa thông tin"><i class="fa  fa-edit"></i></a> ';
            } if(Auth::user()->can('delete',$product)){
                $btn .= '<a href="javascript:;" data-id="'.$product->id.'" class="delete btn btn-danger btn-sm" title="Xóa sản phẩm"><i class="fa  fa-trash"></i></a>';
            }
            return $btn;
        })
        ->rawColumns(['action','name','status'])
        ->make(true);
    }
    return view('backend.admin.productsList')
    ->with([
        'products'=>Product::whereNull('deleted_at')->where('status',true)->get(),
        'materials'=>Material::whereNull('deleted_at')->get(),
        'brands'=>Brand::whereNull('deleted_at')->get(),
        'colors'=>Color::whereNull('deleted_at')->get(),
        'suppliers'=>Supplier::whereNull('deleted_at')->where('status',true)->get(),
        'categories'=>Category::whereNull('deleted_at')->where('status',true)->get(),
        'tags'=>Tag::whereNull('deleted_at')->get(),
        'sizes'=>Size::whereNull('deleted_at')->get(),
        'countries'=>Country::whereNull('deleted_at')->get()
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
    if(Auth::user()->can('create')){
     $request->validate([
        'slug'=>['required','max:255','unique:products'],
        'acronym'=>['required','max:255','unique:products'],
        'thumbnail'=>['required','max:255',],
        'material_id'=>['required'],
        'brand_id'=>['required'],
        'country_id'=>['required'],
        'supplier_id'=>['required'],
        'category_id'=>['required'],
    ]);
//Thêm sản phẩm
     $product = Product::create($request->except(['_token','images','tag_id','color_id','size_id','thumbnail']));
     $this->addAttribute($request,$product->id,$product->user_id);
     return response()->json(['msg'=>!empty($product)]);
 }
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
        'status'=>true,
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
    'in_price'=>number_format($temp->in_price),
    'out_price'=>number_format($temp->out_price),
    'general_price'=>number_format($temp->general_price),
    'sale_price'=>number_format($temp->sale_price),
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
public function edit($id)
{
    $product = Product::with(['images','colors','tags','sizes','prices'])->find($id);
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
        'thumbnail'=>$product->images->where('is_thumbnail',true),
        'tags'=>$tags,
        'sizes'=>$sizes,
        'colors'=>$colors,
        'general_price'=>number_format($prices[0]->general_price),
        'in_price'=>number_format($prices[0]->in_price),
        'out_price'=>number_format($prices[0]->out_price),
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
    $request->validate([
        'slug'=>['max:255','unique:products,'.$id],
        'acronym'=>['max:255','unique:products,'.$id],
        'thumbnail'=>['max:255'],
    ]);
    $product = Product::with(['images','prices'])->find($id);
    if(Auth::user()->can('update',$product)){
//Nếu thay đổi trạng thái hiển thị của sản phẩm
        if (isset($request->status)) {
// dd(($request->status == '0')?0:1);
            $product->update(['status'=>($request->status == '0')?0:1]);
            $product->price->update(['status'=>($request->status == '0')?0:1]);
        }
//Nếu thay đổi thông tin sản phẩm
        if(isset($request->name)||isset($request->slug)||isset($request->acronym)||isset($request->name)||isset($request->material_id)||isset($request->country_id)||isset($request->supplier_id)||isset($request->category_id)){
            $product->update($request->except(['_token','_method','images','tag_id','color_id','size_id','thumbnail','description-edit']));
        }
//Nếu thay đổi thumbnail
        if(isset($request->thumbnail)){
            $thumbnail = $product->images->where('is_thumbnail',true);
            if(File::exists($thumbnail['242X314'])) {
                File::delete($thumbnail['242X314']);
            }
            if(File::exists($thumbnail['255X311'])) {
                File::delete($thumbnail['255X311']);
            }
            if(File::exists($thumbnail['263X341'])) {
                File::delete($thumbnail['263X341']);
            }
            if(File::exists($thumbnail['75X75'])) {
                File::delete($thumbnail['75X75']);
            }
            if(File::exists($thumbnail['394X511'])) {
                File::delete($thumbnail['394X511']);
            }
            if(File::exists($thumbnail['470X610'])) {
                File::delete($thumbnail['470X610']);
            }
            $thumbnail->each->delete();
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
//Nếu thay đổi màu sắc
        if (isset($request->color_id)) {
            \DB::table('product_colors')->where('product_id',$id)->delete();
        }
//Nếu thay đổi kích thước
        if (isset($request->size_id)) {
            \DB::table('product_sizes')->where('product_id',$id)->delete();
        }
//Nếu thay đổi giá
        if (isset($request->in_price)  && isset($request->out_price) && isset($request->general_price)) {
            $product->prices->where('size_id',NULL)->where('color_id',NULL)->delete();
        }
        $this->addAttribute($request,$product->id,$product->user_id);
    }
}
/******************************************************************************/
// Hàm này dùng để thêm thuộc tính của sản phẩm
/******************************************************************************/
public function addAttribute(Request $request,$product_id,$user_id)
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
        Image::create([
            'product_id'=>$product_id,
            '242X314'=>'/photos/product/'.$time.'_242X314.jpg',
            '255X311'=>'/photos/product/'.$time.'_255X311.jpg',
            '263X341'=>'/photos/product/'.$time.'_263X341.jpg',
            '75X75'=>'/photos/product/'.$time.'_75X75.jpg',
            '394X511'=>'/photos/product/'.$time.'_394X511.jpg',
            '470X610'=>'/photos/product/'.$time.'_470X610.jpg',
            'user_id'=>$user_id,
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
                    'user_id'=>$user_id,
                ]);
            }
        };
    }
//Thêm giá sản phẩm
    if (isset($request->in_price)  && isset($request->out_price) && isset($request->general_price)) {
        Price::create([
            'product_id' => $product_id,
            'in_price' => intval(str_replace(',', '', $request->in_price)),
            'out_price' => intval(str_replace(',', '', $request->out_price)),
            'general_price' => intval(str_replace(',', '', $request->general_price)),
        ]);
    }
//Thêm thẻ sản phẩm
    if (isset($request->tag_id)) {
        $tags=array_filter($request->tag_id);
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
    Product::find($id)->update(['deleted_at'=>now()]);
    \DB::table('images')->where('product_id',$id)->update(['deleted_at'=>now()]);
    \DB::table('product_colors')->where('product_id',$id)->update(['deleted_at'=>now()]);
    \DB::table('product_tags')->where('product_id',$id)->update(['deleted_at'=>now()]);
    \DB::table('product_prices')->where('product_id',$id)->update(['deleted_at'=>now()]);
    \DB::table('product_sizes')->where('product_id',$id)->update(['deleted_at'=>now()]);
}
}