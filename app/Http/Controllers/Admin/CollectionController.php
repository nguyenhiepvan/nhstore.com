<?php

namespace nhstore\Http\Controllers\Admin;

use Illuminate\Http\Request;
use nhstore\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Photo;
use nhstore\Models\Collection;
use nhstore\Models\Product;
class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        setlocale(LC_TIME, "vi_VN");
        if($request->ajax()){
            $collections = Cache::remember('collections',3600,function ()
            {
                return Collection::whereNull('deleted_at')->orderBy('created_at','DESC')->get(); 
            });
            return Datatables::of($collections)
            ->addIndexColumn()
            ->editColumn('name',function ($collection)
            {   
                return $collection->name;
            })
            ->editColumn('created_at',function ($collection)
            {
                return strftime("%H:%M:%S %A, %e %B, %Y",strtotime($collection->created_at));
            })
            ->editColumn('quantities',function ($collection)
            {
                return '<center>'.\DB::table('collection_products')->where('collection_id',$collection->id)->count().'</center>';
            })
            ->editColumn('possion',function ($collection)
            {
                if (isset($collection->possion)) {
                    return $collection->possion;
                }else{
                    return "Chưa đặt vị trí";
                }
            })
            ->editColumn('status',function ($collection)
            {
               if ($collection->status) {
                return '<center><input title="Hiển thị" type="checkbox" data-id="'.$collection->id.'" name="status" class="js-switch" checked></center>';
            } else {
                return '<center><input title="Ẩn" type="checkbox" data-id="'.$collection->id.'" name="status" class="js-switch"></center>';
            }
        })
            ->editColumn('action',function ($collection)
            {
                return '<center><a href="/admin/collections/'.$collection->id.'/edit " class="edit btn btn-warning btn-sm" title="Sửa hóa đơn"><i class="fa  fa-edit"></i></a>
                <a href="javascript:;" data-id="'.$collection->id.'" class="delete btn btn-danger btn-sm" title="Xóa hóa đơn"><i class="fa  fa-trash"></i></a></center>';
            })
            ->rawColumns(['status','action','quantities'])
            ->make(true);
        }
        return view('backend.admin.collection.collections');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Cache::remember('products',3600,function ()
        {
            return Product::whereNull('deleted_at')->orderBy('created_at','DESC')->get();
        });
        return view('backend.admin.collection.collection_add')->with(['products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(empty($request['1920X1056']));
        $request->validate([
            'name'=>['required','max:255']
        ]);
        Photo::configure(array('driver' => 'imagick'));
        $time = now()->timestamp;
        if(!empty($request['1920X1056'])){
            $img = Photo::make(public_path(parse_url($request['1920X1056'], PHP_URL_PATH)))
            ->resize(1920, 1056)
            ->save('photos/collection/'.$time.'_1920X1056.jpg');
            $request['1920X1056'] = 'photos/collection/'.$time.'_1920X1056.jpg';
        } 
        if(!empty($request['450X362'])){
            $img = Photo::make(public_path(parse_url($request['450X362'], PHP_URL_PATH)))
            ->resize(450, 362)
            ->save('photos/collection/'.$time.'_450X362.jpg');
            $request['450X362'] = 'photos/collection/'.$time.'_450X362.jpg';
        } 
        if(!empty($request['540X494'])){
            $img = Photo::make(public_path(parse_url($request['540X494'], PHP_URL_PATH)))
            ->resize(540, 494)
            ->save('photos/collection/'.$time.'_540X494.jpg');
            $request['540X494'] = 'photos/collection/'.$time.'_540X494.jpg';
        } 
        if(!empty($request['540x340'])){
            $img = Photo::make(public_path(parse_url($request['540x340'], PHP_URL_PATH)))
            ->resize(540, 340)
            ->save('photos/collection/'.$time.'_540x340.jpg');
            $request['540x340'] = 'photos/collection/'.$time.'_540x340.jpg';
        }
        $collect = Collection::create([
            'name'=>$request->name,
            'slug'=>$this->changeToSlug($request->name),
            '1920x1056'=>!empty($request['1920X1056'])?$request['1920X1056']:'http://placehold.it/1920x1056',
            '450x362'=>!empty($request['450X362'])?$request['450X362']:'http://placehold.it/450x362',
            '540x494'=>!empty($request['540X494'])?$request['540X494']:'http://placehold.it/540x494',
            '540x340'=>!empty($request['540X340'])?$request['540X340']:'http://placehold.it/540x340',
            'possion'=>!empty($request['possion'])?$request['possion']:NULL
        ]);
        if (Cache::has('collections')) {
            $collections = Cache::get('collections');
            $collections->prepend($collect);
            Cache::put('collections', $collections, 3600);
        }
        if(!empty($request->product_id)){
            foreach ($request->product_id as $product) {
                \DB::table('collection_products')->insert([
                    'collection_id'=>$collect->id,
                    'product_id'=>$product,
                ]);
            }
        }
    }
//Tạo slug
    public function changeToSlug($title) {
        $replacement = '-';
        $map = array();
        $quotedReplacement = preg_quote($replacement, '/');
        $default = array(
            '/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|å/' => 'a',
            '/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|ë/' => 'e',
            '/ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ|î/' => 'i',
            '/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|ø/' => 'o',
            '/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|ů|û/' => 'u',
            '/ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ/' => 'y',
            '/đ|Đ/' => 'd',
            '/ç/' => 'c',
            '/ñ/' => 'n',
            '/ä|æ/' => 'ae',
            '/ö/' => 'oe',
            '/ü/' => 'ue',
            '/Ä/' => 'Ae',
            '/Ü/' => 'Ue',
            '/Ö/' => 'Oe',
            '/ß/' => 'ss',
            '/[^\s\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ',
            '/\\s+/' => $replacement,
            sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => '',
        );
        //Some URL was encode, decode first
        $title = urldecode($title);
        $map = array_merge($map, $default);
        return strtolower(preg_replace(array_keys($map), array_values($map), $title)).'-'.now()->timestamp;
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
       if(Cache::has('collections')){
        $collection = Cache::get('collections')->where('id',$id)->first();
    }else{
        $collection = Collection::find($id);
    }
    $products = Cache::remember('products',3600,function ()
    {
        return Product::whereNull('deleted_at')->orderBy('created_at','DESC')->get();
    });
    $items = \DB::table('collection_products')->where('collection_id',$collection->id)->select('product_id')->get();
    $product_ids = array();
    foreach ($items as $item) {
        $product_ids[] = $item->product_id;
    }
    return view('backend.admin.collection.collection_edit')->with([
        'collection'=>$collection,
        'products'=>$products,
        'product_ids'=>$product_ids,
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
