<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Input;
use Redirect;
use View;
use File;
use Session;
use DB;
use App\Http\Module\product;
use App\Http\Module\menu;
use App\Http\Module\category;
use App\Http\Module\tab_category;
use App\Http\Module\detailproduct;
use App\Http\Module\wishlist;
use App\Http\Module\detailorder;

class ProductController extends BaseController
{

	public function index(){

		$bin=0;

		if(!Input::exists('s') && !Input::exists('f') && !Input::exists('q')){
			$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('id','desc')->paginate(15);
		}else{
			if(Input::exists('q')){
				$query=trim(Input::get('q'));
				if($query!=""){
					$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('id','desc')->where(function($q) use ($query){
						$q->where('product.name','like','%'.$query.'%');
						$q->orWhere('promotion_price',$query);
						$q->orWhere('original_price',$query);
						$q->orWhere('price',$query);
						$q->orWhere('quantity',$query);
						$q->orWhere('admin.name',$query);
						$q->orWhere('category.name','like','%'.$query.'%');
					})->paginate(15);
				}else{
					$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('id','desc')->paginate(15);
				}
			}else{
				if(Input::exists('s')){
					switch (Input::get('s')) {
						case '2':
							$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('id','asc')->paginate(15);
							break;
						case '3':
							$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('name','asc')->paginate(15);
							break;
						case '4':
							$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('created_at','desc')->paginate(15);
							break;
						case '5':
							$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('updated_at','desc')->paginate(15);
							break;
						
						default:
							$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('id','desc')->paginate(15);
							break;
					}
				}else{
					switch (Input::get('f')) {
						case '1':
						$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->where('admin.id',Session::get('logininfo')->id)->orderBy('id','desc')->paginate(15);
						break;
						case '2':
						$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('product.price','<>',DB::raw('product.promotion_price'))->where('bin',$bin)->orderBy('id','desc')->paginate(15);
						break;
						case '3':
						$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->where('promotion_price',DB::raw('price'))->orderBy('id','desc')->paginate(15);
						break;
						case '4':
						$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->where('status','new')->orderBy('id','desc')->paginate(15);
						break;
						case '5':
						$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->where('status','hot')->orderBy('id','desc')->paginate(15);
						break;
						case '6':
						$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->where('status','over')->orderBy('id','desc')->paginate(15);
						break;
						case '7':
						$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->where('status','sell')->orderBy('id','desc')->paginate(15);
						break;
						case '8':
						$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->where('status','promotion')->orderBy('id','desc')->paginate(15);
						break;
						case '9':
						$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->where('status','Ngừng Kinh Doanh')->orderBy('id','desc')->paginate(15);
						break;
						case '10':
						$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->where('display',1)->orderBy('id','desc')->paginate(15);
						break;
						case '11':
						$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->where('display',0)->orderBy('id','desc')->paginate(15);
						break;
						default:
						$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('id','desc')->paginate(15);

					}
				}
			}
		}
		return View::make("admin.product.index",array('data'=>$data));
	}

	public function recyclebin(){
		$bin=1;

		if(!Input::exists('s') && !Input::exists('q')){
			$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('id','desc')->paginate(15);
		}else{
			if(Input::exists('q')){
				$query=trim(Input::get('q'));
				if($query!=""){
					$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('id','desc')->where(function($q) use ($query){
						$q->where('product.name','like','%'.$query.'%');
						$q->orWhere('promotion_price',$query);
						$q->orWhere('original_price',$query);
						$q->orWhere('price',$query);
						$q->orWhere('quantity',$query);
						$q->orWhere('admin.name',$query);
						$q->orWhere('category.name','like','%'.$query.'%');
					})->paginate(15);
				}else{
					$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('id','desc')->paginate(15);
				}
			}else{
				if(Input::exists('s')){
					switch (Input::get('s')) {
						case '2':
							$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('id','asc')->paginate(15);
							break;
						case '3':
							$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('name','asc')->paginate(15);
							break;
						case '4':
							$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('created_at','desc')->paginate(15);
							break;
						case '5':
							$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('updated_at','desc')->paginate(15);
							break;
						
						default:
							$data=product::select('product.*','admin.name as nameuser','category.name as namec')->join('admin','product.user','=','admin.id')->join('category','product.categoryID','=','category.id')->where('bin',$bin)->orderBy('id','desc')->paginate(15);
							break;
					}
				}
			}
		}
		return View::make("admin.product.bin",array('data'=>$data));
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
			$datadetail=array(
				'size'=>Input::get('size'),
				'color'=>Input::get('color'),
				'productID'=>$product->id
			);
			$productdetail->fill($datadetail);
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

	public function addbin(){
		$product=product::find(Input::get('id'));
		$product->bin=1;
		if($product->update()){
			return 1;
		}else{
			return -1;
		}
	}

	public function restore(){
		$product=product::find(Input::get('id'));
		$product->bin=0;
		if($product->update()){
			return 1;
		}else{
			return -1;
		}
	}

	public function hidden(){
		$product=product::find(Input::get('id'));
		$product->display=(int)Input::get('flag');
		if($product->update()){
			return 1;
		}else{
			return -1;
		}
	}

	public function delete()
	{
		$order=detailorder::where('productID',Input::get('id'))->get();
		if(count($order)>0)
			return Redirect::to('admin/product/recyclebin')->with(['message'=>'Sản phẩm "'.Input::get('title').'" đã có đơn đặt hàng. Bạn không thể xóa.']);
		$product=product::find(Input::get('id'));
		if($product->delete()){
			DB::table('detailproduct')->where('productID',Input::get('id'))->delete();
			return Redirect::to('admin/product/recyclebin')->with(['message'=>'Xóa thành công sản phẩm "'.Input::get('title').'"']);
		}else{
			return Redirect::to('admin/product/recyclebin')->with(['message'=>'Có lỗi xóa sản phẩm "'.Input::get('title').'" thất bại. Vui lòng thử lại.']);
		}
		
	}	
}

?>