<!doctype html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Wishlist</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		
</header>
<body>
		<!-- MAIN-MENU-AREA END -->
		<!-- MAIN-CONTENT-SECTION START -->
@extends("masterpage")
@section("miss")
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="{{Asset('')}}">Home <span><i class="fa fa-caret-right"></i> </span> </a>
							<a href="my-account.html"> my account <span><i class="fa fa-caret-right"></i></span></a>
							<span> My wishlists</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">					
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<!-- SINGLE SIDEBAR TAG START -->
						<div class="product-left-sidebar">
							<h2 class="left-title pro-g-page-title">Tags </h2>
							<div class="category-tag">
								<a href="#">fashion</a>
								<a href="#">handbags</a>
								<a href="#">men</a>
								<a href="#">Kids</a>
								<a href="#">women</a>
								<a href="#">New</a>
								<a href="#">Accessories</a>
								<a href="#">clothing</a>
								<a href="#">New</a>
							</div>
						</div>	
						<!-- SINGLE SIDEBAR TAG END -->
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<h2 class="page-title">My wishlists</h2>
						<!-- WISHLISTS-AREA START -->
						<!-- <div class="wishlists-area">
							<form class="new-wishlists-box primari-box" id="savewishlist" method="post" action="#">
								<h3 class="box-subheading">New wishlist</h3>
								<div class="primary-box-content">
									<div class="form-group wishlists-form-group primary-form-group">
										<label for="wishlist">Name</label>
										<input type="text" value="" name="wishlist" id="wishlist" class="form-control input-feild white">
									</div>
									<div class="submit-button">
										<a href="#" id="savewishlish" class="btn main-btn">Save <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</form>								
						</div> -->
						<!-- WISHLISTS-AREA END -->
						<!-- WISHLISTS-CHART START -->
						<!-- <div class="wishlists-chart table-responsive">
							<table class="table table-bordered">
								<tr>
									<th class="wish-name">Name</th>
									<th class="wish-qty">Qty</th>
									<th class="wish-view">Viewed</th>
									<th class="wish-create">Created</th>
									<th class="wish-link">Direct Link</th>
									<th class="wish-default">Default</th>
									<th class="wish-delete">Delete</th>
								</tr>
								<tr>
									<td>
										<a href="#">My wishlist </a>
									</td>
									<td>
										<span>3</span>
									</td>
									<td>
										<span>0</span>
									</td>
									<td>
										<span>2015-08-06</span>
									</td>
									<td>
										<a href="#">View </a>
									</td>
									<td>
										<span><i class="fa fa-check-square"></i></span>
									</td>
									<td>
										<a class="dele-wish-list" href="#"><i class="fa fa-close"></i></a>
									</td>
								</tr>
							</table>
						</div>	 -->
						<!-- WISHLISTS-CHART END -->
						<!-- WISHLISTS-ITEM START -->
						<div class="wishlists-item">
							<!-- <div class="wishlists-item-title">
								<a href="#">Hide product show bought products' info <i class="fa fa-close"></i></a>
							</div>
							<div class="Permalink">
								<p>Permalink:</p>
								<input type="text" readonly="readonly" value="htpp://bootexpert.com/product/single-item" class="form-control view-permalink">
								<a href="#" class="send-wish-list">Send this wishlist</a>
							</div> -->
							<div class="wishlists-all-item">
								<div class="row">
								<?php $i=-1 ?>
									@foreach($product as $values)
									<div class="col-md-3 col-sm-4 col-xs-12">
										<!-- WISHLISTS-SINGLE-ITEM START -->
										<div class="wishlists-single-item">
											<div class="wishlist-image">
												<a href="{{Asset('products')}}/{{$values[0]->id}}/{{$convert->convertString($values[0]->name)}}.html"><img src="{{$values[0]->image}}" title="{{$values[0]->name}}" alt="{{$values[0]->name}}" /></a>
											</div>
											<div class="wishlist-title">
												<p><?php echo $values[0]->name; $i++; ?><a id="abc" href="javascript:void(0)"><i class="fa fa-close deletewishlist" id="{{$wishlistID[$i]}}"></i></a></p>
											</div>
											<!-- <div class="form-group primary-form-group wishlists-form-group">
												<label>Quantity: </label>
												<input type="text" value="1" name="quantity" class="form-control input-feild">
											</div>
											<div class="form-group primary-form-group wishlists-form-group">
												<label>Priority: </label>
												<div class="wish-prioriti">
													<select name="wishprioriti" id="wishPrioriti1">
														<option value="">High</option>
														<option value="">Medium</option>
														<option value="">Low</option>
													</select>												
												</div>											
											</div>	
											<a class="wish-save" href="#">Save</a> -->									
										</div>
										<!-- WISHLISTS-SINGLE-ITEM END -->
									</div>
									@endforeach	
																		
								</div>
								<!-- WISH-LIST BACT HOME START-->
								<div class="wish-back-link">
									<a  class="wish-save" href="my-account.html"><i class="fa fa-chevron-left"></i> Back to Your Account</a>
									<a  class="wish-save" href="{{Asset('')}}"><i class="fa fa-chevron-left"></i> Home</a>
								</div>
								<!-- WISH-LIST BACT HOME END -->
							</div>
						</div>	
						<!-- WISHLISTS-ITEM END -->
					</div>
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<!-- BRAND-CLIENT-AREA START -->
		@stop
    </body>

</html>