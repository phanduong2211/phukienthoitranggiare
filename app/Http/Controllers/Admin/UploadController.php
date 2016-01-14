<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;

class UploadController extends BaseController
{

	public function upload(){
		return view("admin.upload");
	}

	public function loadfolder(){
		 $path=public_path()."\\image\\";
        switch ($_POST['folder']) {
            case 'folderupload':
            $path.="upload";
            break;
            case 'foldersanpham':
            $path.="product";
            break;

            case 'foldernews':
            $path.="news";
            break;

            case 'folderslide':
            $path.="slide";
            break;


            default:
            return -1;
            break;
        }

        $dir=scandir($path);

        unset($dir[0]);
        unset($dir[1]);


        $arr=array();


        foreach ($dir as $key) {
            $time=filemtime($path."/".$key);
            $size=filesize($path."/".$key);
            list($width,$height)=getimagesize($path."/".$key);
            array_push($arr, array("name"=>$key,"time"=>$time,"size"=>$size,"width"=>$width,"height"=>$height));
        }

        $leng=count($arr);

        for($i=0;$i<$leng;$i++){
            for($j=$i+1;$j<$leng;$j++){
                if($arr[$i]["time"]<$arr[$j]["time"]){
                    $temp=$arr[$i];
                    $arr[$i]=$arr[$j];
                    $arr[$j]=$temp;
                }
            }
        }

        foreach ($arr as &$value) {
            $value['time']=date("d/m/Y H:i",$value['time']);
        }

        return json_encode($arr);
	}

	public function checkfile(){
		$path=public_path()."\\image\\".$_POST['filename'];
        if(file_exists($path))
            return 1;
        return 2;
	}

	public function removeimg(){
		 $path=public_path()."\\image\\".$_POST['file'];

            $result=unlink($path);

            return json_encode($result);
	}
}

?>