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
		$arrex=array('png','jpg','jpeg','gif','bmp');
		$fileleg=count($_FILES['image']['name']);
		for ($i=0; $i <$fileleg ; $i++) { 
			if($_FILES['image']['size'][$i]>0 && strpos($_FILES['image']['type'][$i],"image")===0){
					$arr=explode(".", $_FILES['image']['name'][$i]);
					$length=count($arr)-1;
					if(!in_array($arr[$length], $arrex)){
						continue;
					}
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
			
			<label for="image" style="display:block;width:520px;margin:10px auto;" id="areauploadfile" class="hoverarea">
				<input type="file" name="image[]" multiple="multiple" id="image" /><br />
				<div id="hiddenaup">
					<img src="{{Asset('public/image')}}/pVbuU.png" />
					<h1>Chọn hình ảnh để upload.<small>(png, jpg, jpeg, gif, bmp)</small></h1><br /><span style="color:#888;font-size:14px">Bạn có thể upload nhiều hình ảnh 1 lúc bằng cách giữ phím Ctrl và chọn các hình</span><br /><br />
				</div>
				<div id="hiddebup">
					<h3 id="slfile"></h3>
					Lưu Hình Ảnh Vào Thư Mục:
					<div style="height:7px"></div>
					<input style="padding:4px;border:1px solid #ccc;outline:none" onkeydown="return false;" type="text" value="upload" name="folder" id="foldersave" /><input type="button" id="choosefolder" style="padding:3px 6px" value="..." />
					<br /><br /><br />
			
				</div>
				<div stype="height:10px"></div>
			</label>
				<div id="inputform">
			
				<input type="submit" id="submitform" value="Upload Hình Ảnh" name="submit" />
				<input type="reset" value="Hủy Bỏ" id="caupload" />
				</div>
			
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		</form>
	</div>


<style type="text/css">
h1 small{
	color:#888;
	display: block;
	font-size: 14px;
	font-weight: normal;
}
#hiddebup{
	display: none;
}
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
	padding: 20px 0px;
	border:1px dashed #a100a1;
	background-color: #F9E9F9;
}
#areauploadfile #image{
	display: none;
}
#areauploadfile img{
	display: block;
	width: 80px;
	margin: 0px auto;
}
#slfile{
	margin-top: 0px;
	padding-top: 0px;
	color:#a100a1;
}
.hoverarea:hover{
	cursor: pointer;
}
#areauploadfile h1{
	font-size: 20px;
	color:#a100a1;
}
#dialog4{
	-moz-user-select: none;
  -khtml-user-select: none;
  -webkit-user-select: none;
  user-select: none;
}
#submitform{
	background-color: #721799;
    border: 1px solid #721799;
    color: white;
    padding: 7px 10px;
}
#submitform:hover{
	background-color: #a100a1;
    border: 1px solid #a100a1;
    cursor: pointer;
}
#caupload{
	background-color: #F7A400;
    border: 1px solid #F7A400;
    color: white;
    padding: 7px 10px;
}
#caupload:hover{
	background-color: #FCB322;
    border: 1px solid #FCB322;
    cursor: pointer;
}
#inputform{
	display: none;
	margin-top: -60px;
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
	$(document).ready(function(){
		$("form input[name='folder']").change(function(){
			foldername1=$(this).val();
		});
		$("label#areauploadfile").click(function(){
			if(!$(this).hasClass("hoverarea"))
			return false;
		});
		$("#areauploadfile input[type='file']").change(function(){
			$("#hiddebup").show();
			$("#hiddenaup").hide();
			$("#inputform").show();
			$("#slfile").html(this.files.length+" hình ảnh được chọn.");

			$("#areauploadfile").css("padding-bottom","30px").removeClass("hoverarea");
		});
		
		$("#caupload").click(function(){
			$("#hiddebup").hide();
			$("#hiddenaup").show();
			$("#inputform").hide();
			$("#areauploadfile").css("padding-bottom","20px").addClass("hoverarea");
		});
		$("#foldersave").focus(function(){
			$("#choosefolder").click();
		});
		$("#choosefolder").click(function(){
			if(dialogchoosefolder==null){
				dialogchoosefolder=new dialog($("#dialog4"),{
				"width":300,
				"height":275,
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