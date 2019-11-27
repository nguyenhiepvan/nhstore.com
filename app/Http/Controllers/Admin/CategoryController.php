<?php
namespace nhstore\Http\Controllers\Admin;
use Illuminate\Http\Request;
use nhstore\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use DateTime;
use Auth;
use nhstore\Models\User;
use nhstore\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::with(['parent','products','user'])->where('status',true)->whereNull('deleted_at')->get();
            return Datatables::of($categories)
            ->addIndexColumn()
            ->editColumn('name', function ($category)
            {
                return $category->name;
            })
            ->editColumn('parent',function ($category)
            {
                return ($category->parent_id == null)?'':$category->parent->name;
            })
            ->editColumn('products', function ($category)
            {
                return empty($category->products)?0:number_format($category->products->count());
            })
            ->editColumn('user', function ($category)
            {
                return $category->user->name;
            })
            ->editColumn('created_at', function ($category)
            {
                return date_format($category->created_at ,"Y/m/d H:i:s");
            })
            ->editColumn('status', function($category){
              if ($category->status) {
                return '<input type="checkbox" data-id="'.$category->id.'" name="status" class="js-switch category-show" checked>';
            } else {
                return '<input type="checkbox" data-id="'.$category->id.'" name="status" class="js-switch category-show">';
            }
        })
            ->editColumn('action', function($category){
                $btn = '<a href="javascript:;" data-id="'.$category->id.'" class="edit btn btn-warning btn-sm" title="Sửa thông tin"><i class="glyphicon glyphicon-pencil"></i></a>
                <a href="javascript:;" data-id="'.$category->id.'" class="delete btn btn-danger btn-sm" title="Xóa danh mục"><i class="glyphicon glyphicon-remove"></i></a>';
                return $btn;
            })
            ->rawColumns(['action','status'])
            ->make(true);
        }
        return view('backend.admin.categories.categoryList')->with('categories',Category::where('status',true)->get());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_hidden(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::where('status',false)->whereNull('deleted_at')->get();
            // dd($categories);
            return Datatables::of($categories)
            ->addIndexColumn()
            ->editColumn('name', function ($category)
            {
                return $category->name;
            })
            ->editColumn('parent',function ($category)
            {
                return ($category->parent_id == null)?'':$category->parent->name;
            })
            ->editColumn('products', function ($category)
            {
                return empty($category->products)?0:number_format($category->products->count());
            })
            ->editColumn('user', function ($category)
            {
                return User::find($category->user_hidden_id)->name;
            })
            ->editColumn('hidded_at', function ($category)
            {
                return date_format(new DateTime($category->hidded_at ),"Y/m/d H:i:s");
            })
            ->editColumn('status', function($category){
              if ($category->status) {
                return '<input type="checkbox" data-id="'.$category->id.'" name="status" class="js-switch category-hidden" checked>';
            } else {
                return '<input type="checkbox" data-id="'.$category->id.'" name="status" class="js-switch category-hidden">';
            }
        })
            ->rawColumns(['status'])
            ->make(true);
        }
        return view('backend.admin.categories.categoryList')->with('categories',Category::where('status',false)->get());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_deleted(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::WhereNotNull('deleted_at')->get();
            return Datatables::of($categories)
            ->addIndexColumn()
            ->editColumn('name', function ($category)
            {
                return $category->name;
            })
            ->editColumn('parent',function ($category)
            {
                return ($category->parent_id == null)?'':$category->parent->name;
            })
            ->editColumn('products', function ($category)
            {
                return empty($category->products)?0:number_format($category->products->count());
            })
            ->editColumn('deleted_at', function ($category)
            {
                return date_format(new DateTime($category->deleted_at),"Y/m/d H:i:s");
            })
            ->editColumn('action', function($category){
                return '
                <a href="javascript;" data-id="'.$category->id.'" class="btn btn-info btn-sm" title="Khôi phục bản ghi" ><i class="glyphicon glyphicon-repeat"></i></a>
                <a href="javascript;" data-id="'.$category->id.'" class="btn btn-danger btn-sm" title="Xóa bản ghi" ><i class="glyphicon glyphicon-trash"></i></a>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
        }
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
        $request->validate([
            'name'=>['required','max:255','unique:categories'],
            'slug'=>['required','max:255','unique:categories'],
        ]);
        $category = Category::create($request->all());
        return response()->json(['id'=>$category->id,'name'=>$category->name]);
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
        $category = Category::find($id);
        return response()->json([
            'name'=>$category->name,
            'slug'=>$category->slug,
            'parent'=>isset($category->parent)?$category->parent->id:'-1',
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
            'name'=>['required','max:255','unique:categories'],
            'slug'=>['required','max:255','unique:categories'],
        ]);
        Category::where('id',$id)->update($request->except(['_method','_token']));
        //Nếu cập nhật trạng thái hiển thị
        if(isset($request->status)){
            //cập nhật thời thời gian ẩn/hiện, người ẩn/hiện
            $category = Category::find($id);
            $category->hidded_at = now();
            $category->user_hidden_id = Auth::user()->id;
            $category->save();
        }
        return response()->json(['msg'=>true]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->deleted_at = now();
        $category->save();
        //xóa tất cả sản phẩm thuộc danh mục
        if(isset($category->products)){
            $category->products()->update([
                'deleted_at'=>now()
            ]);
        }
        //xóa tất cả con của danh mục
        while (isset($category->children)) {
            $category->children()->update([
                'deleted_at'=>now()
            ]);
             //và sản phẩm thuộc chúng
            if(isset($category->children()->products)){
                $category->children()->products()->update([
                    'deleted_at'=>now()
                ]);
            }
            //Tiếp tục lặp
            $category = $category->children;
        }
        return response()->json(['msg'=>true]);
    }
}