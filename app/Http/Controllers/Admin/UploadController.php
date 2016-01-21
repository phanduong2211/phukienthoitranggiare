<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;

class UploadController extends BaseController
{

	public function upload(){
		return view("admin.upload");
	}

	public function loadfolder(){
		$path=public_path()."/image/".$_POST['folder'];
        
        if(!file_exists($path)){
            return -1;
        }

        $dir=scandir($path);

        unset($dir[0]);
        unset($dir[1]);

        $arr=array();

        foreach ($dir as $key) {
            $time=filemtime($path."/".$key);
            $size=filesize($path."/".$key);
            list($width,$height)=getimagesize($path."/".$key);
            $date=date("d/m/Y H:i",$time);
            array_push($arr, array("name"=>$key,"time"=>$date,"size"=>$size,"width"=>$width,"height"=>$height));
        }

        return json_encode($arr);
	}

	public function checkfile(){
		$path=public_path()."/image/".$_POST['filename'];
        if(file_exists($path))
            return 1;
        return 2;
	}

	public function removeimg(){
		$path=public_path()."/image/".$_POST['file'];

        $result=unlink($path);

        return json_encode($result);
	}
}

?>