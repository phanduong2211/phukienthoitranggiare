<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Http\Module\news;
use App\Http\Module\categorynews;
use Input;
use Session;
class NewsController extends Controller
{
	public function getIndex(){
		if(!Input::exists('s') && !Input::exists('f') && !Input::exists('q')){
			$data=news::select('news.*','admin.name as nameuser','categorynews.name as namec')->join('admin','news.user','=','admin.id')->join('categorynews','news.categoryNewsID','=','categorynews.id')->orderBy('id','desc')->paginate(15);
		}else{
			if(Input::exists('q')){
				$query=trim(Input::get('q'));
				if($query!=""){
					$data=news::select('news.*','admin.name as nameuser','categorynews.name as namec')->join('admin','news.user','=','admin.id')->join('categorynews','news.categoryNewsID','=','categorynews.id')->orderBy('id','desc')->where(function($q) use ($query){
						$q->where('news.name','like','%'.$query.'%');
						$q->orWhere('admin.name','like','%'.$query.'%');
						$q->where('news.description','like','%'.$query.'%');
						$q->orWhere('categorynews.name','like','%'.$query.'%');
					})->paginate(15);
				}else{
					$data=news::select('news.*','admin.name as nameuser','categorynews.name as namec')->join('admin','news.user','=','admin.id')->join('categorynews','news.categoryNewsID','=','categorynews.id')->orderBy('id','desc')->paginate(15);
				}
			}else{
				if(Input::exists('s')){
					switch (Input::get('s')) {
						case '2':
							$data=news::select('news.*','admin.name as nameuser','categorynews.name as namec')->join('admin','news.user','=','admin.id')->join('categorynews','news.categoryNewsID','=','categorynews.id')->orderBy('id','desc')->paginate(15);
							break;
						case '3':
							$data=news::select('news.*','admin.name as nameuser','categorynews.name as namec')->join('admin','news.user','=','admin.id')->join('categorynews','news.categoryNewsID','=','categorynews.id')->orderBy('name','asc')->paginate(15);
							break;
						case '4':
							$data=news::select('news.*','admin.name as nameuser','categorynews.name as namec')->join('admin','news.user','=','admin.id')->join('categorynews','news.categoryNewsID','=','categorynews.id')->orderBy('created_at','desc')->paginate(15);
							break;
						case '5':
							$data=news::select('news.*','admin.name as nameuser','categorynews.name as namec')->join('admin','news.user','=','admin.id')->join('categorynews','news.categoryNewsID','=','categorynews.id')->orderBy('updated_at','desc')->paginate(15);
							break;
						
						default:
							$data=news::select('news.*','admin.name as nameuser','categorynews.name as namec')->join('admin','news.user','=','admin.id')->join('categorynews','news.categoryNewsID','=','categorynews.id')->orderBy('id','desc')->paginate(15);
							break;
					}
				}else{
					switch (Input::get('f')) {
						case '1':
						$data=news::select('news.*','admin.name as nameuser','categorynews.name as namec')->join('admin','news.user','=','admin.id')->join('categorynews','news.categoryNewsID','=','categorynews.id')->where('admin.id',Session::get('logininfo')->id)->orderBy('id','desc')->paginate(15);
						
						break;
						case '3':
						$data=news::select('news.*','admin.name as nameuser','categorynews.name as namec')->join('admin','news.user','=','admin.id')->join('categorynews','news.categoryNewsID','=','categorynews.id')->where('display',0)->orderBy('id','desc')->paginate(15);
						break;
						case '2':
						$data=news::select('news.*','admin.name as nameuser','categorynews.name as namec')->join('admin','news.user','=','admin.id')->join('categorynews','news.categoryNewsID','=','categorynews.id')->where('display',1)->orderBy('id','desc')->paginate(15);
						break;
						
						default:
						$data=news::select('news.*','admin.name as nameuser','categorynews.name as namec')->join('admin','news.user','=','admin.id')->join('categorynews','news.categoryNewsID','=','categorynews.id')->orderBy('id','desc')->paginate(15);
					}
				}
			}
		}
		return view("admin.news.index",array('data'=>$data));
	}

	public function getAdd(){
		$data=categorynews::select('id','name')->get();
		return view('admin.news.add',array('data'=>$data));
	}

	public function postAdd(){
		$slide=new news();
		$data=array(
			'name'=>trim(Input::get('name')),
			'image'=>trim(Input::get('image')),
			'description'=>trim(Input::get('description')),
			'content'=>Input::get('content'),
			'view'=>0,
			'user'=>Session::get('logininfo')->id,
			'categoryNewsID'=>Input::get('categoryNewsId'),
			'display'=>1
		);
		$slide->fill($data);
		if($slide->save()){
			return redirect('admin/news')->with(['message'=>'Thêm thành công tin tức '.Input::get('name')]);
		}else{
			return view('admin.news.add')->with(['message'=>'Thêm thất bại. Vui lòng thử lại']);
		}
	}

	public function getEdit(){
		if(!Input::exists('id'))
			return redirect('admin/news')->with(['message'=>'Vui lòng chọn 1 tin tức để sửa.']);
		$news=new news();
		$data=$news->where('id',Input::get('id'))->first();
		if($data==null)
			return redirect('admin/news')->with(['message'=>'Tin Tức không tồn tại.']);
		$datac=categorynews::select('id','name')->get();
		return view("admin.news.edit",array('data'=>$data,'datac'=>$datac));
	}

	public function postEdit(){
		$news=news::find(Input::get('idedit'));
		
		$data=array(
			'name'=>trim(Input::get('name')),
			'image'=>trim(Input::get('image')),
			'description'=>trim(Input::get('description')),
			'content'=>Input::get('content'),
			'categoryNewsID'=>Input::get('categoryNewsId')
		);
		$news->fill($data);

		if($news->update()){
			return redirect('admin/news')->with(['message'=>'Cập nhật thành công tin tức "'.Input::get('name').'"']);
		}else{
			return redirect('admin/news/edit?id='.Input::get('idedit'))->with(['message'=>'Cập nhật thất bại. Vui lòng thử lại.']);
		}
	}

	public function postDelete(){
		$news=news::find(Input::get('id'));
		if($news->delete()){
			return redirect('admin/news')->with(['message'=>'Xóa thành công tin tức "'.Input::get('title').'"']);
		}else{
			return redirect('admin/news')->with(['message'=>'Xóa tin tức "'.Input::get('title').'" thất bại. Vui lòng thử lại.']);
		}
	}

	public function postHidden(){
		$news=news::find(Input::get('id'));
		$news->display=(int)Input::get('flag');
		if($news->update()){
			return 1;
		}else{
			return -1;
		}
	}

	public function getCategory(){
		$category=new categorynews();
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

		return view("admin.news.category",array('data'=>$data));
	}

	public function getAddCategory(){
		return view("admin.news.addcategory");
	}

	public function postAddCategory(){
		$category= new categorynews();
		$category->fill(Input::get());
		if($category->save()){
			return redirect('admin/news/category')->with(['message'=>'Thêm thành công loại tin tức '.Input::get('name')]);
		}else{
			return redirect('admin/news/add-category')->with(['message'=>'Có lỗi. Vui lòng thử lại']);
		}
	}

	public function getEditCategory()
	{
		if(!Input::exists('id'))
			return redirect('admin/news/category')->with(['message'=>'Vui lòng chọn 1 loại tin tức để sửa.']);
		$category= new categorynews();
		$data=$category->where('id',Input::get('id'))->first();
		if($data==null)
			return redirect('admin/news/category')->with(['message'=>'Loại tin tức không tồn tại.']);
		
		return view("admin.news.editcategory",array('data'=>$data));
	}

	public function postEditCategory()
	{
		$category=categorynews::find(Input::get('idedit'));
		$category->fill(Input::get());

		if($category->update()){
			return redirect('admin/news/category')->with(['message'=>'Cập nhật thành công loại tin tức '.Input::get('name')]);
		}else{
			return redirect('admin/news/edit-category?id='.Input::get('idedit'))->with(['message'=>'Cập nhật thất bại. Vui lòng thử lại.']);
		}
	}	
	
	public function postDeleteCategory()
	{
		$news=news::where('categoryNewsID',Input::get('id'))->get();
		if(count($news)>0){
			return redirect('admin/news/category')->with(['message'=>'Loại tin tức "'.Input::get('title').'" đã có tin tức. Không thể xóa']);
		}
		$category=categorynews::find(Input::get('id'));


		if($category->delete()){
			return redirect('admin/news/category')->with(['message'=>'Xóa thành công loại tin tức "'.Input::get('title').'"']);
		}else{
			return redirect('admin/news/category')->with(['message'=>'Xóa thất bại. Vui lòng thử lại']);
		}
		
	}	
}

?>