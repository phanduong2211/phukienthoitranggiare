<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Module\product;
use Input;
use Session;
use Redirect;
use View;

class ProductController extends Controller
{
	public static function getProduct()
	{
		$product = new product();
		return $product->get();
	}

	public static function getProductWhereID($id)
	{
		$product = new product();
		return $product->where('id','=',$id)->get();
	}

	public static function getProductWhereStatus($status)
	{
		$product = new product();
		return $product->where('status','=',$status)->get();
	}
}

?>