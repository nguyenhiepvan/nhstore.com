<?php

namespace nhstore\Http\Controllers\homework;

use Illuminate\Http\Request;
use nhstore\Http\Controllers\Controller;
use nhstore\User;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $users = User::latest('created_at')->whereNull('deleted_at')->get();
            return Datatables::of($users)
            ->addIndexColumn()
            ->editColumn('name', function ($user)
            {
                return $user->name;
            })
            ->editColumn('email', function ($user)
            {
                return $user->email;
            })
            ->editColumn('created_at', function ($user)
            {
                return $user->created_at->diffForHumans();
            })
            ->editColumn('updated_at', function ($user)
            {
                return $user->updated_at->diffForHumans();
            })
            ->addColumn('action', function($user){
                return '<a style="width: 67px;" data-id="'.$user->id.'" href="javascript:;" class="btn btn-success detail" title="Xem chi tiết"><i class="fa fa-eye"></i></a>
                <a style="width: 67px;" data-id="'.$user->id.'" href="javascript:;" class="btn btn-warning edit" title="Sửa"><i class="fa fa-edit"></i></a>
                <a style="width: 67px;" data-id="'.$user->id.'" href="javascript:;"  class="btn btn-danger delete" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('homework.user');
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
        'email'=>['required','string','unique:users'],
    ]);
     return response()->json(['msg'=>empty(User::create($request->all()))]);
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['name'=>$user->name,'email'=>$user->email]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $user = User::find($id);
       return response()->json(['name'=>$user->name,'email'=>$user->email]);
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
        // dd($request->all());
        $request->validate([
            'email'=>['required','string','unique:users'],
        ]);
        return response()->json(['msg'=>User::find($id)->update($request->except(['id','_method','_token']))]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->deleted_at = Carbon::now();
        $user->save();
    }
}
