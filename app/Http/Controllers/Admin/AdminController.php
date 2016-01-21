<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Input;
use App\Http\Module\admin;
use App\Http\Module\product;
use App\Http\Module\news;
use Session;

class AdminController extends Controller
{
	public function getIndex()
	{
		$data=admin::orderBy('id','desc')->get();

		return view("admin.admin.index",array('data'=>$data));
	}	

	public function getAdd(){
		return view("admin.admin.add");
	}

	public function postAdd(){
		$admin=new admin();

		if(Input::get('email')!=""){
			$email=$admin->where('email',Input::get('email'))->get();

			if(count($email)>0){
				Session::flash('message', 'Email '.Input::get('email').' đã tồn tại. Vui lòng điền email khác.');
				return view("admin.admin.add");
			}
		}

		$username=$admin->where('username',Input::get('username'))->get();

		if(count($username)>0){
			Session::flash('message', 'Tài khoản '.Input::get('username').' đã tồn tại. Vui lòng điền tài khoản khác');
			return view("admin.admin.add");
		}
		Input::merge(array('password' => md5(Input::get('password'))));
		$admin->fill(Input::get());
		if($admin->save()){
			return redirect('admin/ad')->with(['message'=>'Thêm thành công QTV "'.Input::get('name').'".']);
		}
		Session::flash('message', 'Có lỗi. Vui lòng thử lại.');
		return view("admin.admin.add");
	}

	public function getEdit(){
		if(!Input::exists('id'))
			return redirect('admin/ad')->with(['message'=>'Vui lòng chọn 1 QTV để sửa.']);
		$admin=new admin();
		$data=$admin->where('id',Input::get('id'))->first();
		if($data==null)
			return redirect('admin/ad')->with(['message'=>'QTV không tồn tại.']);
		
		return view("admin.admin.edit",array('data'=>$data));
	}

	public function postEdit(){
		$admin=admin::find(Input::get('idedit'));
		$admin->fill(Input::get());

		if($admin->update()){
			return redirect('admin/ad')->with(['message'=>'Cập nhật thành công QTV '.Input::get('name')]);
		}else{
			return redirect('admin/ad/edit?id='.Input::get('idedit'))->with(['message'=>'Cập nhật thất bại. Vui lòng thử lại.']);
		}
	}

	public function postDelete(){
		$product=product::where('user',Input::get('id'))->get();
		if(count($product)>0){
			return redirect('admin/ad')->with(['message'=>'QTV "'.Input::get('title').'" đã đăng sản phẩm. Không thể xóa']);
		}
		$news=news::where('user',Input::get('id'))->get();
		if(count($news)>0){
			return redirect('admin/ad')->with(['message'=>'QTV "'.Input::get('title').'" đã đăng tin tức. Không thể xóa']);
		}
		$admin=admin::find(Input::get('id'));
		if($admin->delete()){
			return redirect('admin/ad')->with(['message'=>'Xóa thành công QTV "'.Input::get('title').'"']);
		}else{
			return redirect('admin/ad')->with(['message'=>'QTV "'.Input::get('title').'" đã có sản phẩm. Không thể xóa']);
		}
	}

	public function postActive(){
		$admin=admin::find(Input::get('id'));
		$admin->active=Input::get('loai');
		if($admin->update()){
			return 1;
		}
		return -1;
	}

	
}

?>