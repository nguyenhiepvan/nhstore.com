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
class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::with(['user'])->whereNotNull('deleted_at')->orderBy('deleted_at','DESC')->get();
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
            ->editColumn('deleted_at', function ($product)
            {
                return $product->deleted_at->diffForHumans();
            })
            ->editColumn('action', function($product){
                $btn = '<a href="javascript:;" data-id="'.$product->id.'" class="edit btn btn-success btn-sm" title="Khôi phục sản phẩm"><i class="glyphicon glyphicon-repeat"></i></a>
                <a href="javascript:;" data-id="'.$product->id.'" class="delete btn btn-danger btn-sm" title="Xóa sản phẩm"><i class="glyphicon glyphicon-trash"></i></a>';
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
