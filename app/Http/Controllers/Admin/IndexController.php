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
		$mytime = Carbon::now()->toDateString();
		$data=array();
		$data['contact']=DB::table('contact')->select('id','subject','email','content','created_at')->where(DB::raw('DATE(created_at)'),$mytime)->get();

		$data['user']=DB::table('users')->select('id','sex','name','created_at')->where(DB::raw('DATE(created_at)'),$mytime)->get();

		$data['order']=DB::table('order')->select('id','address','created_at')->where(DB::raw('DATE(created_at)'),$mytime)->get();


		return json_encode($data);
	}	

	
}

?>