<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Input;
use Session;
use Redirect;
use View;
use App\Http\Module\menu;

class WebsiteController extends BaseController
{
	public function menu()
	{
		$menu=new menu();
		$data=$menu->get();
		return View::make("admin.website.menu",array('data'=>$data));
	}	
	public function addmenu()
	{
		return View::make("admin.website.addmenu");
	}	

	public function savemenu()
	{
		$menu= new menu();
		$menu->fill(Input::get());
		if($menu->save()){
			return Redirect::to('admin/website/menu')->with(['message'=>'Thêm thành công menu '.Input::get('name')]);
		}else{
			return Redirect::to('admin/website/menu/add')->with(['message'=>'Có lỗi. Vui lòng thử lại']);
		}
	}	
	
}

?>