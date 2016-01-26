<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Http\Module\page;
use App\Http\Module\menu;
use Input;
class PageController extends Controller
{
	public function getIndex(){
		$data=page::orderBy('id','desc')->get();
		return view("admin.page.index",array('data'=>$data));
	}

	public function getAdd(){
		// $arrmenuid=page::select('menuid')->get();
		// $datam=menu::select('id','name')->where('url','<>','')->whereNotIn('id',$arrmenuid)->get();
		return view('admin.page.add');
	}

	public function postAdd(){
		$page=new page();
		Input::merge(array('name' => str_replace("\"","'",trim(Input::get('name')))));

		$page->fill(Input::get());
		if($page->save()){
			return redirect('admin/page')->with(['message'=>'Thêm thành công page '.Input::get('name')]);
		}else{
			
			return view('admin.page.add')->with(['message'=>'Thêm thất bại. Vui lòng thử lại']);
		}
	}

	public function getEdit(){
		if(!Input::exists('id'))
			return redirect('admin/page')->with(['message'=>'Vui lòng chọn 1 trang để sửa.']);
	
		$data=page::where('id',Input::get('id'))->first();
		if($data==null)
			return redirect('admin/page')->with(['message'=>'Trang không tồn tại.']);
		// $arrmenuid=page::select('menuid')->get();
		// $menuid=$data->menuid;
		// $datam=menu::select('id','name')->where('url','<>','')->where(function($q) use ($arrmenuid,$menuid){
		// 	$q->whereNotIn('id',$arrmenuid);
		// 	$q->orWhere('id',$menuid);
		// })->get();
		return view("admin.page.edit",array('data'=>$data));
	}

	public function postEdit(){
		$page=page::find(Input::get('idedit'));

		Input::merge(array('name' => str_replace("\"","'",trim(Input::get('name')))));
		
		$page->fill(Input::get());

		if($page->update()){
			
			return redirect('admin/page')->with(['message'=>'Cập nhật thành công trang "'.Input::get('name').'"']);
		}else{
			
			return redirect('admin/page/edit?id='.Input::get('idedit'))->with(['message'=>'Cập nhật thất bại. Vui lòng thử lại.']);
		}
	}

	public function postDelete(){
		$page=page::find(Input::get('id'));
		if($page->delete()){
			if(Input::exists('json')){
				return json_encode(array('result'=>1));
			}
			return redirect('admin/page')->with(['message'=>'Xóa thành công trang "'.Input::get('title').'"']);
		}else{
			if(Input::exists('json')){
				return json_encode(array('result'=>-1,'message'=>'Có lỗi. Xóa thất bại'));
			}
			return redirect('admin/page')->with(['message'=>'Xóa trang "'.Input::get('title').'" thất bại. Vui lòng thử lại.']);
		}
	}
}

?>