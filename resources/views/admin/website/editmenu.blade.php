@extends('layouts.admin')

@section('title', 'Sửa Menu')
@section('css')
<link rel="stylesheet" type="text/css" href="{{Asset('public/admin')}}/css/validate.css" />
@endsection
@section('script')
 <script src="{{Asset('public/admin')}}/js/validate.js" ></script>
<script type="text/javascript">
	$(function(){
		$("#nav-accordion>li:eq(2)>a").addClass("active").parent().find("ul>li:eq(0)").addClass("active");
		$("#frm").kiemtra([
    		{
    			'name':'name',
    			'trong':true
    		},{
    			'name':'root',
    			'select':true
    		}
    	]);

          $("select[name='root']").val("<?php echo $data->root ?>");
	});
</script>
@endsection
@section('content')
<h1 class="titlepage"><a href='{{Asset('admin/website/menu')}}'><i class="fa fa-chevron-circle-left"></i></a> Sửa Menu</h1>
@if(Session::has('message'))
        <p class="message hidemessage"> {{ Session::get('message') }}
        <i class="pull-right fa fa-times-circle"></i>
        </p>
@endif
    <form method="post" action="" id="frm">
    	<div class="row">
    		<div class="col-md-2">
    			Tên Menu:
    		</div>
    		<div class="col-md-10 require">
    			<div class="red">*</div>
    			<textarea class="form-control" name="name">{{$data->name}}</textarea>
    			
    		</div>
    	</div><br />
    	<div class="row">
    		<div class="col-md-6">
    			<div class="row">
    				<div class="col-md-4">
    					Thuộc Menu:
    				</div>
    				<div class="col-md-8 require">
    					<div class="red">*</div>
    					<select name="root" class="form-control">
    						<option value="-1">--Lựa Chọn--</option>
    						<option value="0">Không Thuộc</option>
    					    <?php 
                           function dequy($parentid,$arr,$text = ''){
                                foreach ($arr as $key => $value) {
                                    if($value->root==$parentid){?>
                                        <option value="{{$value->id}}">{{$text.$value->name}}</option>
                                        <?php 
                                        dequy($value->id,$arr,$text.'--');
                                    }
                                }
                            }
                       dequy(0,$dataall);
                            ?>
                        </select>
    					<span class="desc">Nếu không thuộc menu nào thì chọn không thuộc</span>
    				</div>
    			</div><br />
    		</div>
    		<div class="col-md-6">
    			<div class="row">
    				<div class="col-md-4">
    					Url:
    				</div>
    				<div class="col-md-8">
    					<input type="text" name="url" class="form-control" value="{{$data->url}}" />
    					<span class="desc">vd: gioi-thieu</span>
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

@endsection