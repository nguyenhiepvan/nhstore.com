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
use nhstore\Models\Warehouse;
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
        setlocale(LC_TIME, "vi_VN");
        if ($request->ajax()) {
            $receipts = Cache::remember('receipts', 3600, function() {
                return Receipt::with('products')->where('type',0)->whereNUll('deleted_at')->orderBy('created_at','DESC')->get();
            });
            return Datatables::of($receipts)
            ->addIndexColumn()
            ->editColumn('code',function ($receipt)
            {
                return '<a class="detail-receipt" href="javascript:;" data-id="'.$receipt->id.'">'.$receipt->code.'</a>';
            })
            ->editColumn('created_at',function ($receipt)
            {
                return strftime("%H:%M:%S %A, %e %B, %Y",strtotime($receipt->created_at));
            })
            ->editColumn('user',function ($receipt)
            {
                return $receipt->user->name;
            })
            ->editColumn('subtotal',function ($receipt)
            { 
                return number_format(\DB::table('receipt_products')->where('receipt_id',$receipt->id)->select(\DB::raw('Sum(quantities*price) AS "Amount"'))->first()->Amount);
            })
            ->editColumn('action',function ($receipt)
            {
                return '<center><a href="/admin/in-receipts/'.$receipt->id.'/edit " class="edit btn btn-warning btn-sm" title="Sửa hóa đơn"><i class="fa  fa-edit"></i></a>
                <a href="javascript:;" data-id="'.$receipt->id.'" class="delete btn btn-danger btn-sm" title="Xóa hóa đơn"><i class="fa  fa-trash"></i></a></center>';
            })
            ->rawColumns(['code','created_at','action'])
            ->make(true);
        }
        return view('backend.admin.receipts.receipts');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
     $categories = Cache::remember('categories', 3600, function() {
        return Category::whereNull('deleted_at')->where('status',true)->get();
    });
     if($request->ajax()){
            //Hàm này dùng để thêm hàng vào hóa đơn
        $products = Cache::remember('products', 3600, function() {
            return Product::with('images')->whereNull('deleted_at')->get();
        });
        $colors = Cache::remember('colors', 3600, function() {
           return Color::whereNull('deleted_at')->get();
       });
        $sizes = Cache::remember('sizes', 3600, function() {
           return Size::whereNull('deleted_at')->get();
       });
        $options_product = '';
        $options_color = '';
        $options_size = '';
        if(!Cache::has('row')){
            foreach ($products as $product){
                $options_product .= '<option value="'.$product->id.'" data-image="'.$product->images->where('is_thumbnail',1)->first()['75X75'].'">'.$product->name.'</option>';
            }
            foreach ($colors as $color){
                $options_color .= '<option value="'.$color->id.'">'.$color->name.'</option>';
            }
            foreach ($sizes as $size){
                $options_size .= '<option value="'.$size->id.'">'.$size->name.'</option>';
            }
        }
        $index = '<tr>
        <td width="5%"><span class="demo">'.$request->index.'</span></td>';
        $row =  Cache::remember('row', 3600, function() use ($index,$options_product,$options_color,$options_size) {
            return '
            <td width="30%">
            <select required class="form-control productsSelect select2" name="product_id[]" data-placeholder="Chọn sản phẩm"
            style="width: 100%;">
            <option></option>
            '.$options_product.'
            </select>
            <span class="error errors_product_id"></span>
            </td>
            <td with="5%">
            <select required  name="color_id[]" class="form-control colorsSelect select2" style="width: 100%;" data-placeholder="Chọn màu sắc" >
            <option></option>
            '.$options_color.'
            </select>
            <span class="error errors_color_id"></span>
            </td>
            <td with="5%">
            <select required name="size_id[]" class="form-control sizesSelect select2" style="width: 100%;" data-placeholder="Chọn kích thước">
            <option></option>
            '.$options_size.'
            </select>
            <span class="error errors_size_id"></span>
            </td>
            <td with="10%" class="quantities">
            <input class="form-control input-sm" type="number" value="0" min="0" name="quantities[]">
            <span class="error errors_quantities"></span>
            </td>
            <td with="20%" class="unit-price">
            <input class="form-control input-sm" type="text" value="0" data-type="currency" placeholder="1,000,000" name="in_price[]">
            <span class="error errors_in_price"></span>
            </td>
            <td with="20%" class="sub-total"></td>
            <td width="5%">
            <a href="javascript:;" class="remove-row btn btn-danger btn-sm" title="Xóa dòng"k><i class="fa  fa-trash"></i></a>
            </td>
            </tr>';
        });
        return response()->json(['row'=>$index.$row]);
    }
    return view('backend.admin.receipts.receipt_add')->with([
        'categories'=>$categories,
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
        $request->validate([
            "code"    => "required|string|max:255|unique:receipts",
            "product_id"    => "required|array",
            "product_id.*"  => "required",
            "color_id"    => "required|array",
            "color_id.*"  => "required",
            "size_id"    => "required|array",
            "size_id.*"  => "required",
            // "quantities"    => "required|array",
            "quantities.*"  => "required|numeric|min:1",
            // "in_price"    => "required|array",
            "in_price.*"  => "required|string",
        ]);
        $colors = $request->color_id;
        $sizes = $request->size_id;
        $quantities = $request->quantities;
        $in_price = $request->in_price;
        if ($request->type == 0) {
            //Tạo hóa đơn nhập
            $receipt = Receipt::create([
                'type'=>0,
                'code'=>$request->code,
                'user_id'=>Auth::user()->id,
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
        }
        foreach ($request->product_id as $key => $product_id) {
            //Thêm danh sách sản phẩm trong hóa đơn
            \DB::table('receipt_products')->insert([
                'receipt_id'=>$receipt->id,
                'product_id'=>$product_id,
                'color_id'=>$colors[$key],
                'size_id'=>$sizes[$key],
                'price'=>intval(str_replace(',', '', $in_price[$key])),
                'quantities'=>$quantities[$key],
            ]);
            //Thêm sản phẩm vào kho hàng
            $temp = Warehouse::where([
                'product_id'=>$product_id,
                'color_id'=>$colors[$key],
                'size_id'=>$sizes[$key],
            ])->first();
            if(isset($temp)){
                if($request->type == 0){
                    $temp->quantities += $quantities[$key];
                    $temp->save();
                }
            }else{
                Warehouse::create([
                    'product_id'=>$product_id,
                    'color_id'=>$colors[$key],
                    'size_id'=>$sizes[$key],
                    'quantities'=>$quantities[$key],
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
        $items = \DB::table('receipt_products')->where('receipt_id',$id)->get();
        return Datatables::of($items)
        ->addIndexColumn()
        ->editColumn('name', function ($item)
        {
           return Product::find($item->product_id)->name;
       })
        ->editColumn('color', function ($item)
        {
           return Color::find($item->color_id)->name;
       })
        ->editColumn('size', function ($item)
        {
           return Size::find($item->size_id)->name;
       })
        ->editColumn('quantity', function ($item)
        {
           return $item->quantities;
       })
        ->editColumn('price', function ($item)
        {
           return number_format($item->price);
       })
        ->editColumn('subtotal', function ($item)
        {
           return number_format($item->quantities*$item->price);
       })
        ->make(true);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request$request,$id)
    {
        $categories = Cache::remember('categories', 3600, function() {
            return Category::whereNull('deleted_at')->where('status',true)->get();
        });
        if(Cache::has('receipts')){
            $receipt = Cache::get('receipts')->where('id',$id)->first();
        }else{
            $receipt = Receipt::find($id);
        }
        if($request->ajax()){
         $items = \DB::table('receipt_products')->where('receipt_id',$id)->get();
         return response()->json([ 'items'=>$items]);
     }
     return view('backend.admin.receipts.receipt_edit')->with([
        'categories'=>$categories,
        'code'=>$receipt->code,
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
        // dd($id);
        $request->validate([
            "code"    => "required|string|max:255|unique:receipts,id,".$id,
            "product_id"    => "required|array",
            "product_id.*"  => "required",
            "color_id"    => "required|array",
            "color_id.*"  => "required",
            "size_id"    => "required|array",
            "size_id.*"  => "required",
            "quantities.*"  => "required|numeric|min:1",
            "in_price.*"  => "required|string",
        ]);
        if(Cache::has('receipts')){
            $receipt = Cache::get('receipts')->where('id',$id)->first();
        }else{
            $receipt = Receipt::find($id);
        }
        if($receipt->code != $request->code){
            $receipt->update(['code'=>$request->code]);
        }
        $items = \DB::table('receipt_products')->where('receipt_id',$id)->get();
        \DB::table('receipt_products')->where('receipt_id',$id)->delete();
        if(!empty($items)){
            foreach ($items as $item) {
                $warehouse = Warehouse::where('product_id',$item->product_id)->where('color_id',$item->color_id)->where('size_id',$item->size_id)->first();
                $warehouse->quantities -= $item->quantities;
                $warehouse->save();
            }
        }
        foreach ($request->product_id as $key => $product_id) {
            //Thêm danh sách sản phẩm trong hóa đơn
            \DB::table('receipt_products')->insert([
                'receipt_id'=>$receipt->id,
                'product_id'=>$product_id,
                'color_id'=>$request->color_id[$key],
                'size_id'=>$request->size_id[$key],
                'price'=>intval(str_replace(',', '', $request->in_price[$key])),
                'quantities'=>$request->quantities[$key],
            ]);
            //Thêm sản phẩm vào kho hàng
            $temp = Warehouse::where([
                'product_id'=>$product_id,
                'color_id'=>$request->color_id[$key],
                'size_id'=>$request->size_id[$key],
            ])->first();
            if(isset($temp)){
                if($request->type == 0){
                    $temp->quantities += $request->quantities[$key];
                    $temp->save();
                }
            }else{
                Warehouse::create([
                    'product_id'=>$product_id,
                    'color_id'=>$request->color_id[$key],
                    'size_id'=>$request->size_id[$key],
                    'quantities'=>$request->quantities[$key],
                ]);
            }
        }
        Cache::forget('receipts');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Receipt::find($id)->update(['deleted_at'=>now()]);
        $items = \DB::table('receipt_products')->where('receipt_id',$id)->get();
        \DB::table('receipt_products')->where('receipt_id',$id)->delete();
        if(!empty($items)){
            foreach ($items as $item) {
                $warehouse = Warehouse::where('product_id',$item->product_id)->where('color_id',$item->color_id)->where('size_id',$item->size_id)->first();
                $warehouse->quantities -= $item->quantities;
                $warehouse->save();
            }
        }
        Cache::forget('receipts');
    }
}