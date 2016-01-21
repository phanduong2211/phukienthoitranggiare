<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Input;
use Redirect;
use View;
use App\Http\Module\tab_category;

class TabController extends BaseController
{

	public function index(){

		$tab_category=new tab_category();
		$data=$tab_category->orderBy('id','desc')->get();	
		return View::make("admin.tab.index",array('data'=>$data));
	}

	public function add()
	{
		return View::make("admin.tab.add");
	}	

	public function save()
	{
		$tab_category= new tab_category();
		$tab_category->fill(Input::get());
		if($tab_category->save()){
			return Redirect::to('admin/tab')->with(['message'=>'Thêm thành công tab '.Input::get('name')]);
		}else{
			return Redirect::to('admin/tab/add')->with(['message'=>'Có lỗi. Vui lòng thử lại']);
		}
	}	

	public function edit()
	{
		if(!Input::exists('id'))
			return Redirect::to('admin/tab')->with(['message'=>'Vui lòng chọn 1 tab để sửa.']);
		$tab_category= new tab_category();
		$data=$tab_category->where('id',Input::get('id'))->first();
		if($data==null)
			return Redirect::to('admin/tab')->with(['message'=>'Tab không tồn tại.']);
		
		return View::make("admin.tab.edit",array('data'=>$data));
	}	

	public function saveedit()
	{
		$tab_category=tab_category::find(Input::get('idedit'));
		$tab_category->fill(Input::get());

		if($tab_category->update()){
			return Redirect::to('admin/tab')->with(['message'=>'Cập nhật thành công tab '.Input::get('name')]);
		}else{
			return Redirect::to('admin/tab/edit?id='.Input::get('idedit'))->with(['message'=>'Cập nhật thất bại. Vui lòng thử lại.']);
		}
	}	

	public function delete()
	{
		$tab_category=tab_category::find(Input::get('id'));
		if($tab_category->delete()){
			return Redirect::to('admin/tab')->with(['message'=>'Xóa thành công tab "'.Input::get('title').'"']);
		}else{
			return Redirect::to('admin/tab')->with(['message'=>'Tab "'.Input::get('title').'" đã có nội dung hoặc sản phẩm. Không thể xóa']);
		}
		
	}	
}

?>