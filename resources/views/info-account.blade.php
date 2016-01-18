@extends("masterpage")
@section("miss")
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="{{Asset('')}}">Trang chủ ></a>							
							<span><a href="{{Asset('')}}my-account.html">Tài khoản ></a></span>
							<span>Thông tin cá nhân</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Thông tin tài khoản</h2>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<!-- CREATE-NEW-ACCOUNT START -->
						<div class="create-new-account">
							<form class="new-account-box primari-box" id="create-new-account" method="post" action="AccountUpdate">
								<!-- <h3 class="box-subheading">Tạo tài khoản</h3> -->
								<div class="form-content">									
									<p>bổ sung thông tin của bạn</p>
									<?php if(Session::has("updateSuccess")) 								
										echo '<div class="alert alert-success">
										  <strong>Thành công!</strong> Thông tin của bạn đã được cập nhật.
										</div>'; Session::forget("updateSuccess");
										?>
									<div class="form-group primary-form-group p-info-group">
										<label for="name">Tên <sup>*</sup></label>
										<input type="text" value="{{$user->name}}" name="name" id="name" class="form-control input-feild" required>
									</div>	
									<div class="form-group primary-form-group p-info-group">
										<label>Giới tính</label>
										@if($user->sex==1)
										<span class="radio-box">
											<input id="radio1" type="radio" name="sex" value="1" checked="checked" required>
											<label for="radio1">Nam</label>
										</span>
										<span class="radio-box">
											<input id="radio2" type="radio" name="sex" value="2">
											
											<label for="radio2">Nữ</label>
										</span>
										@else
										<span class="radio-box">
											<input id="radio1" type="radio" name="sex" value="1" required>
											<label for="radio1">Nam</label>
										</span>
										<span class="radio-box">
											<input id="radio2" type="radio" name="sex" checked="checked" value="2">
											
											<label for="radio2">Nữ</label>
										</span>
										@endif
									</div>								
									<div class="form-group primary-form-group p-info-group">
										<label for="email">Email<sup>*</sup></label>
										<input type="email" value="{{$user->email}}" name="email" id="email" class="form-control input-feild" required>
									</div>
									<div class="form-group primary-form-group p-info-group">
										<label for="email">Phone<sup>*</sup></label>
										<input type="phone" value="{{$user->phone}}" name="phone" id="phone" class="form-control input-feild" required>
									</div>									
									
									<div class="form-group primary-form-group p-info-group">
										<label for="date">Ngày sinh <sup>*</sup></label>
										<input type="Date" value="{{$user->date}}" name="date" id="date" class="form-control input-feild" required>
									</div>
									<div class="form-group primary-form-group p-info-group">
										<label for="address">Địa chỉ<sup></sup></label>
										<input type="text" value="{{$user->address}}" name="address" id="address" class="form-control input-feild" required>
									</div>									
									<div class="submit-button">
										<button class="btn btn-primary" id="register" type="submit">Save</button>
										<input type="hidden" name="_token" value="{{ csrf_token() }}">		
									</div>
								</div>
							</form>							
						</div>
						<!-- CREATE-NEW-ACCOUNT END -->
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						
						<!-- REGISTERED-ACCOUNT START -->
						<div class="primari-box registered-account">
							<form class="new-account-box" action="changepass" id="accountLogin" method="post">
								<h3 class="box-subheading">Đổi mật khẩu</h3>
								<?php 
								if(Session::has("updateNotMath")){
									echo '<div class="alert alert-danger">
										  <strong>Thất bại!</strong> Mật khẩu nhập lại không giống nhau.
										</div>'; 
									Session::forget("updateNotMath");
								}
								else if(Session::has("updateSuccessPass") && Session::get("updateSuccessPass")=="true") 								
										echo '<div class="alert alert-success">
										  <strong>Thành công!</strong> Mật khẩu của bạn đã được thay đổi.
										</div>'; 
										else if(Session::has("updateSuccessPass") && Session::get("updateSuccessPass")=="false")
											echo '<div class="alert alert-danger">
										  <strong>Thất bại!</strong> Mật khẩu bạn nhập vào không đúng.
										</div>'; 
										Session::forget("updateSuccessPass");
										?>
								<div class="form-content">									
									<div class="form-group primary-form-group p-info-group">
										<label for="password_old">Mật khẩu cũ<sup>*</sup></label>
										<input type="password" value="" name="password_old" id="password_old" class="form-control input-feild" required>
										<span class="min-pass">(mật khẩu tối thiểu 5 ký tự)</span>
									</div>
									<div class="form-group primary-form-group p-info-group">
										<label for="password">Mật khẩu mới <sup>*</sup></label>
										<input type="password" value="" name="password" id="password" class="form-control input-feild" required>
									</div>
									<div class="form-group primary-form-group">
										<label for="confirm_password">Nhập lại mật khẩu mới <sup>*</sup></label>
										<input type="password" value="" name="confirm_password" id="confirm_password" class="form-control input-feild" required>
									</div>
									<br>
									<input type="hidden" name="_token" value="{!! csrf_token() !!}">
									<button class="btn btn-primary" type="submit">Save</button>								 
								</div>
							</form>							
						</div>
						<!-- REGISTERED-ACCOUNT END -->
					</div>
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<!-- BRAND-CLIENT-AREA START -->

		@stop