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
use nhstore\Models\Receipt;
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
class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $receipts = Cache::remember('receipts', 3600, function() {
                return Receipt::where('type',0)->orderBy('created_at','DESC')->get();
            });
            return Datatables::of($receipts)
            ->addIndexColumn()
            ->editColumn('code',function ($receipt)
            {
                return '<a class="detail-receipt" data-id="'.$receipt->id.'">'.$receipt->code.'</a>';
            })
            ->editColumn('created_at',function ($receipt)
            {
                return'<a title="'.date('g:i:s a, d-m-Y', strtotime($receipt->created_at)).'">'.date('F j, Y', strtotime($receipt->created_at)).'</a>';
            })
            ->editColumn('user',function ($receipt)
            {
                return $receipt->user->name;
            })
            ->rawColumns(['code','created_at'])
            ->make(true);
        }
        $products = Cache::remember('products', 3600, function() {
            return Product::whereNull('deleted_at')->get();
        });
        $materials = Cache::remember('materials', 3600, function() {
            return Material::whereNull('deleted_at')->get();
        });
        $brands = Cache::remember('brands', 3600, function() {
         return Brand::whereNull('deleted_at')->get();
     });
        $colors = Cache::remember('suppliers', 3600, function() {
         return Color::whereNull('deleted_at')->get();
     });
        $suppliers = Cache::remember('colors', 3600, function() {
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
        return view('backend.admin.receipts.receipts')->with([
            'products'=>$products,
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $products = Cache::remember('products', 3600, function() {
            return Product::whereNull('deleted_at')->get();
        });
        $colors = Cache::remember('suppliers', 3600, function() {
            Color::whereNull('deleted_at')->get();
        });
        $sizes = Cache::remember('sizes', 3600, function() {
            Size::whereNull('deleted_at')->get();
        });
        $options_product = '';
        foreach ($products as $product){
            $options_product .= '<option value="'.$product->id.'">'.$product->name.'</option>';
        }
        $options_color = '';
        foreach ($colors as $color){
            $options_color .= '<option value="'.$color->id.'">'.$color->name.'</option>';
        }
        $options_size = '';
        foreach ($sizes as $size){
            $options_size .= '<option value="'.$size->id.'">'.$size->name.'</option>';
        }
        $row = '<tr>
        <td >'.$request->index.'</td>
        <td>
        <select required class="form-control select2" name="product_id[]" data-placeholder="Chọn sản phẩm"
        style="width: 100%;">
        <option></option>
        '.$options_product.'
        </select>
        <span class="error errors_product_id"></span>
        </td>
        <td>
        <select required  name="color_id[]" class="form-control select2" style="width: 100%;" data-placeholder="Chọn màu sắc" >
        <option></option>
        '.$options_color.'
        </select>
        <span class="error errors_color_id"></span>
        </td>
        <td>
        <select required name="size_id[]" class="form-control select2" style="width: 100%;" data-placeholder="Chọn kích thước">
        <option></option>
        '.$options_size.'
        </select>
        <span class="error errors_size_id"></span>
        </td>
        <td class="quantity">
        <input class="form-control input-sm" type="number" value="0" min="0" name="quantity[]">
        <span class="error errors_quantity"></span>
        </td>
        <td class="unit-price">
        <input class="form-control input-sm" type="text" value="0" data-type="currency" placeholder="1,000,000" name="in_price[]">
        <span class="error errors_in_price"></span>
        </td>
        <td class="sub-total"></td>
        <td>
        <a href="javascript:;" class="remove-row btn btn-danger btn-sm" title="Xóa dòng"k><i class="fa  fa-trash"></i></a>
        </td>
        </tr>';
        return response()->json(['row'=>$row]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "product_id"    => "required|array",
            "product_id.*"  => "required",
            "color_id"    => "required|array",
            "color_id.*"  => "required",
            "size_id"    => "required|array",
            "size_id.*"  => "required",
            // "quantity"    => "required|array",
            "quantity.*"  => "required|numeric|min:1",
            // "in_price"    => "required|array",
            "in_price.*"  => "required|string",
        ]);
        $colors = $request->color_id;
        $sizes = $request->size_id;
        $quantity = $request->quantity;
        $in_price = $request->in_price;
        if ($request->type == 0) {
            //Tạo hóa đơn nhập
            $receipt = Receipt::create([
                'type'=>0,
                'code'=>now()->timestamp,
                'user_id'=>Auth()->user()->id,
            ]);
            if (Cache::has('receipts')) {
                $receipts = Cache::get('receipts');
                $receipts->prepend($receipt);
                Cache::put('receipts', $receipts, 3600);
            }else{
                Cache::remember('receipts', 3600, function() {
                    return Receipt::where('type',0)->orderBy('created_at','DESC')->get();
                });
            }
        } else {
            //Tạo hóa đơn xuất
            $receipt = Receipt::create([
                'type'=>1,
                'code'=>now()->timestamp,
                'user_id'=>Auth()->user()->id,
            ]);
        }
        foreach ($request->product_id as $key => $product_id) {
            //Thêm danh sách sản phẩm trong hóa đơn
            \DB::table('receipt_products')->insert([
                'receipt_id'=>$receipt->id,
                'product_id'=>$product_id,
                'color_id'=>$colors[$key],
                'size_id'=>$sizes[$key],
                'price'=>intval(str_replace(',', '', $in_price[$key])),
                'quantitys'=>$quantity[$key],
            ]);
            $temp = Price::where([
                'product_id'=>$product_id,
                'color_id'=>$colors[$key],
                'size_id'=>$sizes[$key],
            ])->first();
            if(isset($temp)){
                if($request->type == 0){
                    $temp->in_price = intval(str_replace(',', '', $in_price[$key]));
                    $temp->quantity += $quantity[$key];
                    $temp->save();
                }else{
                    $temp->quantity -= $quantity[$key];
                    $temp->save();
                }
            }else{
                Price::create([
                    'product_id'=>$product_id,
                    'color_id'=>$colors[$key],
                    'size_id'=>$sizes[$key],
                    'in_price'=>intval(str_replace(',', '', $in_price[$key])),
                    'out_price'=>0,
                    'quantity'=>$quantity[$key],
                ]);
            }
        }
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
