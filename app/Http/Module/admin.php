<?php 
	/**
	* 
	*/
	namespace App\Http\Module;
	use Illuminate\Database\Eloquent\Model;
	use DB;
	class Admin extends Model
	{		
		public $table = "admin";
		public $fillable=['name','username','password','email','phone','level','active','remember_token'];
		
		public static function get_user($username,$password)
		{
			$data=DB::table("admin")->select('id','name')->where(function($q) use ($username) {
				$q->where('username', $username)->orWhere('email', $username);
			})->where('password',md5($password))->first();
			return $data;
		}

	}
	?>