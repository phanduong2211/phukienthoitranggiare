<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Module\category;
use Input;
use Session;
use Redirect;
use View;

class CategoryController extends Controller
{
	public static function getCategory()
	{
		$category = new category();
		return $category->orderBy('id', 'asc')->get();
	}

	public static function getCategoryWhereID($id)
	{
		$category = new category();
		return $category->where('id', '=',$id)->get();
	}
}

?>