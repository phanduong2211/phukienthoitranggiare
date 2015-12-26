<?php 
	/**
	* 
	*/
	namespace App\Http\Module;
	use Illuminate\Database\Eloquent\Model;
	use DB;
	use Session;
	class product extends Model
	{		
		public $table = "product";
		public $fillable=['name','price','promotion_price','content','image','quantity','size','color','status','view','user'];
		
	}
 ?>