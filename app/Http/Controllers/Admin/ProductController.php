<?php
namespace nhstore\Http\Controllers\Admin;
use Illuminate\Http\Request;
use nhstore\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use nhstore\Product;
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
        //
        if ($request->ajax()) {
            $products = Product::where('status',true)->where('deleted_at',null)->get();
            return Datatables::of($products)
            ->addIndexColumn()
            ->editColumn('name', function ($product)
            {
                # code...
                return $product->name;
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
             $btn = '<a href="javascript:;" class="edit btn btn-primary btn-sm">View</a>';
             return $btn;
         })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.productsList');
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