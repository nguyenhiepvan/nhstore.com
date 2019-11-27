<?php

namespace nhstore\Http\Controllers\homework;

use Illuminate\Http\Request;
use nhstore\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
class CacheController extends Controller
{
	public function index()
	{
		$value = Cache::remember('users', 1, function() {
			return DB::table('users')->get();
		});
		$put  = Cache::put('name', 'Nguyễn Văn Hiệp', 60 * 2);
		$put2  = Cache::put('test', 'Nguyễn Văn Hiệp111');
		$put3  = Cache::put('view', 1);
		print_r(Cache::get('view', 'default'));
		dd(Cache::increase('view'));

	}
	public function getCache()
	{
		$test = Cache::get('name', 'oke');
		$test2 = Cache::get('test', 'oke1');
		dd($test2);
	}
}
