@extends('layouts.admin')

@section('title', 'Thêm Menu')
@section('css')
<link rel="stylesheet" type="text/css" href="{{Asset('public/admin')}}/css/validate.css" />
@endsection
@section('script')
 <script src="{{Asset('public/admin')}}/js/validate.js" ></script>
<script type="text/javascript">
	$(function(){
		$("#nav-accordion>li:eq(3)>a").addClass("active").parent().find("ul>li:eq(0)").addClass("active");
		$("#frm").kiemtra([
    		{
    			'name':'name',
    			'trong':true
    		},{
    			'name':'root',
    			'select':true
    		}
    		,{
    			'name':'url',
    			'trong':true
    		}
    	]);
	});
</script>
@endsection
@section('content')
@if(Session::has('message'))
        <p class="message"> {{ Session::get('message') }}<br>
        </p>
@endif
    <form method="post" action="" id="frm">
    	<div class="row">
    		<div class="col-md-2">
    			Tên Menu:
    		</div>
    		<div class="col-md-10 require">
    			<div class="red">*</div>
    			<textarea class="form-control" name="name"></textarea>
    			
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
    				<div class="col-md-8 require">
    					<div class="red">*</div>
    					<input type="text" name="url" class="form-control" />
    					<span class="desc">vd: gioi-thieu</span>
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