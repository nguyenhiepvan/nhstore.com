<?php
namespace nhstore\Http\Controllers\Admin;
use Illuminate\Http\Request;
use nhstore\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
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
            $categories = Category::where('status',true)->where('deleted_at',null)->get();
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
                return '<input type="checkbox" data-id="'.$category->id.'" name="status" class="js-switch" checked>';
            } else {
                return '<input type="checkbox" data-id="'.$category->id.'" name="status" class="js-switch">';
            }
        })
            ->editColumn('action', function($category){
             $btn = '<a href="javascript:;" data-id="'.$category->id.'" class="edit btn btn-warning btn-sm" title="Sửa thông tin"><i class="fa  fa-edit"></i></a>
             <a href="javascript:;" data-id="'.$category->id.'" class="delete btn btn-danger btn-sm" title="Xóa danh mục"><i class="fa  fa-trash"></i></a>';
             return $btn;
         })
            ->rawColumns(['action','status'])
            ->make(true);
        }
        return view('backend.admin.categoryList')->with('categories',Category::all());
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
            'name'=>['required','string','unique:categories'],
            'slug'=>['required','string','unique:categories'],
            'acronym'=>['required','string','unique:categories'],
        ]);
        $category = Category::create($request->all());
        return response()->json(['id'=>$category->id,'name'=>$category->name,'acronym'=>$category->acronym]);
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