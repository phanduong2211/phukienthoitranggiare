<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Input;
use Session;
use Redirect;
use View;

class ViewController extends Controller
{

	public function index()
	{
		$menu = MenuController::getMenu();
		$slideshow = SlideShowController::getSlideShow('index');
		$product = ProductController::getProduct();
		$news = NewsController::getNews();
		if(count($menu)>0)
		{
			$menu = $this->ConvertMenuToArray($menu);
		}
		else
		{
			$menu = array();
		}
		return View::make("index",array("menu"=>$menu,"slideshow"=>$slideshow,"product"=>$product,"news"=>$news));
	}

	public function ConvertMenuToArray($menu)
	{
		$first=$menu[0]->root;
			$root_menu=array();		
			$second_menu=array();
			$three_menu=array();
			$root=$menu[0]->root;
			$second=0;
			$three=0;
			/// lấy ra menu cấp 1
			foreach ($menu as $value) {
				if($value->root == $root)
				{
					$data=array("id"=>$value->id,"name"=>$value->name,
						"url"=>$value->url,"root"=>$value->root);
					$root_menu[]=$data;
				}
			}
			/// lấy ra menu cấp 2
			foreach ($root_menu as $value_root) {
				foreach ($menu as $value) {
					if($value->root == $value_root["id"])
					{
						$data=array("id"=>$value->id,"name"=>$value->name,
						"url"=>$value->url,"root"=>$value->root);
						$second_menu[]=$data;
					}
				}
			}
			/// lấy ra menu cấp 3
			foreach ($second_menu as $value_second) {
				foreach ($menu as $value) {
					if($value->root == $value_second["id"])
					{
						$data=array("id"=>$value->id,"name"=>$value->name,
						"url"=>$value->url,"root"=>$value->root);
						$three_menu[]=$data;
					}
				}
			}			
			$menu=array("root_menu"=>$root_menu,"second_menu"=>$second_menu,"three_menu"=>$three_menu);
			return $menu;
	}
}

?>