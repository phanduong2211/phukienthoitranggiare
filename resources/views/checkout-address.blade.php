@extends("masterpage")
@section("miss")
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="index.html">Trang chủ</a>
							<span><i class="fa fa-caret-right	"></i></span>
							<span>Địa chỉ</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Địa chỉ</h2>
					</div>	
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPING-CART-MENU START -->
						<!-- <div class="shoping-cart-menu">
							<ul class="step">
								<li class="step-todo first step-done">
									<span><a href="cart.html">01. Summary</a></span>
								</li>
								<li class="step-todo second step-done">
									<span><a href="checkout-signin.html">02. Sign in</a></span>
								</li>
								<li class="step-current third">
									<span>03. Address</span>
								</li>
								<li class="step-todo four">
									<span>04. Shipping</span>
								</li>
								<li class="step-todo last" id="step_end">
									<span>05. Payment</span>
								</li>
							</ul>									
						</div> -->
						<!-- SHOPING-CART-MENU END -->
					</div>
					<!-- ADDRESS AREA START --> 
					<!-- <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
						<div class="form-group primary-form-group p-info-group deli-address-group">
							<label>Choose a delivery address:</label>
							<div class="birth-day delivery-address">
								<select id="deli-address" name="deliveryaddress">
									<option value="">Your Office Address</option>
									<option value="">Your Office Address</option>
									<option value="">Other Address</option>
								</select>												
							</div>
						</div>	
						<div class="form-group primary-form-group p-info-group chose-address">
							<label class="cheker">
								<input type="checkbox" name="checkbox">
								<span></span>
							</label>
							<a href="#">Use the delivery address as the billing address.</a>
						</div>							
					</div> -->
				</div>
				<div class="row">
				<form action="order" method="post">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

						<div class="first_item primari-box">
							<!-- DELIVERY ADDRESS START -->
							<ul class="address">
								<li>
									<h3 class="page-subheading box-subheading">
										Nhập Thông tin để nhận sản phẩm
									</h3>
								</li>
								<li><span class="address_name">Họ và Tên: </span><input required type="text" class="form-control" name="name" /></li>
								<li><span class="address_company">Số ĐT: </span><input required type="text" class="form-control" name="phone" /></li>
								<li><span class="address_address1">Địa Chỉ: </span><input required type="text" class="form-control" name="address" /></li>
								<li><span class="address_address2">Email: </span><input required type="email" class="form-control" name="email" /></li>
								<li><span class="">Giới Tính: </span><select name="sex" required class="form-control"><option>Anh</option><option>Chị</option></select></li>
																
							</ul>	
							<!-- DELIVERY ADDRESS END -->
						</div>						
					</div>
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="add-new-address">
							
							<div class="form-group p-info-group type-address-group">
								<label>Ghi chú: </label>
								<textarea class="form-control input-feild " name="addcomment"></textarea>
							</div>							
						</div>
						<!-- ADDRESS AREA START --> 
						<!-- RETURNE-CONTINUE-SHOP START -->
						<div class="returne-continue-shop ship-address">
							<a href="{{Asset('')}}" class="continueshoping"><i class="fa fa-chevron-left"></i>Quay về trang chủ</a>
							<button style="float:right" type="submit" id="" class="procedtocheckout btn btn-primary">Thanh toán <i class="fa fa-chevron-right"></i></button>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
						</div>	
						<!-- RETURNE-CONTINUE-SHOP END -->		
					</div>
				</form>					
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<!-- BRAND-CLIENT-AREA START -->
		@stop