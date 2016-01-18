@extends("masterpage")
@section("miss")
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="{{Asset('')}}">Trang chủ</a>
							<span><i class="fa fa-caret-right	"></i></span>
							<span>Tài khoản</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Tài khoản</h2>
					</div>	
					<!-- <div class="account-info-text">
						Welcome to your account. Here you can manage all of your personal information and orders.
					</div> -->
					<!-- ACCOUNT-INFO-TEXT START -->
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="account-info">
							<div class="single-account-info">
								<ul>
									<li><a href="{{Asset('')}}info-account.html"><i class="fa fa-user"></i><span>Thông tin cá nhân</span>	</a></li>
									<li><a href="{{Asset('')}}info-order.html"><i class="fa fa-list-ol"></i><span>Thông tin đơn hàng</span>	</a></li>
									<li><a href="{{Asset('')}}wishlist.html"><i class="fa fa-heart"></i><span>Sản phẩm yêu thích</span>	</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<!-- ACCOUNT-INFO-TEXT END -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BACK TO HOME START -->
						<div class="home-link-menu">
							<ul>
								<li><a href="{{Asset('')}}"><i class="fa fa-chevron-left"></i> Trang chủ</a></li>
							</ul>
						</div>
						<!-- BACK TO HOME END -->
					</div>
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<!-- BRAND-CLIENT-AREA START -->
@stop