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
		$ads = AdsController::getAds();
		$menu = MenuController::getMenu();
		$convert = new convertString();		
		$slideshow = SlideShowController::getSlideShow('index');
		$product = ProductController::getProduct();
		$tab_category = Tab_categoryController::getTab_category();
		$news = NewsController::getNews();
		$categorys = CategoryController::getCategory();
		$wishlist =array();
		/*if(count($product)>0)
		{
			$wishlist = WishlistController::getWishlist();
			foreach($product as $values_product)
			{
				$values_product["wishlist"] = false;
				foreach($wishlist as $values_wishlist)
				{
					if($values_product->id == $values_wishlist->productID)
					{
						$values_product["wishlist"] = true;
					}
				}
			}
		}*/
		//return $product;
		if(count($menu)>0)
		{
			$menu = $this->ConvertMenuToArray($menu);
		}
		else
		{
			$menu = array();
		}
		return View::make("index",array("menu"=>$menu,"slideshow"=>$slideshow,"product"=>$product,"news"=>$news,"tab_category"=>$tab_category,
			"convert"=>$convert,"ads"=>$ads,"categorys"=>$categorys));
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
	public function productDetail($id,$name)
	{
		$product = ProductController::getProductWhereID($id);
		$detailproduct = DetailProductController::getDetailProduct($id);
		$ads = AdsController::getAdsWhereType(1);
		$menu = MenuController::getMenu();
		$categorys = CategoryController::getCategory();
		if(count($menu)>0)
		{
			$menu = $this->ConvertMenuToArray($menu);
		}
		else
		{
			$menu = array();
		}
		if(count($product)>0 && count($detailproduct)>0)
		{
			
			$category = $categorys[0];
			foreach($categorys as $values)
			{
				if($values->id==$product[0]->categoryID)
				{
					$category = $values;
					break;
				}
			}
			//return $category['name'];
			$relatedproducts = ProductController::getProductWhereCategoryID($product[0]->categoryID);
			$convert = new convertString();
			return view('product.detail-product',array("menu"=>$menu,"product"=>$product,"detailproduct"=>$detailproduct,
				"relatedproducts"=>$relatedproducts,"convert"=>$convert,"category"=>$category,"categorys"=>$categorys,"ads"=>$ads));
		}
		else
			return view('product.error',array("menu"=>$menu,"categorys"=>$categorys));
	}
	public function myacount()
	{
		$menu = MenuController::getMenu();
		$categorys = CategoryController::getCategory();
		if(count($menu)>0)
		{
			$menu = $this->ConvertMenuToArray($menu);
		}
		else
		{
			$menu = array();
		}
		return view::make('my-account',array("menu"=>$menu,"categorys"=>$categorys));
	}
	public function news()
	{
		$news = NewsController::getNews();
		$menu = MenuController::getMenu();
		$categorys = CategoryController::getCategory();
		if(count($menu)>0)
		{
			$menu = $this->ConvertMenuToArray($menu);
		}
		else
		{
			$menu = array();
		}
		if(count($news)>0){
			$convert = new convertString();
			return view('news.news',array('menu'=>$menu,'news'=>$news,"convert"=>$convert,"categorys"=>$categorys));
		}
		else
			return view('product.error',array("menu"=>$menu,"categorys"=>$categorys));
	}
	public function detailnews($id,$name)
	{
		$news = NewsController::getNewsWhereID($id);
		$menu = MenuController::getMenu();
		$categorys = CategoryController::getCategory();
		if(count($menu)>0)
		{
			$menu = $this->ConvertMenuToArray($menu);
		}
		if(count($news)>0)
		{
			
			return view('news.detailnews',array('menu'=>$menu,'news'=>$news,"categorys"=>$categorys));
		}
		else
			return view('product.error',array("menu"=>$menu,"categorys"=>$categorys));
		
	}
	public function productsgird($category)
	{
		$menu = MenuController::getMenu();
		$categorys = CategoryController::getCategory();
		if(count($menu)>0)
		{
			$menu = $this->ConvertMenuToArray($menu);
		}
		return view('product.products-gird',array('menu'=>$menu,"categorys"=>$categorys));
	}

	public function productslist($category)
	{
		$menu = MenuController::getMenu();
		$categorys = CategoryController::getCategory();
		if(count($menu)>0)
		{
			$menu = $this->ConvertMenuToArray($menu);
		}
		return view('product.products-list',array('menu'=>$menu,"categorys"=>$categorys));
	}
	public function registration()
	{
		$menu = MenuController::getMenu();
		$categorys = CategoryController::getCategory();
		if(count($menu)>0)
		{
			$menu = $this->ConvertMenuToArray($menu);
		}
		return view::make("registration",array('menu'=>$menu,"categorys"=>$categorys));
	}
	public function wishlist()
	{
		if(UserController::isLogin())
		{
			$wishlist = WishlistController::getWishlistWhereUserID(Session::get('login_userID'));
			//return $wishlist;
			if(count($wishlist)>0)
			{
				$product=array();
				$wishlistID=array();
				foreach ($wishlist as $values) {
					$product[]=ProductController::getProductWhereID($values->productID);
					$wishlistID[]=$values->id;
					//$product[]["wishlistID"] = $values->id;
				}
			
			//return $wishlistID;
				$convert = new convertString();		
				$menu = MenuController::getMenu();
				$categorys = CategoryController::getCategory();
				if(count($menu)>0)
				{
					$menu = $this->ConvertMenuToArray($menu);
				}
				return View::make("wishlist",array('menu'=>$menu,"categorys"=>$categorys,"product"=>$product,
					"convert"=>$convert,"wishlistID"=>$wishlistID));
			}
		}
		else
			return $this->registration();
	}
	public function postwishlist()
	{
		if(UserController::isLogin())
		{
			if(WishlistController::insertwishlist(Session::get('login_userID'),$_GET['id'])==0)
				return 2;
			return 1;
		}
		else
			return 0;
	}
	public function deletewishlist()
	{
			WishlistController::deletewishlist($_POST['contents']);
			return $_POST['contents'];		
	}
	public function test()
	{
		
	}
}

?>