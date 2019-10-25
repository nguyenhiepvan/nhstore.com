<?php
namespace nhstore\Http\Controllers\Admin;
use Illuminate\Http\Request;
use nhstore\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
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
use Illuminate\Support\Facades\Storage;
use DebugBar\StandardDebugBar;
use Intervention\Image\ImageManagerStatic as Photo;
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
            $products = Product::with(['user'])->where('status',true)->whereNull('deleted_at')->orderBy('created_at','DESC')->get();
            return Datatables::of($products)
            ->addIndexColumn()
            ->editColumn('name', function ($product)
            {
                # code...
                return '<a href="javascript:;" data-id="'.$product->id.'" class="detail-product" title="Xem chi tiết">'.$product->name.'</a>';
            })
            ->editColumn('user',function ($product)
            {
                # code...
                // $fancy = '<a data-fancybox="gallery" href="'.$product->thumbnail.'"><img src="'.$product->thumbnail.'" alt="" style="max-height:100px;" title="'.$product->slug.'"/></a>';
                return $product->user->name;
            })
            ->editColumn('created_at', function ($product)
            {
                return $product->created_at;
            })
            ->editColumn('status', function ($product)
            {
               if ($product->status) {
                return '<input type="checkbox" data-id="'.$product->id.'" name="status" class="js-switch product-show" checked>';
            } else {
                return '<input type="checkbox" data-id="'.$product->id.'" name="status" class="js-switch product-show">';
            }
        })
            ->editColumn('action', function($product){
             $btn = '<a href="javascript:;" data-id="'.$product->id.'" class="edit btn btn-warning btn-sm" title="Sửa thông tin"><i class="fa  fa-edit"></i></a>
             <a href="javascript:;" data-id="'.$product->id.'" class="delete btn btn-danger btn-sm" title="Xóa sản phẩm"><i class="fa  fa-trash"></i></a>';
             return $btn;
         })
            ->rawColumns(['action','name','status'])
            ->make(true);
        }
        return view('backend.admin.productsList')
        ->with([
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
        $images = array_filter(explode(";",$request->images));
        $tags=array_filter($request->tag_id);
        $colors=array_filter($request->color_id);
        $sizes=array_filter($request->size_id);
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
        //Thêm ảnh sản phẩm
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
            'product_id'=>$product->id,
            '242X314'=>'/photos/product/'.$time.'_242X314.jpg',
            '255X311'=>'/photos/product/'.$time.'_255X311.jpg',
            '263X341'=>'/photos/product/'.$time.'_263X341.jpg',
            '75X75'=>'/photos/product/'.$time.'_75X75.jpg',
            '394X511'=>'/photos/product/'.$time.'_394X511.jpg',
            '470X610'=>'/photos/product/'.$time.'_470X610.jpg',
            'user_id'=>$product->user_id,
            'is_thumbnail'=>true,
        ]);
        if(!empty($images)){
            foreach ($images as $key => $image) {
                $img = Photo::make(public_path(parse_url($image, PHP_URL_PATH)))
                ->resize(470, 610)
                ->save('photos/product/'.($time+1+$key).'_470X610.jpg');
                Image::create([
                    'product_id'=>$product->id,
                    '470X610'=>'/photos/product/'.($time+1+$key).'_470X610.jpg',
                    'user_id'=>$product->user_id,
                ]);
            }
        };
        //Thêm giá sản phẩm
        Price::create([
            'product_id' => $product->id,
            'in_price' => !empty($request->in_price)?intval(str_replace(',', '', $request->in_price)):0,
            'out_price' => !empty($request->out_price)?intval(str_replace(',', '', $request->out_price)):0,
            'general_price' => !empty($request->general_price)?intval(str_replace(',', '', $request->general_price)):0,
        ]);
        //Thêm thẻ sản phẩm
        if (!empty($tags)) {
            foreach ($tags as $tag) {
                \DB::table('product_tags')->insert([
                    'product_id' => $product->id,
                    'tag_id' => $tag
                ]);
            }
        }
                //Thêm màu sản phẩm
        if (!empty($colors)) {
            foreach ($colors as $color) {
                \DB::table('product_colors')->insert([
                    'product_id' => $product->id,
                    'color_id' => $color
                ]);
            }
        }
                    //Thêm kích thước sản phẩm
        if (!empty($sizes)) {
           foreach ($sizes as $size) {
            \DB::table('product_sizes')->insert([
                'product_id' => $product->id,
                'size_id' => $size
            ]);
        }
    }
    return response()->json(['msg'=>!empty($product)]);
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with(['images','prices','colors','sizes'])->find($id);
        $prices = $product->prices->where('color_id',null)->where('size_id',null)->first();
        $quantities = $product->prices->sum('quantity');
        $colors = $product->colors;
        $sizes = $product->sizes;
        return response()->json([
            'product'=>$product,
            'prices'=>$prices,
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
        return response()->json([
            'product'=>$product,
            'images'=>$product->images->where('is_thumbnail',false),
            'thumbnail'=>$product->images->where('is_thumbnail',true),
            'tags'=>$product->tags,
            'sizes'=>$product->sizes,
            'prices'=>$product->prices,
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
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}