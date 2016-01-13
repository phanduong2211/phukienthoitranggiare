<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Input;
use Redirect;
use View;
use File;
use Session;
use App\Http\Module\product;
use App\Http\Module\menu;
use App\Http\Module\category;
use App\Http\Module\tab_category;

class ProductController extends BaseController
{

	public function index(){


		return View::make("admin.product.index");
	}

	public function add()
	{
		$data=array();
		$data['datamenu']=menu::select('id','name','root')->where('url','')->get();
		$data['datacategory']=category::select('id','name')->get();
		$data['datatabcategory']=tab_category::select('id','name')->get();

		return View::make("admin.product.add",$data);
	}

	private function KhongDau($str){
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);

		return $str;
	}

	private function formatToUrl($name){

		$name=$this->KhongDau(trim(mb_strtolower($name,'UTF-8')));

		if (preg_match_all("/[a-za-z0-9_ ]*/", $name, $matches)) {
			$str="";
			foreach($matches[0] as $value)
			{
				$str.=$value;
			}

			$str=str_replace(" ", "-", $str);
			$str=str_replace("--", "-", $str);
			$str=str_replace("--", "-", $str);
			$str=str_replace("_", "-", $str);
			$str=str_replace("__", "-", $str);
			return $str;		  
		}



		return $name;

	}	

	private function createFileName($name,$basename,$i,$root,$duoi){

		if(file_exists($root."/".$name.".".$duoi)){

			return $this->createFileName($basename."(".$i.")",$basename,$i+1,$root,$duoi);
		}

		return $name.".".$duoi;
	}

	public function save()
	{
		$product=new product();

		$filename=Input::get('image');

		if(Input::file()) {
			$image = Input::file('image_upload');

			$name=$this->formatToUrl(Input::get('name'));

			$filename=$this->createFileName($name,$name,1,public_path().'\\image\\upload',$image->getClientOriginalExtension());

		}

		$data=array(
			'name'=>trim(Input::get('name')),
			'promotion_price'=>preg_replace("/(\.|-| |\,)*/", "", trim(Input::get('promotion_price'))),
			'price'=>preg_replace("/(\.|-| |\,)*/", "", trim(Input::get('price'))),
			'image'=>$filename,
			'quantity'=>Input::get('quantity'),
			'status'=>Input::get('status'),
			'view'=>0,
			'user'=>Session::get('logininfo')->id,
			'tab_categoryID'=>Input::get('tab_categoryID'),
			'categoryID'=>Input::get('categoryID'),
			'menuID'=>Input::get('menuID'),
			'display'=>1,
			'bin'=>0,
			'original_price'=>preg_replace("/(\.|-| |\,)*/", "", trim(Input::get('original_price'))),
			'content'=>trim(Input::get('content'))
		);
		$product->fill($data);
		if($product->save()){
			if(Input::file()) {
				$image = Input::file('image_upload');
				$image->move(public_path('image/upload/'),$filename);
			}
			return Redirect::to('admin/product/edit?id='.$product->id)->with(['message'=>'Thêm thành công sản phẩm "'.$product->name.'"']);
		}else{
			return Redirect::to('admin/product/add')->with(['message'=>'Thêm sản phẩm thất bại.','dataold'=>$data]);
		}
	}	

	public function edit()
	{
		if(!Input::exists('id'))
			return Redirect::to('admin/product')->with(['message'=>'Vui lòng chọn 1 sản phẩm để sửa.']);
		$data=array();
		$data['data']=product::where('id',Input::get('id'))->first();
		if($data['data']==null)
			return Redirect::to('admin/product')->with(['message'=>'Sản phẩm không tồn tại.']);
		$data['datamenu']=menu::select('id','name','root')->where('url','')->get();
		$data['datacategory']=category::select('id','name')->get();
		$data['datatabcategory']=tab_category::select('id','name')->get();
		
		return View::make("admin.product.edit",$data);
	}	

	public function saveedit()
	{
		$product=product::find(Input::get('idedit'));

		$filename=Input::get('image');

		if(Input::file()) {
			$image = Input::file('image_upload');

			$name=$this->formatToUrl(Input::get('name'));

			$filename=$this->createFileName($name,$name,1,public_path().'\\image\\upload',$image->getClientOriginalExtension());

		}

		$data=array(
			'name'=>trim(Input::get('name')),
			'promotion_price'=>preg_replace("/(\.|-| |\,)*/", "", trim(Input::get('promotion_price'))),
			'price'=>preg_replace("/(\.|-| |\,)*/", "", trim(Input::get('price'))),
			'image'=>$filename,
			'quantity'=>Input::get('quantity'),
			'status'=>Input::get('status'),
			'tab_categoryID'=>Input::get('tab_categoryID'),
			'categoryID'=>Input::get('categoryID'),
			'menuID'=>Input::get('menuID'),
			'original_price'=>preg_replace("/(\.|-| |\,)*/", "", trim(Input::get('original_price'))),
			'content'=>trim(Input::get('content'))
		);
		$product->fill($data);
		if($product->update()){
			if(Input::file()) {
				$image = Input::file('image_upload');
				$image->move(public_path('image/upload/'),$filename);
			}
			return Redirect::to('admin/product/edit?id='.$product->id)->with(['message'=>'Cập nhật thành công sản phẩm "'.$product->name.'"']);
		}else{
			return Redirect::to('admin/product/edit?id='.$product->id)->with(['message'=>'Cập nhật sản phẩm thất bại.']);
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