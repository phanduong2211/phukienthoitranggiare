<?php if(!isset($_GET['keyupload'])){
	header("location:/");
} ?>
<?php 
function KhongDau($str){
	$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
	$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
	$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
	$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
	$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
	$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
	$str = preg_replace("/(đ)/", 'd', $str);

	return $str;
}

function formatToUrl($name){

	$name=KhongDau(trim(mb_strtolower($name,'UTF-8')));

	if (preg_match_all("/[a-za-z0-9_ ]*/", $name, $matches)) {
		$str="";
		foreach($matches[0] as $value)
		{
			$str.=$value;
		}

		$str=str_replace(" ", "-", $str);
		$str=str_replace("--", "-", $str);
		$str=str_replace("--", "-", $str);
		$str=str_replace("_", "-", $str);
		$str=str_replace("__", "-", $str);
		return $str;		  
	}



	return $name;

}
function createFileName($name,$basename,$i,$root,$duoi){

	if(file_exists($root."/".$name.".".$duoi)){

		return createFileName($basename."(".$i.")",$basename,$i+1,$root,$duoi);
	}

	return $root."/".$name.".".$duoi;
}
if(isset($_POST['submit'])){
	$flag=false;
	if(isset($_FILES['image']) && $_FILES['image']['size']>0){
		if(strpos($_FILES['image']['type'],"image")===0){
			if($_POST['action']==1){
				$arr=explode(".", $_FILES['image']['name']);

				$length=count($arr)-1;
				$name='';
				for($i=0;$i<$length;$i++)
					$name.=$arr[$i];
				$name=formatToUrl($name);
				if(move_uploaded_file($_FILES['image']['tmp_name'],createFileName($name,$name,1,dirname($_SERVER['SCRIPT_FILENAME'])."/public/image/".$_POST['folder'],$arr[$length]))){
					$message="Upload Thành Công";
					$flag=true;
				}else{
					$message="Upload ảnh thất bại";
				}
			}else{
				if(move_uploaded_file($_FILES['image']['tmp_name'],dirname($_SERVER['SCRIPT_FILENAME'])."/public/image/".$_POST['folder']."/".$_FILES['image']['name'])){
					$message="Upload Thành Công";
					$flag=true;
				}else{
					$message="Upload ảnh thất bại";
				}
			}
		}else{
			$message="Vui lòng chọn file hình ảnh.";
		}
	}else{
		$message="Vui lòng chọn hình ảnh để upload.";
	}
}
?>
<link rel="stylesheet" type="text/css" href="{{Asset('public/admin')}}/css/dialog.css" />
<script type="text/javascript" src="{{Asset('public/admin')}}/js/jquery.js"></script>
<script type="text/javascript" src="{{Asset('public/admin')}}/js/dialog.js"></script>
<div style="text-align:center;margin-top:3%">
	<?php if(isset($message)){echo "<div style='margin-bottom:10px;text-align:center;color:red'>".$message."</div>";} ?>
		<form method="post"  action="" enctype="multipart/form-data">
			Chọn Hình Ảnh Từ Máy Tính Của Bạn(<2MB)<br /><br />
			<input type="file" name="image" id="image" /><br /><br />
			Lưu Hình Ảnh Vào Thư Mục:
			<br /><br />
			<label><input checked="check" type="radio" name="folder" value="upload" /> Upload</label>
			<label><input type="radio" name="folder" value="product" /> Sản Phẩm</label> 
			
			<label><input type="radio" name="folder" value="news" /> Tin Tức</label><br />
			
			<label><input type="radio" name="folder" value="slide" /> Slide</label>
			
			<br /><br /><br />
			<input type="button" id="uploadimg" value="Upload Hình Ảnh" />
			<input type="button" value="Hủy Bỏ" onclick="window.location.reload()" />
			<input type="submit" id="submitform" style="display:none" name="submit" />
			<input type="hidden" id="actionform" name="action" value="0" />
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		</form>
	</div>


	<div id="dialog3">
		<div class='header'>
			Thông Báo <i title="close" class="fa fa-remove closedialog"></i>
		</div>
		<div class='ct'>
			Hình ảnh <b></b> đã tồn tại. Bạn muốn?
			<br /><br /><br />
			<input type="button" onclick="XoaAnh();" value="Ghi đè lên ảnh cũ" />

			<input type="button" onclick="GiuAnh();" value="Giữ ảnh cũ" />

			<input type="button" onclick="dialogtrung.hide()" value="Upload ảnh khác" />

	</div>
</div>

<script type="text/javascript">
	var foldername1="upload";
	var dialogtrung=null;
	function LoadJson(url,dt,callback) {
		$.ajax({
			type: "POST",
			url: url,
			dataType: 'json',
			data:dt,
			beforeSend: function(){
			},
			success: callback,
			error: function (e, e2, e3) {
			}
		});
	}
	function GiuAnh(){
		$("#actionform").val(1);
		$("#submitform").click();
	}
	function XoaAnh(){
		$("#actionform").val(0);
		$("#submitform").click();
	}
	$(document).ready(function(){
		$("form input[name='folder']").change(function(){
			foldername1=$(this).val();
		});
		$("#uploadimg").click(function(){
			var objth=$(this);
			if(objth.hasClass("disabled")){
				return false;
			}
			objth.addClass("disabled");
			objth.attr("disabled","disabled");

			var image=document.getElementById("image");
			if(image.files && image.files[0]){
				var filename=foldername1+"/"+image.files[0].name;



				LoadJson("{{Asset('admin/upload/checkfile')}}",{"filename":filename,"_token":"{{csrf_token()}}"},function(result){
					objth.removeClass("disabled");
					objth.removeAttr("disabled");
					if(result==1){
						if(dialogtrung==null){
							dialogtrung=new dialog($("#dialog3"),{
								"width":400,
								"height":150
							});
							dialogtrung.init();
						}
						dialogtrung.getObj().find(".ct b").html(image.files[0].name);
						dialogtrung.show();
					}else{
						$("#submitform").click();
					}
				});	
			}
		});
	});
</script>
<?php if(isset($flag) && $flag){ ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#refreshuploadend",window.parent.document).attr("data-value","<?php echo $_POST['folder']; ?>").click();
		$('.tabupload .tabitem li:eq(0)', window.parent.document).click();
		
	});
</script>

<?php } ?>
