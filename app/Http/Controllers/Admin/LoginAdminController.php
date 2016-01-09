<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Input;
use Session;
use Redirect;
use View;
use App\Http\Module\Admin;

class LoginAdminController extends BaseController
{
	public function index()
	{
		if($this->isLogin()){
			return redirect('admin/index');
		}
		return View::make("admin.login");
	}	

	private function isLogin(){
		if(Session::has('logininfo')){
			return true;
		}
		return false;
	}

	public function login()
	{
		if($this->isLogin()){
			return redirect('admin/index');
		}

		$username=trim(Input::get('username'));
		$password=trim(Input::get('password'));

		if(empty($username)){
			return Redirect::to('admin/login')->with(['message'=>'Vui lòng nhập tài khoản.','username'=>$username]);
		}

		if(empty($password)){
			return Redirect::to('admin/login')->with(['message'=>'Vui lòng nhập mật khẩu.','username'=>$username]);
		}

		$result=Admin::get_user($username,$password);
		if(is_object($result)){
			Session::put('logininfo',$result);
			return Redirect::to('admin');
		}
		return Redirect::to('admin/login')->with(['message'=>'Tài khoản hoặc mật khẩu sai.','username'=>$username]);
	}

	public function logout()
	{
		if($this->isLogin()){
			Session::forget("logininfo");
		}
		return Redirect::to('admin/login');
	}	
}

?>