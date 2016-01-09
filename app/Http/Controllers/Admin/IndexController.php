<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Input;
use Session;
use Redirect;
use View;

class IndexController extends BaseController
{
	public function index()
	{
		return View::make("admin.index");
	}	

	
}

?>