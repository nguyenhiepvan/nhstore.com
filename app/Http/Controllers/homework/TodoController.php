<?php

namespace nhstore\Http\Controllers\homework;

use Illuminate\Http\Request;
use nhstore\Http\Controllers\Controller;
use nhstore\homework\Todo;
use Yajra\Datatables\Datatables;
class TodoController extends Controller
{
    /**
     * Hàm này dùng để hiển thị danh sách todo
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
       if ($request->ajax()) {
        $todos = Todo::latest('created_at')->get();
        return Datatables::of($todos)
        ->addIndexColumn()
        ->editColumn('title', function ($todo)
        {
            return $todo->title;
        })
        ->editColumn('created_at', function ($todo)
        {
            return $todo->created_at->diffForHumans();
        })
        ->editColumn('done', function ($todo)
        {
            if ($todo->done) {
                return '<input type="checkbox" data-id="'.$todo->id.'" name="done" class="js-switch" checked>';
            } else {
                return '<input type="checkbox" data-id="'.$todo->id.'" name="done" class="js-switch">';
            }

        })
        ->addColumn('action', function($todo){
            return '<a style="width: 67px;" data-id="'.$todo->id.'" href="javascript:;" class="btn btn-success detail" title="Xem chi tiết"><i class="fa fa-eye"></i></a>
            <a style="width: 67px;" data-id="'.$todo->id.'" href="javascript:;" class="btn btn-warning edit" title="Sửa"><i class="fa fa-edit"></i></a>
            <a style="width: 67px;" data-id="'.$todo->id.'" href="javascript:;"  class="btn btn-danger delete" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></a>';
        })
        ->rawColumns(['action','done'])
        ->make(true);
    }
    return view('homework.todo');
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
        $todo = Todo::create($request->all());
        return response()->json(['msg'=>isset($todo)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        return response()->json([
            'title'=>$todo->title,
            'created_at'=>$todo->created_at->diffForHumans(),
            'user'=>$todo->user->name,
            'status'=>($todo->status ==1)?'Đã hoàn thành':'Chưa hoàn thành',
            'content'=>$todo->content
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
        $result = Todo::where('id',$id)->update($request->except(['_token','_method']));
        return response()->json(['msg'=>$result]);
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
        Todo::find($id)->delete();
    }
}
