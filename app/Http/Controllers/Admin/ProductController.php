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
        $tags = $request->tag_id;
        $colors = $request->color_id;
        $sizes = $request->size_id;
        $request->validate([
            'slug'=>['required','string','unique:brands'],
            'acronym'=>['required','string','unique:brands'],
        ]);
        //Thêm sản phẩm
        $product = Product::create($request->except(['_token','images','tag_id','color_id','size_id']));
        //Thêm ảnh sản phẩm
        if(count($images)!=0){
            foreach ($images as $image) {
                Image::create([
                    'product_id'=>$product->id,
                    'src'=>$image,
                    'user_id'=>$product->user_id,
                ]);
            }
        };
        //Thêm giá sản phẩm
        Price::create([
            'product_id' => $product->id,
            'in_price' => isset($request->in_price)?intval(str_replace(',', '', $request->in_price)):0,
            'out_price' => isset($request->out_price)?intval(str_replace(',', '', $request->out_price)):0,
            'general_price' => isset($request->general_price)?intval(str_replace(',', '', $request->general_price)):0,
        ]);
        //Thêm thẻ sản phẩm
        if (count($tags)!=0) {
           foreach ($tags as $tag) {
            \DB::table('product_tags')->insert([
                'product_id' => $product->id,
                'tag_id' => $tag
            ]);
        }
    }
        //Thêm màu sản phẩm
    if (count($colors)!=0) {
       foreach ($colors as $color) {
        \DB::table('product_colors')->insert([
            'product_id' => $product->id,
            'color_id' => $color
        ]);
    }
}
        //Thêm kích thước sản phẩm
if (count($sizes)!=0) {
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
        $images = $product->images;
        $ols = '<ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
        $items ='<div class="item active">
        <a data-fancybox="gallery" href="'.$product->thumbnail.'"><img src="'.$product->thumbnail.'"/></a>
        </div>';
        foreach ($images as $key => $image) {
            $ols .='<li data-target="#carousel-example-generic" data-slide-to="'.($key+1).'" class=" more-item"></li>';
            $items .='<div class="item more-item"><a data-fancybox="gallery" href="'.$image->src.'"><img src="'.$image->src.'"></a></div>';
        }
        $ols .= '</ol>';
        $slides = '
        <div class="box box-solid">
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
        $prices = $product->prices->where('color_id',null)->where('size_id',null)->first();
        // dd($prices);
        $quantities = $product->prices->sum('quantity');
        $colors = $product->colors;
        $sizes = $product->sizes;
        return response()->json([
            'product'=>$product,
            'prices'=>$prices,
            'colors'=>$colors,
            'sizes'=>$sizes,
            'quantities'=>$quantities,
            'slides'=>$slides
        ]);
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