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
	if(isset($_FILES['image'])){
		$message=0;
		$fileleg=count($_FILES['image']['name']);
		for ($i=0; $i <$fileleg ; $i++) { 
			if($_FILES['image']['size'][$i]>0 && strpos($_FILES['image']['type'][$i],"image")===0){
					$arr=explode(".", $_FILES['image']['name'][$i]);
					$length=count($arr)-1;
					$name='';
					for($j=0;$j<$length;$j++)
						$name.=$arr[$j];
					$name=formatToUrl($name);
					if(move_uploaded_file($_FILES['image']['tmp_name'][$i],createFileName($name,$name,1,dirname($_SERVER['SCRIPT_FILENAME'])."/public/image/".$_POST['folder'],$arr[$length]))){
						$message++;
						$flag=true;
					}
			}
		}
		$message="Upload thành công ".$message."/".$fileleg." hình ảnh";
		echo "<div style='margin-bottom:10px;text-align:center;color:red'>".$message."</div>";
		header("Location: ".Asset('admin/uploadimage?keyupload='.$_GET['keyupload']));
	}else{

		$message="Vui lòng chọn hình ảnh để upload.";
		echo "<div style='margin-bottom:10px;text-align:center;color:red'>".$message."</div>";
		header("Location: ".Asset('admin/uploadimage?keyupload='.$_GET['keyupload']));
	}
}
?>
<link rel="stylesheet" type="text/css" href="{{Asset('public/admin')}}/css/dialog.css" />
<script type="text/javascript" src="{{Asset('public/admin')}}/js/jquery.js"></script>
<script type="text/javascript" src="{{Asset('public/admin')}}/js/dialog.js"></script>
<div style="text-align:center;margin-top:3%">
	
		<form method="post"  action="" enctype="multipart/form-data">
			Chọn Hình Ảnh Từ Máy Tính Của Bạn(<2MB). <br /><span style="color:#888;font-size:13px">( Có thể chọn nhiều ảnh 1 lúc )</span><br /><br />
			<label style="padding:10px 0px;cursor:pointer;display:block;width:300px;margin:10px auto;border:1px solid #ddd" id="areauploadfile">
			<input type="file" name="image[]" multiple="multiple" id="image" /><br /><br />
			</label>
			Lưu Hình Ảnh Vào Thư Mục:
			<div style="height:7px"></div>
			<input style="padding:4px;border:1px solid #ccc;outline:none" onkeydown="return false;" type="text" value="upload" name="folder" id="foldersave" /><input type="button" id="choosefolder" style="padding:3px 6px" value="..." />
			
			<br /><br /><br />
			<input type="submit" id="submitform" value="Upload Hình Ảnh" name="submit" />
			<input type="reset" value="Hủy Bỏ" />
			
			
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		</form>
	</div>


<style type="text/css">
#dialog4 .ct li{
	border:1px solid #fff;
	display: block;
	padding: 3px 7px;
	list-style: none;
	margin-bottom: 2px;
}
#dialog4 .ct li.active,#dialog4 .ct li:hover{
	border:1px solid #C1C1FF;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    background-color: rgba(237, 245, 253,0.6);
    cursor: pointer;
}
#dialog4 #footerchoose{
	padding: 10px 20px;
	background-color: #eee;
	height: 45px;
}
#areauploadfile{
	border-radius: 3px;
}
#areauploadfile:hover{
	border:1px solid #AFAEAE !important;
}
#dialog4{
	-moz-user-select: none;
  -khtml-user-select: none;
  -webkit-user-select: none;
  user-select: none;
}
</style>

<div id="dialog4">
		<div class='header'>
			Chọn Folder <i title="close" class="fa fa-times closedialog"></i>
		</div>
		<div class='ct'>
			<div id="areachoosefolder">
				<li data-value="upload">Upload</li>
				<li data-value="product">Sản Phẩm</li>
				<li data-value="news">Tin Tức</li>
				<li data-value="slide">Slide</li>
				<li data-value="ads">Quảng Cáo</li>
			</div>
			
		</div>
		<div id="footerchoose">
				Folder Name: <input type="text" onkeydown="return false" id="foldercurrentname" style="padding:2px;border:1px solid #ccc;width:60%;outline:none" /><br />
				<div style="float:right;margin-top:7px">
				<input type="button" id="selectedfolder" value="Chọn" />
				<input type="button" value="Đóng" onclick="dialogchoosefolder.hide()" />
				</div>
			</div>
</div>

<script type="text/javascript">
	var foldername1="upload";
	var dialogchoosefolder=null;
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

		$("#choosefolder").click(function(){
			if(dialogchoosefolder==null){
				dialogchoosefolder=new dialog($("#dialog4"),{
				"width":300,
				"height":270,
				"ttop":125,
				"outside":false,
				"hidedim":true
				});
				dialogchoosefolder.init();
				$("#selectedfolder").click(function(){
					$("#foldersave").val($("#foldercurrentname").val());
					dialogchoosefolder.hide();
				});
			}
			var value=$("#foldersave").val();
			dialogchoosefolder.getObj().find("#foldercurrentname").val(value);
			
			dialogchoosefolder.getObj().find("#areachoosefolder li").each(function(){
				if($(this).attr("data-value")==value){
					$(this).addClass("active");
				}
			}).click(function(){
				if(!$(this).hasClass("active")){
					$(this).parent().find(".active").removeClass("active");
					$(this).addClass("active");
					dialogchoosefolder.getObj().find("#foldercurrentname").val($(this).attr("data-value"));
				}
			}).dblclick(function(){
				$("#foldersave").val($(this).attr("data-value"));
				dialogchoosefolder.hide();
			});
			dialogchoosefolder.show();
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
