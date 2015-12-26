<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Module\news;
use Input;
use Session;
use Redirect;
use View;

class NewsController extends Controller
{
	public static function getNews()
	{
		$news = new news();
		return $news->orderBy('id', 'desc')->take(10)->get();
	}
}

?>