@extends("masterpage")
@section("miss")
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="{{Asset('')}}">Trang chủ</a>
							<span><i class="fa fa-caret-right"></i></span>
							<span>Đăng Nhập / Đăng Ký</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Đăng Nhập / Đăng Ký</h2>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<!-- CREATE-NEW-ACCOUNT START -->
						<div class="create-new-account">
							<form class="new-account-box primari-box" id="create-new-account" method="post" action="AccountCreate">
								<h3 class="box-subheading">Tạo tài khoản</h3>
								<div class="form-content">
									<?php if(Session::get('email_register')==false && Session::has('email_register')) echo "<div class='alert alert-danger'>
									  	<strong>Lỗi!</strong> Email này đã được đăng ký.
									</div>";Session::forget('email_register'); ?>
									<p>Nhập vào địa chỉ email để tạo tài khoản</p>								
									
									<div class="form-group primary-form-group p-info-group">
										<label for="name">Tên <sup>*</sup></label>
										<input type="text" value="" name="name" id="name" class="form-control input-feild" required>
									</div>	
									<div class="form-group primary-form-group p-info-group">
										<label>Giới tính</label>
										<span class="radio-box">
											<input id="radio1" type="radio" name="sex" value="1" checked="checked" required>
											<label for="radio1">Nam</label>
										</span>
										<span class="radio-box">
											<input id="radio2" type="radio" name="sex" value="2">
											
											<label for="radio2">Nữ</label>
										</span>
									</div>								
									<div class="form-group primary-form-group p-info-group">
										<label for="email">Email<sup>*</sup></label>
										<input type="email" value="" name="email" id="email" class="form-control input-feild" required>
									</div>
									<div class="form-group primary-form-group p-info-group">
										<label for="email">Phone<sup>*</sup></label>
										<input type="phone" value="" name="phone" id="phone" class="form-control input-feild" required>
									</div>									
									<div class="form-group primary-form-group p-info-group">
										<label for="password">Mật khẩu <sup>*</sup></label>
										<input type="password" value="" name="password" id="password" class="form-control input-feild" required>
										<span class="min-pass">(mật khẩu tối thiểu 5 ký tự)</span>
									</div>
									<div class="form-group primary-form-group p-info-group">
										<label for="confirm_password">Nhập lại mật khẩu <sup>*</sup></label>
										<input type="password" value="" name="confirm_password" id="confirm_password" class="form-control input-feild" required>
									</div>
									<div class="form-group primary-form-group p-info-group">
										<label for="date">Ngày sinh <sup>*</sup></label>
										<input type="Date" value="" name="date" id="date" class="form-control input-feild" required>
									</div>									
									<div class="submit-button">
										<button class="btn btn-danger" id="register" type="submit">Tạo tài khoản</button>
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
							<form class="new-account-box" action="signinCreate" id="accountLogin" method="post" action="post">
								<h3 class="box-subheading">Bạn đã có tài khoản?</h3>
								<div class="form-content">
									<?php if(Session::get('login')==false && Session::has('login')) echo "<div class='alert alert-danger'>
									  	<strong>Lỗi!</strong> Tên đăng nhập hoặc mật khẩu không đúng.
									</div>";Session::forget('login'); ?>
									<div class="form-group primary-form-group">
										<label for="loginemail">Email</label>
										<input type="text" value="" name="email" id="loginemail" class="form-control input-feild" required>
									</div>
									<div class="form-group primary-form-group">
										<label for="password">Password</label>
										<input type="password" value="" name="password" id="password" class="form-control input-feild" required>
									</div>
									<div class="forget-password">
										<p><a href="#">Quên mật khẩu?</a></p>
									</div>
									<button class="btn btn-primary" type="submit">Đăng nhập</button>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">										 
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