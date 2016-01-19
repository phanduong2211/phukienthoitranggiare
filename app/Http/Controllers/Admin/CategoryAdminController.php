<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Input;
use Redirect;
use View;
use App\Http\Module\category;
use App\Http\Module\product;

class CategoryAdminController extends BaseController
{

	public function index(){

		$category=new category();
		$order='id';
		$typeorder='desc';
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
			$data=$category->where('name','like','%'.$query.'%')->orderBy($order,$typeorder)->get();	
		}else{
			$data=$category->orderBy($order,$typeorder)->get();	
		}

		return View::make("admin.category.index",array('data'=>$data));
	}

	public function add()
	{
		return View::make("admin.category.add");
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
		$product=product::where('categoryID',Input::get('id'))->get();
		if(count($product)>0){
			return Redirect::to('admin/category')->with(['message'=>'Loại sản phẩm "'.Input::get('title').'" đã có sản phẩm. Không thể xóa']);
		}
		$category=category::find(Input::get('id'));
		if($category->delete()){
			return Redirect::to('admin/category')->with(['message'=>'Xóa thành công loại sản phẩm "'.Input::get('title').'"']);
		}else{
			return Redirect::to('admin/category')->with(['message'=>'Loại sản phẩm "'.Input::get('title').'" đã có sản phẩm. Không thể xóa']);
		}
		
	}	
}

?>