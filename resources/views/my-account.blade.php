@extends("masterpage")
@section("miss")
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="index.html">HOMe</a>
							<span><i class="fa fa-caret-right	"></i></span>
							<span>My account</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">My account</h2>
					</div>	
					<div class="account-info-text">
						Welcome to your account. Here you can manage all of your personal information and orders.
					</div>
					<!-- ACCOUNT-INFO-TEXT START -->
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="account-info">
							<div class="single-account-info">
								<ul>
									<li><a href="#"><i class="fa fa-building"></i><span>Add my first address</span>	</a></li>
									<li><a href="#"><i class="fa fa-list-ol"></i><span>Order history and details</span>	</a></li>
									<li><a href="#"><i class="fa fa-file-o"></i><span>My credit slips</span>	</a></li>
									<li><a href="checkout-address.html"><i class="fa fa-building"></i><span>My addresses</span>	</a></li>
									<li><a href="checkout-registration.html"><i class="fa fa-user"></i><span>My personal information</span>	</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="account-info">
							<div class="single-account-info">
								<ul>
									<li><a href="wishlist.html"><i class="fa fa-heart"></i><span>My wishlists</span>	</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- ACCOUNT-INFO-TEXT END -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BACK TO HOME START -->
						<div class="home-link-menu">
							<ul>
								<li><a href="index.html"><i class="fa fa-chevron-left"></i> Home</a></li>
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