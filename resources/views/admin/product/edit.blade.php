@extends('layouts.admin')

@section('title', 'Cập Nhật Sản Phẩm')
@section('css')
<link rel="stylesheet" type="text/css" href="{{Asset('public/admin')}}/css/validate.css" />
<style type="text/css">
    .addon{
    position: relative;
}
.addon-right .addon-icon{
    position: absolute;
    top:10px;
    right: 10px;
    cursor: pointer;
    color:#888;
}
.addon-right .addon-icon:hover{
    cursor: pointer;
    color:#333;
}
.addon-right .file{
    display: none;
}
.boxupload .showimg{
    display: none;
}
.boxupload span{
    color:#999;
    font-size: 11px;
}
.boxupload .showimage{
    color:blue;
}
.boxupload .showimage:hover{
    cursor: pointer;
    text-decoration: underline;
}
.boxupload .showimg{
    width: 100px;
}
.tabs{
    margin-bottom:15px;
    border-bottom:1px solid #ccc;
}
.tabs li{
    list-style: none;
    display: block;
    float: left;
    margin-right: 30px;
    padding-bottom: 5px;
    color:#999;
}
.tabs li:hover,.tabs li.active{
    cursor: pointer;
    color: #000;
}
#detailproduct{
    display: none;
}
</style>
@endsection
@section('script')
 <script src="{{Asset('public/admin')}}/js/validate.js" ></script>
<script type="text/javascript">
	$(function(){
		$("#nav-accordion>li:eq(1)>a").addClass("active").parent().find("ul>li:eq(1)").addClass("active");
		$("#frm").kiemtra([
    		{
    			'name':'name',
    			'trong':true
    		},
            {
                'name':'promotion_price',
                'gia':true,
                'message':'Vui lòng nhập giá gốc'
            },
            {
                'name':'price',
                'gia':true,
                'message':'Vui lòng nhập giá sản phẩm'
            },
            {
                'name':'original_price',
                'gia':true,
                'message':'Vui lòng nhập giá sỉ'
            },
            {
                'name':'image',
                'url':true,
                'isnull':true
            },
            {
                'name':'image_upload',
                'file':true,
                'typefile':'image',
                'isnull':true
            },
            {
                'name':'quantity',
                'so':true
            },
            {
                'name':'menuID',
                'select':true
            },
            {
                'name':'categoryID',
                'select':true
            }
    	],function(){
            if($("#frm input[name='image_upload']").val().length>0){

            }else{
                var obj=$("#frm input[name='image']");
                if(obj.val().trim()==""){
                    obj.addClass("error");
                        if(!obj.next('.errortext').length){
                            obj.after("<span class='errortext'></span>");
                    }
                    obj.next('.errortext').show().html("Vui lòng chọn hình ảnh.");
                    obj.on("change",function(){
                        $(this).off('change').removeClass('error').next(".errortext").hide();
                    });
                    return false;
                }
            }
            return true;
        });

        
        $("#upload").click(function(){
            $(this).parent().find(".file").click().change(function(){
                showImg(this);
            });

        });
        $(".boxupload .showimage").click(function(){
            if($(this).html()==" Xem hình ảnh"){
                $(this).parent().find(".showimg").show();
                $(this).html(" Ẩn hình ảnh");
            }else{
                $(this).parent().find(".showimg").hide();
                $(this).html(" Xem hình ảnh");
            }
        });
        $(".tabs li").click(function(){
            if(!$(this).hasClass("active")){
                var oldid=$(this).parent().find(".active").removeClass("active").attr("data-id");
                $(this).addClass("active");
                $("#"+oldid).hide();
                var id=$(this).attr("data-id");
                $("#"+id).show();
            }
        });
	});

    function showImg(input) {
        if (input.files && input.files[0]) {
            if(isImage(input.files[0].name)){
                var reader = new FileReader();
                reader.onload = function (e) {
                   $(".boxupload .showimg").attr("src",e.target.result);
                }
                $(".boxupload span.filename").html(input.files[0].name+".").parent().find(".showimage").show();
                $("#frm input[name='image']").removeClass("error").next(".errortext").hide();
                reader.readAsDataURL(input.files[0]);
            }else{
                alert("vui lòng chọn 1 hình ảnh");
            }
        }
    }
</script>
@endsection
@section('content')
<h1 class="titlepage"><a href='{{Asset('admin/product')}}'><i class="fa fa-chevron-circle-left"></i></a> Cập Nhật Sản Phẩm</h1>
<div class="tabs clearfix">
    <li class="active" data-id="infoproduct">Thông Tin Sản Phẩm</li>
    <li data-id="detailproduct">Chi Tiết Sản Phẩm</li>
</div>
<!--Infotab-->
<div id="infoproduct">
@if(Session::has('message'))
        <p class="message hidemessage"> {{ Session::get('message') }}
        <i class="pull-right fa fa-times-circle"></i>
        </p>
@endif

<?php 
function showImage($path){
    if(strpos($path, "http")===0)
        return $path;
    return Asset('public/image/upload').'/'.$path;
}
?>

    <form method="post" action="" id="frm" name="frm" enctype="multipart/form-data">
    	<div class="row">
    		<div class="col-md-2">
    			Tên Sản Phẩm:
    		</div>
    		<div class="col-md-10 require">
    			<div class="red">*</div>
    			<textarea class="form-control" name="name">{{$data->name}}</textarea>
    			
    		</div>
    	</div>
        <br />
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        Giá Gốc:
                    </div>
                    <div class="col-md-8 require">
                        <div class="red">*</div>
                        <input type="text" name="promotion_price" class="form-control" value="{{number_format($data->promotion_price,0,',','.')}}" />
                        <span class="desc">VD: 1 triệu thì điền 1.000.000 hoặc 1,000,000 hoặc 1 000 000. Nếu chưa có giá thì điền 0</span>
                    </div>
                </div><br />
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        Giá Hiện Tại:
                    </div>
                    <div class="col-md-8 require">
                        <div class="red">*</div>
                
                        <input type="text" name="price" value="{{number_format($data->price,0,',','.')}}" class="form-control" />
                        <span class="desc">Giá bán hiện tại của sản phẩm này.</span>
                    </div>
                </div><br />
            </div>
        </div><br />
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        Giá Nhập Hàng:
                    </div>
                    <div class="col-md-8 require">
                        <div class="red">*</div>
                        <input type="text" name="original_price" class="form-control" value="{{number_format($data->original_price,0,',','.')}}" />
                        <span class="desc">Giá sỉ. Giá này không hiển thị trên website. Chỉ QTV biết giá này</span>
                    </div>
                </div><br />
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        Mô Tả Ngắn Gọn:
                    </div>
                    <div class="col-md-8">
                        <textarea class="form-control" name="content">{{$data->content}}</textarea>
                    </div>
                </div><br />
            </div>
        </div><br />
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        Hình Ảnh:
                    </div>
                    <div class="col-md-8 require">
                        <div class="red">*</div>
                        <div class="addon addon-right">
                            <input type="text" name="image" class="form-control" value="<?php if(strpos($data->image,"http")===0) echo $data->image ?>"  />
                            <i class="fa fa-upload addon-icon" id="upload" title="upload image"></i>
                            <input type="file" name="image_upload" class="file" />
                        </div>
                        <div class="boxupload">
                            <span class="filename"><?php if(!strpos($data->image, "http")===0) echo $data->image."." ?></span>
                            <span class="showimage"> Xem hình ảnh</span>
                            <img src="<?php echo showImage($data->image) ?>" class="showimg" />
                        </div>
                        <span class="desc">Copy url hình ảnh và dán vào hoặc click vào icon upload để upload ảnh mới.</span>
                    </div>
                </div><br />
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        Số Lượng:
                    </div>
                    <div class="col-md-8 require">
                        <div class="red">*</div>
                       <input type="text" name="quantity" class="form-control" value="{{$data->quantity}}" />
                        <span class="desc">Số lượng hiện có của sản phẩm. Nếu chưa có hàng thì điền là 0</span>
                    </div>
                </div><br />
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        Thuộc Menu:
                    </div>
                    <div class="col-md-8 require">
                        <div class="red">*</div>
                        <select name="menuID" class="form-control">
                            <option value="-1">--Lựa Chọn--</option>
                           <?php 
                           function getMinRoot($data){
                            $length=count($data);
                            if($length>0){
                                $min=$data[0]->root;
                                for ($i=1; $i <$length ; $i++) { 
                                    if($data[$i]->root<$min)
                                        $min=$data[$i]->root;
                                }
                                return $min;
                            }
                            return 0;
                        }
                           function dequy($parentid,$arr,$text = ''){
                                foreach ($arr as $key => $value) {
                                    if($value->root==$parentid){?>
                                        <option value="{{$value->id}}">{{$text.$value->name}}</option>
                                        <?php 
                                        dequy($value->id,$arr,$text.'--');
                                    }
                                }
                            }
                       dequy(getMinRoot($datamenu),$datamenu);
                            ?>
                           
                        </select>
                        <span class="desc">Chọn menu hiển thị sản phẩm.</span>
                    </div>
                </div><br />
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        Loại Sản Phẩm:
                    </div>
                    <div class="col-md-8 require">
                        <div class="red">*</div>
                      <select name="categoryID" class="form-control">
                            <option value="-1">--Lựa Chọn--</option>
                            @foreach($datacategory as $value)<option value="{{$value->id}}">{{$value->name}}</option>@endforeach
                        </select>
                    </div>
                </div><br />
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        Tab:
                    </div>
                    <div class="col-md-8">
                        <select name="tab_categoryID" class="form-control">
                            <option value="0">--Lựa Chọn--</option>
                            @foreach($datatabcategory as $value)<option value="{{$value->id}}">{{$value->name}}</option>@endforeach
                        </select>
                      
                    </div>
                </div><br />
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        Trạng Thái:
                    </div>
                    <div class="col-md-8">
                       <select name="status" class="form-control">
                            <option value="new">Mới</option>
                            <option value="sale">Giảm Giá</option>
                            <option value="hot">Hot</option>
                            <option value="promotion">Khuyến Mãi</option>
                            <option value="sell">Bán Chạy</option>
                            <option value="over">Hết Hàng</option>
                            <option value="Ngừng Kinh Doanh">Ngừng Kinh Doanh</option>
                            <option value="Không Kinh Doanh">Không Kinh Doanh</option>
                            <option value="">Không Có</option>
                       </select>
                    </div>
                </div><br />
            </div>
        </div>
    	<div class="row">
    		<div class="col-md-12 text-right">
    			<input type="submit" class="btn btn-success" value="Lưu Lại" />
    			<input type="button" class="btn btn-default btn-reset" value="Hủy Bỏ" />
    		</div>
    	</div><br />
    	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <input type="hidden" name="idedit" value="{{$data->id}}"/>
    </form>
    <script type="text/javascript">
    document.frm.menuID.value="{{$data->menuID}}";
    document.frm.categoryID.value="{{$data->categoryID}}";
    document.frm.tab_categoryID.value="{{$data->tab_categoryID}}";
     document.frm.status.value="{{$data->status}}";
    </script>
</div><!--//Infotab-->
<!--DetailTab-->
<div id="detailproduct">
    detail
</div>
<!--//DetailTab-->
@endsection
