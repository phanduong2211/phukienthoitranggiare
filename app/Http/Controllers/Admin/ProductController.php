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
use App\Http\Module\detailproduct;

class ProductController extends BaseController
{

	public function index(){
		if(!Input::exists('s') && !Input::exists('f') && !Input::exists('q')){
			$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',0)->paginate(2);
		}else{
			if(Input::exists('q')){
				$query=trim(Input::get('q'));
				if($query!=""){
					$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',0)->where(function($q) use ($query){
						$q->where('product.name','like','%'.$query.'%');
						$q->orWhere('promotion_price',$query);
						$q->orWhere('original_price',$query);
						$q->orWhere('price',$query);
						$q->orWhere('quantity',$query);
						$q->orWhere('admin.name',$query);
						$q->orWhere('category.name','like','%'.$query.'%');
					})->paginate(2);
				}else{
					$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',0)->paginate(2);
				}
			}
		}
		return View::make("admin.product.index",array('data'=>$data));
	}

	public function add()
	{
		$data=array();
		$data['datamenu']=menu::select('id','name','root')->where('url','')->get();
		$data['datacategory']=category::select('id','name')->get();
		$data['datatabcategory']=tab_category::select('id','name')->get();

		return View::make("admin.product.add",$data);
	}


	public function save()
	{
		$product=new product();

	
		$data=array(
			'name'=>trim(Input::get('name')),
			'promotion_price'=>preg_replace("/(\.|-| |\,)*/", "", trim(Input::get('promotion_price'))),
			'price'=>preg_replace("/(\.|-| |\,)*/", "", trim(Input::get('price'))),
			'image'=>Input::get('image'),
			'quantity'=>Input::get('quantity'),
			'status'=>Input::get('status'),
			'view'=>0,
			'user'=>Session::get('logininfo')->id,
			'tab_categoryID'=>Input::get('tab_categoryID'),
			'categoryID'=>Input::get('categoryID'),
			'menuID'=>Input::get('menuID'),
			'display'=>Input::get('display')=="on"?1:0,
			'bin'=>0,
			'original_price'=>preg_replace("/(\.|-| |\,)*/", "", trim(Input::get('original_price'))),
			'content'=>trim(Input::get('content')),
			'tagID'=>trim(Input::get('tagID'))
		);
		$product->fill($data);
		if($product->save()){
			$productdetail=new detailproduct();
			$productdetail->fill(array('productID'=>$product->id));
			$productdetail->save();
			return Redirect::to('admin/product/edit?id='.$product->id."#detail")->with(['message'=>'Thêm thành công sản phẩm "'.$product->name.'". Vui lòng nhập chi tiết cho sản phẩm.']);
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
		$data['detail']=detailproduct::where('productID',Input::get('id'))->first();
		return View::make("admin.product.edit",$data);
	}	

	public function saveedit()
	{
		$product=product::find(Input::get('idedit'));
		$data=array(
			'name'=>trim(Input::get('name')),
			'promotion_price'=>preg_replace("/(\.|-| |\,)*/", "", trim(Input::get('promotion_price'))),
			'price'=>preg_replace("/(\.|-| |\,)*/", "", trim(Input::get('price'))),
			'image'=>Input::get('image'),
			'quantity'=>Input::get('quantity'),
			'status'=>Input::get('status'),
			'tab_categoryID'=>Input::get('tab_categoryID'),
			'categoryID'=>Input::get('categoryID'),
			'menuID'=>Input::get('menuID'),
			'original_price'=>preg_replace("/(\.|-| |\,)*/", "", trim(Input::get('original_price'))),
			'content'=>trim(Input::get('content')),
			'tagID'=>trim(Input::get('tagID'))
		);
		$product->fill($data);
		if($product->update()){
			return Redirect::to('admin/product/edit?id='.$product->id)->with(['message'=>'Cập nhật thành công sản phẩm "'.$product->name.'"']);
		}else{
			return Redirect::to('admin/product/edit?id='.$product->id)->with(['message'=>'Cập nhật sản phẩm thất bại.']);
		}
	}	


	public function detail(){
		$productdetail=detailproduct::find(Input::get('idedit'));
		$images="";
		foreach (Input::get('images') as $key => $value) {
			if($value!=""){
				$images.=$value.",";
			}
		}
		$length=strlen($images);
		$images=substr($images, 0,$length-1);
		

		$productdetail->images=$images;

		$silebar_images="";
		foreach (Input::get('silebar_images') as $key => $value) {
			if($value!=""){
				$silebar_images.=$value.",";
			}
		}
		$length=strlen($silebar_images);
		$silebar_images=substr($silebar_images, 0,$length-1);
		$productdetail->silebar_images=$silebar_images;

		$productdetail->infomation=Input::get('infomation');
		$productdetail->size=Input::get('size');
		$productdetail->color=Input::get('color');
		$productdetail->data_sheet=Input::get('data_sheet');
		
		if($productdetail->update()){
			return Redirect::to('admin/product/edit?id='.Input::get('idproductedit').'#detail')->with(['message'=>'Cập nhật thành công chi tiết sản phẩm "'.Input::get('nameproductedit').'"']);
		}else{
			return Redirect::to('admin/product/edit?id='.Input::get('idproductedit').'#detail')->with(['message'=>'Cập nhật chi tiết sản phẩm "'.Input::get('nameproductedit').'" thất bại. Vui lòng thử lại']);
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