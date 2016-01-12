@extends('layouts.admin')

@section('title', 'Thêm Sản Phẩm')
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
    display: none;
}
.boxupload .showimage:hover{
    cursor: pointer;
    text-decoration: underline;
}
.boxupload .showimg{
    width: 100px;
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
    		}
    	]);

        $("#gionggiagoc").change(function(){
            var objprice=$("#frm input[name='price']");
            if(this.checked){
                var price=$("#frm input[name='promotion_price']").val();
               
                if(price!=""){
                    objprice.attr("data-old",objprice.val()).val(price).attr("disabled","disabled");
                }else{
                    $(this).prop("checked",!this.checked);
                }
            }else{
                objprice.val(objprice.attr("data-old")).removeAttr('disabled');
            }
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
	});

    function showImg(input) {
        if (input.files && input.files[0]) {
            if(isImage(input.files[0].name)){
                var reader = new FileReader();
                reader.onload = function (e) {
                   $(".boxupload .showimg").attr("src",e.target.result);
                }
                $(".boxupload span.filename").html(input.files[0].name+".").parent().find(".showimage").show();
                reader.readAsDataURL(input.files[0]);
            }else{
                alert("vui lòng chọn 1 hình ảnh");
            }
        }
    }
</script>
@endsection
@section('content')
<h1 class="titlepage"><a href='{{Asset('admin/product')}}'><i class="fa fa-chevron-circle-left"></i></a> Thêm Sản Phẩm</h1>
@if(Session::has('message'))
        <p class="message hidemessage"> {{ Session::get('message') }}
        <i class="pull-right fa fa-times-circle"></i>
        </p>
@endif
    <form method="post" action="" id="frm">
    	<div class="row">
    		<div class="col-md-2">
    			Tên Sản Phẩm:
    		</div>
    		<div class="col-md-10 require">
    			<div class="red">*</div>
    			<textarea class="form-control" name="name"></textarea>
    			
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
                        <input type="text" name="promotion_price" class="form-control" />
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
                       <label style="font-weight:normal"><input type="checkbox" id="gionggiagoc" data-old="" /> Giống giá gốc</label>
                        <input type="text" name="price" class="form-control" />
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
                            <input type="text" name="image" class="form-control" />
                            <i class="fa fa-upload addon-icon" id="upload" title="upload image"></i>
                            <input type="file" name="image_upload" class="file" />
                        </div>
                        <div class="boxupload">
                            <span class="filename"></span>
                            <span class="showimage"> Xem hình ảnh</span>
                            <img src="" class="showimg" />
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
                       <input type="text" name="quantity" class="form-control" value="0" />
                        <span class="desc">Số lượng hiện có của sản phẩm. Nếu chưa có hàng thì điền là 0</span>
                    </div>
                </div><br />
            </div>
        </div>
    	<div class="row">
    		<div class="col-md-12 text-right">
    			<input type="submit" class="btn btn-success" value="Lưu Lại" />
    			<input type="reset" class="btn btn-default" value="Nhập Lại" />
    		</div>
    	</div><br />
    	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
    </form>

@endsection