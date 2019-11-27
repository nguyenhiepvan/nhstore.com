<?php

namespace nhstore\Http\Controllers\Admin;
use Yajra\Datatables\Datatables;
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
use nhstore\Models\Tag;
use nhstore\Models\Image;
class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if($request->ajax()){
         $prices = Price::with(['product','color','size'])->where([
            'status'=>true,
            'deleted_at'=>NULL,
        ])->orderBy('created_at','DESC')->get();
         return Datatables::of($prices)
         ->addIndexColumn()
         ->editColumn('name', function ($price)
         {
            return '<a href="javascript:;" data-id="'.$price->product->id.'" class="detail-product" title="Xem chi tiết">'.$price->product->name.'</a>';
        })
         ->editColumn('color',function ($price)
         {
            if (isset($price->color)) {
                return $price->color->name;
            }
            return '';
        })
         ->editColumn('size', function ($price)
         {
            if(isset($price->size)){
                return $price->size->name;
            }
            return '';
        })
         ->editColumn('quantity', function ($price)
         {
            return number_format($price->quantity);
        })
         ->editColumn('in_price', function ($price)
         {
            return number_format($price->in_price);
        })
         ->editColumn('out_price', function ($price)
         {
            return number_format($price->out_price);
        })
         ->editColumn('sale_price', function ($price)
         {
            return number_format($price->sale_price);
        })
         ->rawColumns(['name'])
         ->make(true);
     }
     return view('backend.admin.products.productsList')
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
