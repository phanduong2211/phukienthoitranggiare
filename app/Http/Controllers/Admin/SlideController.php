<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Http\Module\slideshow;
use App\Http\Module\category;
use Input;
class SlideController extends Controller
{
	public function getIndex(){
		$slide=new slideshow();
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
			$data=$slide->where('name','like','%'.$query.'%')->orWhere('content','like','%'.$query.'%')->orderBy($order,$typeorder)->get();	
		}else{
			$data=$slide->orderBy($order,$typeorder)->get();	
		}

		return view("admin.slide.index",array('data'=>$data));
	}

	public function getAdd(){
		$datac=category::get();
		return view('admin.slide.add',array('datac'=>$datac));
	}

	public function postAdd(){
		$slide=new slideshow();
		Input::merge(array('name' => str_replace("\"","'",trim(Input::get('name')))));
		Input::merge(array('content' => str_replace("\"","'",trim(Input::get('content')))));
		$slide->fill(Input::get());
		if($slide->save()){
			return redirect('admin/slide')->with(['message'=>'Thêm thành công slide '.Input::get('name')]);
		}else{
			return view('admin.slide.add')->with(['message'=>'Thêm thất bại. Vui lòng thử lại']);
		}
	}

	public function getEdit(){
		if(!Input::exists('id'))
			return redirect('admin/slide')->with(['message'=>'Vui lòng chọn 1 slide để sửa.']);
		$slide= new slideshow();
		$data=$slide->where('id',Input::get('id'))->first();
		if($data==null)
			return redirect('admin/slide')->with(['message'=>'Slide không tồn tại.']);
		$datac=category::get();
		return view("admin.slide.edit",array('data'=>$data,'datac'=>$datac));
	}

	public function postEdit(){
		$slide=slideshow::find(Input::get('idedit'));

		Input::merge(array('name' => str_replace("\"","'",trim(Input::get('name')))));
		Input::merge(array('content' => str_replace("\"","'",trim(Input::get('content')))));

		$slide->fill(Input::get());

		if($slide->update()){
			return redirect('admin/slide')->with(['message'=>'Cập nhật thành công slide "'.Input::get('name').'"']);
		}else{
			return redirect('admin/slide/edit?id='.Input::get('idedit'))->with(['message'=>'Cập nhật thất bại. Vui lòng thử lại.']);
		}
	}

	public function postDelete(){
		$slideshow=slideshow::find(Input::get('id'));
		if($slideshow->delete()){
			return redirect('admin/slide')->with(['message'=>'Xóa thành công slide "'.Input::get('title').'"']);
		}else{
			return redirect('admin/slide')->with(['message'=>'Xóa slide "'.Input::get('title').'" thất bại. Vui lòng thử lại.']);
		}
	}
}

?>