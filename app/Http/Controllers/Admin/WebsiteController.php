<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Input;
use Session;
use Redirect;
use View;
use App\Http\Module\menu;
use App\Http\Module\product;
use App\Http\Module\info;
use App\Http\Module\page;

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
		$data=$menu->orderBy($order,$typeorder)->get();	
		
		return View::make("admin.website.menu",array('data'=>$data));
	}	
	public function addmenu()
	{
		$data=menu::select('id','name','root')->orderBy('root','asc')->get();
		return View::make("admin.website.addmenu",array('data'=>$data));
	}	

	public function savemenu()
	{
		$menu= new menu();

		$data=array(
			'name'=>str_replace("\"", "'", trim(Input::get('name'))),
			'root'=>Input::get('root'),
			'url'=>trim(Input::get('url'))
		);

		if($data['root']==-1){
			return Redirect::to('admin/website/menu')->with(['message'=>'Vui lòng điền đầy đủ thông tin.']);
		}

		$menu->fill($data);
		if($menu->save()){
			if(Input::exists('json')){
				$data=array(
					'id'=>$menu->id,
					'name'=>$menu->name,
					'root'=>$menu->root,
					'url'=>$menu->url,
					'created_at'=>$menu->created_at,
					'updated_at'=>$menu->updated_at
				);
				return json_encode(array('result'=>1,'message'=>'Thêm thành công menu '.$data['name'],'data'=>$data));
			}
			return Redirect::to('admin/website/menu')->with(['message'=>'Thêm thành công menu "'.$data['name'].'"']);
		}else{
			if(Input::exists('json')){
				return json_encode(array('result'=>-1,'message'=>'Có lỗi. Vui lòng thử lại'));
			}
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
		
		$dataall=$menu->select('id','name','root')->where('id','<>',Input::get('id'))->get();

		return View::make("admin.website.editmenu",array('data'=>$data,'dataall'=>$dataall));
	}	

	public function saveeditmenu()
	{
		$menu=menu::find(Input::get('idedit'));
		
		$data=array(
			'name'=>str_replace("\"", "'", trim(Input::get('name'))),
			'root'=>Input::get('root'),
			'url'=>trim(Input::get('url'))
		);

		if($data['root']==-1){
			return Redirect::to('admin/website/menu/edit?id='.Input::get('idedit'))->with(['message'=>'Vui lòng điền đầy đủ thông tin.']);
		}

		if($menu->url!='' && $data['url']==''){
			$page=page::select('name')->where('menuid',Input::get('idedit'))->get();
			if(count($page)>0){
				if(Input::exists('json')){
					return json_encode(array('result'=>-1,'message'=>'Menu này đã thuộc trang '.$page[0]->name.'. Không thể sửa url'));
				}
				return 2;
			}
		}

		if($data['url']!='' && $menu->url==''){
			$product=product::where('menuID',Input::get('idedit'))->count();
			if($product>0){
				if(Input::exists('json')){
					return json_encode(array('result'=>-1,'message'=>'Menu này đã thuộc có sản phẩm. Không thể sửa url'));
				}
				return Redirect::to('admin/website/menu/edit?id='.Input::get('idedit'))->with(['message'=>'Menu này đã thuộc có sản phẩm. Không thể sửa url']);
			}
		}

		$menu->fill($data);

		if($menu->update()){
			if(Input::exists('json')){
				return json_encode(array('result'=>1,'message'=>'Cập nhật thành công'));
			}
			return Redirect::to('admin/website/menu')->with(['message'=>'Cập nhật thành công menu "'.$data['name'].'"']);
		}else{
			if(Input::exists('json')){
				return json_encode(array('result'=>-1,'message'=>'Cập nhật thất bại. Vui lòng thử lại'));
			}
			return Redirect::to('admin/website/menu/edit?id='.Input::get('idedit'))->with(['message'=>'Cập nhật thất bại. Vui lòng thử lại.']);
		}
	}	

	public function deletemenu()
	{
		if(Input::get("root")==="0"){
			$menu=menu::where('root',Input::get('id'))->get();
			if(count($menu)>0){
				if(Input::exists('json')){
					return json_encode(array('result'=>-1,'message'=>'Menu "'.Input::get('title').'" đã có menu con. Không thể xóa'));
				}
				return Redirect::to('admin/website/menu')->with(['message'=>'Menu "'.Input::get('title').'" đã có menu con. Không thể xóa']);
			}
		}
		if(Input::get("url2")==""){
			$product=product::where('menuID',Input::get('id'))->get();
			if(count($product)>0){
				if(Input::exists('json')){
					return json_encode(array('result'=>-1,'message'=>'Menu "'.Input::get('title').'" đã có sản phẩm. Không thể xóa'));
				}
				return Redirect::to('admin/website/menu')->with(['message'=>'Menu "'.Input::get('title').'" đã có sản phẩm. Không thể xóa']);
			}
		}
		$menu=menu::find(Input::get('id'));
		if($menu->delete()){
			if(Input::exists('json')){
				return json_encode(array('result'=>1));
			}
			return Redirect::to('admin/website/menu')->with(['message'=>'Xóa thành công menu "'.Input::get('title').'"']);
		}else{
			if(Input::exists('json')){
				return json_encode(array('result'=>-1,'message'=>'Có lỗi. Xóa thất bại'));
			}
			return Redirect::to('admin/website/menu')->with(['message'=>'Có lỗi xóa menu "'.Input::get('title').'" thất bại. Vui lòng thử lại.']);
		}
		
	}

	public function info(){
		$info=info::get();
		$data=array();
		foreach ($info as $key => $value) {
			$data[$value->name]=$value->contents;
		}
		
		return View::make("admin.website.info",array('data'=>$data));
	}	

	public function changelogo(){
		if(Input::file()) {
			$image = Input::file('logo');
			if($image->move(public_path('img/'),"logo.png")){
				return Redirect::to('admin/website/info')->with(['message'=>'Cập nhật thành công logo. Do cơ chế save cache của trình duyệt, có thể phải mất vài phút logo mới được cập nhật.']);
			}else{
				return Redirect::to('admin/website/info')->with(['message'=>'Cập nhật logo thất bại.']);
			}
		}
	}

	public function changefavicon(){
		if(Input::file()) {
			$image = Input::file('favicon');
			if($image->move(public_path('img/'),"favicon.png")){
				return Redirect::to('admin/website/info')->with(['message'=>'Cập nhật thành công favicon. Do cơ chế save cache của trình duyệt, có thể phải mất vài phút favicon mới được cập nhật.']);
			}else{
				return Redirect::to('admin/website/info')->with(['message'=>'Cập nhật favicon thất bại.']);
			}
		}
	}

	public function postinfoall(){
		$info=new info();
		$info->where('name','title')->update(array('contents'=>str_replace("\"", "'", trim(Input::get('title')))));
		$info->where('name','description')->update(array('contents'=>str_replace("\"", "'", trim(Input::get('description')))));
		$info->where('name','keyword')->update(array('contents'=>str_replace("\"", "'", trim(Input::get('keyword')))));
		$info->where('name','maps')->update(array('contents'=>Input::get('maps')));
		return Redirect::to('admin/website/info')->with(['message'=>'Cập nhật thành công thông tin chung.']);
	}

	public function postinfcontact(){
		$info=new info();
		$info->where('name','address')->update(array('contents'=>str_replace("\"", "'", trim(Input::get('address')))));
		$info->where('name','phone')->update(array('contents'=>Input::get('phone')));
		$info->where('name','email')->update(array('contents'=>Input::get('email')));
		$info->where('name','skype')->update(array('contents'=>Input::get('skype')));
		$info->where('name','facebook')->update(array('contents'=>Input::get('facebook')));
		$info->where('name','google')->update(array('contents'=>Input::get('google')));
		$info->where('name','twitter')->update(array('contents'=>Input::get('twitter')));
		return Redirect::to('admin/website/info')->with(['message'=>'Cập nhật thành công thông tin liên hệ.']);
	}

	public function changebrand(){
		$silebar_images="";
		foreach (Input::get('silebar_images') as $key => $value) {
			if($value!=""){
				$silebar_images.=$value.",";
			}
		}
		$length=strlen($silebar_images);
		$silebar_images=substr($silebar_images, 0,$length-1);
		
		$info=new info();
		$info->where('name','brand')->update(array('contents'=>$silebar_images));
		return Redirect::to('admin/website/info')->with(['message'=>'Cập nhật đối tác thành công.']);
	}
	
}

?>