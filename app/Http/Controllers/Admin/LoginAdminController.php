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
use App\Http\Module\User;

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
		$result=User::get_user(Input::get('username'),Input::get('password'));
		if(is_object($result)){
			Session::put('logininfo',$result);
			return Redirect::to('admin');
		}
		return Redirect::to('admin/login')->with(['message'=>'Email hoặc mật khẩu sai.','username'=>Input::get('username')]);
	}	
}

?>