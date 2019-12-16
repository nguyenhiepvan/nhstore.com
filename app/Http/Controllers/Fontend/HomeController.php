<?php

namespace nhstore\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use nhstore\Http\Controllers\Controller;
use nhstore\Models\Collection;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
    	$collections = Cache::remember('collections',3600,function ()
    	{
    		return Collection::with(['products'])->whereNull('deleted_at')->whereNotNull('position')->where('status',true)->orderBy('created_at','DESC')->get();
    	});
    	return view('fontend.homepage')->with('collections',$collections);
    }
}
