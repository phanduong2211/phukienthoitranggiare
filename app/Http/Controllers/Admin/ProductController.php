<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Input;
use Redirect;
use View;
use App\Http\Module\product;

class ProductController extends BaseController
{

	public function index(){
		return View::make("admin.product.index");
	}

	public function add()
	{
		return View::make("admin.product.add");
	}	

	public function save()
	{
		$category= new category();
		$category->fill(Input::get());
		if($category->save()){
			return Redirect::to('admin/category')->with(['message'=>'Thêm thành công loại sản phẩm '.Input::get('name')]);
		}else{
			return Redirect::to('admin/category/add')->with(['message'=>'Có lỗi. Vui lòng thử lại']);
		}
	}	

	public function edit()
	{
		if(!Input::exists('id'))
			return Redirect::to('admin/category')->with(['message'=>'Vui lòng chọn 1 loại sản phẩm để sửa.']);
		$category= new category();
		$data=$category->where('id',Input::get('id'))->first();
		if($data==null)
			return Redirect::to('admin/category')->with(['message'=>'Loại sản phẩm không tồn tại.']);
		
		return View::make("admin.category.edit",array('data'=>$data));
	}	

	public function saveedit()
	{
		$category=category::find(Input::get('idedit'));
		$category->fill(Input::get());

		if($category->update()){
			return Redirect::to('admin/category')->with(['message'=>'Cập nhật thành công loại sản phẩm '.Input::get('name')]);
		}else{
			return Redirect::to('admin/category/edit?id='.Input::get('idedit'))->with(['message'=>'Cập nhật thất bại. Vui lòng thử lại.']);
		}
	}	

	public function delete()
	{
		$category=category::find(Input::get('id'));
		if($category->delete()){
			return Redirect::to('admin/category')->with(['message'=>'Xóa thành công loại sản phẩm "'.Input::get('title').'"']);
		}else{
			return Redirect::to('admin/category')->with(['message'=>'Có lỗi xóa loại sản phẩm "'.Input::get('title').'" thất bại. Vui lòng thử lại.']);
		}
		
	}	
}

?>