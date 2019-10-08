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
            $products = Product::where('status',true)->where('deleted_at',null)->get();
            return Datatables::of($products)
            ->addIndexColumn()
            ->editColumn('name', function ($product)
            {
                # code...
                return '<a href="javascript:;" data-id="'.$product->id.'" class="detail-product" title="Xem chi tiết">'.$product->name.'</a>';
            })
            ->editColumn('thumbnail',function ($product)
            {
                # code...
                $fancy = '<a data-fancybox="gallery" href="'.$product->thumbnail.'"><img src="'.$product->thumbnail.'" alt="" style="max-height:100px;" title="'.$product->slug.'"/></a>';
                return $fancy;
            })
            ->editColumn('brand', function ($product)
            {
                # code...
                return $product->brand->name;
            })
            ->editColumn('supplier', function ($product)
            {
                # code...
                return $product->supplier->name;
            })
            ->editColumn('action', function($product){
               $btn = '<a href="javascript:;" class="edit btn btn-warning btn-sm" title="Sửa thông tin"><i class="fa  fa-edit"></i></a>
               <a href="javascript:;" class="delete btn btn-danger btn-sm" title="Xóa sản phẩm"><i class="fa  fa-trash"></i></a>';
               return $btn;
           })
            ->rawColumns(['action','thumbnail','name'])
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
            'countries'=>Country::all()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = array_filter(explode(",",$request->images));
        $tags = $request->tag_id;
        $request->validate([
            'slug'=>['required','string','unique:brands'],
            'acronym'=>['required','string','unique:brands'],
        ]);
        //Thêm sản phẩm
        $product = Product::create($request->except(['_token','images','tag_id']));
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
        //Thêm thẻ sản phẩm
        if (count($tags)!=0) {
         foreach ($tags as $tag) {
            \DB::table('product_tags')->insert([
                ['product_id' => $product->id,
                'tag_id' => $tag]
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
        $product = Product::find($id);
        $images = $product->images;
        return response()->json(['product'=>$product,'images'=>$images]);
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