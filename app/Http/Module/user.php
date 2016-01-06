<?php 
	/**
	* 
	*/
	namespace App\Http\Module;
	use Illuminate\Database\Eloquent\Model;
	use DB;
	use Session;
	class user extends Model
	{		
		public $table = "users";
		public $fillable=['name','sex','date','email','password','remember_token'];
		public static function check_user($email)
		{
			$data=DB::table("users")->where('email','=',$email)->get();
			if(count($data)>0)
				return false;
			return true;
		}
		public static function check_login($email,$password)
		{
			$data=DB::table("users")->where('email','=',$email)->get();
			if(count($data)>0)
			{
				if($data[0]->password==$password)
				{
					Session::put('login_name',$data[0]->name);
					Session::put('login_userID',$data[0]->id);
					return true;
				}
			}
			return false;
		}

	}
 ?>