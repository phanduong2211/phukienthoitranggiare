<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Input;
use DB;
use Carbon\Carbon;
class IndexController extends Controller
{
	public function index()
	{
		return view("admin.index");
	}	

	public function count()
	{
		$mytime = Carbon::now();
		$data=array();
		$data['contact']=DB::table('contact')->select('id','subject','email','content',DB::raw('hour(created_at) as h'),DB::raw('minute(created_at) as m'))->where(DB::raw('day(created_at)'),$mytime->day)->where(DB::raw('month(created_at)'),$mytime->month)->where(DB::raw('year(created_at)'),$mytime->year)->get();

		$data['user']=DB::table('users')->select('id','sex','name',DB::raw('hour(created_at) as h'),DB::raw('minute(created_at) as m'))->where(DB::raw('day(created_at)'),$mytime->day)->where(DB::raw('month(created_at)'),$mytime->month)->where(DB::raw('year(created_at)'),$mytime->year)->get();

		return json_encode($data);
	}	

	
}

?>