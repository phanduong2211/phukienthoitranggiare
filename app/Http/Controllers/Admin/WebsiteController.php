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
		$order='id';
		$typeorder='asc';
		if(Input::exists('s')){
			switch (Input::get('s')) {
				case '1':
					$order='id';
					$typeorder='desc';
					break;
				case '3':
					$order='name';
					$typeorder='asc';
					break;
				case '4':
					$order='created_at';
					$typeorder='desc';
					break;
				case '5':
					$order='updated_at';
					$typeorder='desc';
					break;
				default:
					$order='id';
					$typeorder='desc';
					break;
			}
		}
		if(Input::exists('q')){
			$query=Input::get('q');
			$data=$menu->where('name','like','%'.$query.'%')->orWhere('url','like','%'.$query.'%')->orderBy($order,$typeorder)->get();	
		}else{
			$data=$menu->orderBy($order,$typeorder)->get();	
		}
		
		return View::make("admin.website.menu",array('data'=>$data));
	}	
	public function addmenu()
	{
		$data=menu::select('id','name')->where('root',0)->get();
		return View::make("admin.website.addmenu",array('data'=>$data));
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

	public function editmenu()
	{
		if(!Input::exists('id'))
			return Redirect::to('admin/website/menu')->with(['message'=>'Vui lòng chọn 1 menu để sửa.']);
		$menu= new menu();
		$data=$menu->where('id',Input::get('id'))->first();
		if($data==null)
			return Redirect::to('admin/website/menu')->with(['message'=>'Menu không tồn tại.']);
		
		$dataall=$menu->where('root',0)->where('id','<>',Input::get('id'))->get();

		return View::make("admin.website.editmenu",array('data'=>$data,'dataall'=>$dataall));
	}	

	public function saveeditmenu()
	{
		$menu=menu::find(Input::get('idedit'));
		$menu->fill(Input::get());

		if($menu->update()){
			return Redirect::to('admin/website/menu')->with(['message'=>'Cập nhật thành công menu '.Input::get('name')]);
		}else{
			return Redirect::to('admin/website/menu/edit?id='.Input::get('idedit'))->with(['message'=>'Cập nhật thất bại. Vui lòng thử lại.']);
		}
	}	

	public function deletemenu()
	{
		if(Input::get("root")==="0"){
			$menu=menu::where('root',Input::get('id'))->get();
			if(count($menu)>0){
				return Redirect::to('admin/website/menu')->with(['message'=>'Menu "'.Input::get('title').'" đã có menu con. Không thể xóa']);
			}
		}
		$menu=menu::find(Input::get('id'));
		if($menu->delete()){
			return Redirect::to('admin/website/menu')->with(['message'=>'Xóa thành công menu "'.Input::get('title').'"']);
		}else{
			return Redirect::to('admin/website/menu')->with(['message'=>'Có lỗi xóa menu "'.Input::get('title').'" thất bại. Vui lòng thử lại.']);
		}
		
	}	
	
}

?>