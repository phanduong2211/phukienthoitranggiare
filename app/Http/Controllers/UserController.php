<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Module\user;
use Input;
use Session;
use Redirect;
use View;

class UserController extends Controller
{
    public function getuser()
    {
    	
    }
    // đăng nhập tài khoản
    public function login()
    {
    	$email=Input::get("email");
    	$password=Input::get("password");
    	if(user::check_login($email,$password))
    	{
    		Session::put('login',true);    		
    		return Redirect::to("my-account.html");
    	}
    	Session::put('login',false);
    	return Redirect::to('registration.html');
    }
    // tạo tài khoản
    public function register()
    {
    	$data =Input::all();
    	if(user::check_user($data["email"]))
    	{

    		$user = new user();
    		$user->fill($data);
    		$user->save();
    		return view::make('checkout-registration');
    	}
    	Session::put('email_register',false);
    	return Redirect::to('registration.html');
    }
    // kiểm tra login hay chưa
    public static function isLogin()
    {
        if(Session::has('login_userID'))
        {
            return true;
        }
        return false;
    }
}
