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
use DebugBar\StandardDebugBar;
use Intervention\Image\ImageManager;
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
            $products = Product::with(['user'])->where('status',true)->whereNull('deleted_at')->get();
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
             $btn = '<a href="javascript:;" class="edit btn btn-warning btn-sm" title="Sửa thông tin"><i class="fa  fa-edit"></i></a>
             <a href="javascript:;" class="delete btn btn-danger btn-sm" title="Xóa sản phẩm"><i class="fa  fa-trash"></i></a>';
             return $btn;
         })
            ->rawColumns(['action','name','status'])
            ->make(true);
        }
        return view('backend.admin.productsList')
        ->with([
            'materials'=>Material::all(),
            'brands'=>Brand::all(),
            'colors'=>Color::all(),
            'suppliers'=>Supplier::all(),
            'categories'=>Category::all(),
            'tags'=>Tag::all(),
            'sizes'=>Size::all(),
            'countries'=>Country::all()
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
        $request->validate([
            'slug'=>['required','max:255','unique:products'],
            'acronym'=>['required','max:255','unique:products'],
        ]);
        //Thêm sản phẩm
        $product = Product::create($request->except(['_token','images','tag_id','color_id','size_id','thumbnail']));
        //Thêm ảnh sản phẩm
        $img = Image::make($request->thumbnail);
        $img->resize(242, 314);
        $img->save('public/photos/product/'.$product->slug.'_242x314.jpg');
        $img->resize(255, 311);
        $img->save('public/photos/product/'.$product->slug.'_255x311.jpg');
        $img->resize(263, 341);
        $img->save('public/photos/product/'.$product->slug.'_263x341.jpg');
        $img->resize(75, 75);
        $img->save('public/photos/product/'.$product->slug.'_75x75.jpg');
        $img->resize(394, 511);
        $img->save('public/photos/product/'.$product->slug.'_394x511.jpg');
        $img->resize(470, 610);
        $img->save('public/photos/product/'.$product->slug.'_470x610.jpg');
        Image::create([
            'product_id'=>$product->id,
            '242x314'=>'/photos/product/'.$product->slug.'_242x314.jpg',
            '255x311'=>'/photos/product/'.$product->slug.'_255x311.jpg',
            '263x341'=>'/photos/product/'.$product->slug.'_263x341.jpg',
            '75x75'=>'/photos/product/'.$product->slug.'_75x75.jpg',
            '394x511'=>'/photos/product/'.$product->slug.'_394x511.jpg',
            '470x610'=>'/photos/product/'.$product->slug.'_470x610.jpg',
            'user_id'=>$product->user_id,
            'is_thumbnail'=>true,
        ]);
        if(!empty($images)){
            foreach ($images as $key => $image) {
                $img = Image::make($image);
                $img->resize(470, 610);
                $img->save('public/photos/product/'.$product->slug.$key.'_470x610.jpg');
                Image::create([
                    'product_id'=>$product->id,
                    '470x610'=>'/photos/product/'.$product->slug.$key.'_470x610.jpg',
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
        if (!empty($request->tag_id)) {
           $tags = $request->tag_id;
           foreach ($tags as $tag) {
            \DB::table('product_tags')->insert([
                'product_id' => $product->id,
                'tag_id' => $tag
            ]);
        }
    }
            //Thêm màu sản phẩm
    if (!empty($request->color_id)) {
        $colors = $request->color_id;
        foreach ($colors as $color) {
            \DB::table('product_colors')->insert([
                'product_id' => $product->id,
                'color_id' => $color
            ]);
        }
    }
                //Thêm kích thước sản phẩm
    if (!empty($request->size_id)) {
     $sizes = $request->size_id;
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
        //
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