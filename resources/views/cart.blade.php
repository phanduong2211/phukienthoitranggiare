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
        <title>Cart</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		
		</header>
		<!-- MAIN-MENU-AREA END -->
		<!-- MAIN-CONTENT-SECTION START -->
<body>
@extends("masterpage")
@section("miss")
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="index.html">Home</a>
							<span><i class="fa fa-caret-right	"></i></span>
							<span>Giỏ hàng</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPPING-CART SUMMARY START -->
						<h2 class="page-title">Shopping-cart summary <span class="shop-pro-item">Giỏ hàng của bạn có : <?php echo count(Session::get("cart"))-1; ?> sản phẩm</span></h2>
						<!-- SHOPPING-CART SUMMARY END -->
					</div>	
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPING-CART-MENU START -->
						<div class="shoping-cart-menu">
							<ul class="step">
								<li class="step-current first">
									<span>01. Summary</span>
								</li>
								<li class="step-todo second">
									<span>02. Sign in</span>
								</li>
								<li class="step-todo third">
									<span>03. Address</span>
								</li>
								<li class="step-todo four">
									<span>04. Shipping</span>
								</li>
								<li class="step-todo last" id="step_end">
									<span>05. Payment</span>
								</li>
							</ul>									
						</div>
						<!-- SHOPING-CART-MENU END -->
						<!-- CART TABLE_BLOCK START -->
						<?php if(Session::has("cart") && count(Session::get("cart"))>1){ $i=0; ?>
						<div class="table-responsive">
							<!-- TABLE START -->
							<table class="table table-bordered" id="cart-summary">
								<!-- TABLE HEADER START -->
								<thead>
									<tr>
										<th class="cart-product">Sản phẩm</th>
										<th class="cart-description">Thông tin</th>
										<th class="cart-avail text-center">Tình trạng</th>
										<th class="cart-unit text-right">Giá</th>
										<th class="cart_quantity text-center">Số lượng</th>
										<th class="cart-delete">&nbsp;</th>
										<th class="cart-total text-right">Thành tiền</th>
									</tr>
								</thead>
								<!-- TABLE HEADER END -->
								<!-- TABLE BODY START -->
								<tbody>	
									
									<!-- SINGLE CART_ITEM START -->
									
									@foreach($product as $values)
									<tr>
										<td class="cart-product">
											<a href="#"><img alt="Blouse" src="{{Asset('')}}{{$values[0]->image}}"></a>
										</td>
										<td class="cart-description">
											<p class="product-name"><a href="{{Asset('products')}}/{{$values[0]->id}}/{{$convert->convertString($values[0]->name)}}.html">{{$values[0]->name}}</a></p>
											<small>SKU : demo_5</small>
											<small><a href="javascript:void(0)">Size : M, Color : Blue</a></small>
										</td>
										<td class="cart-avail"><span class="label label-success"><?php if($values[0]->quantity >3) echo "Còn hàng"; else if($values[0]->quantity > 0) echo "Còn ít hàng"; else echo "Hết hàng" ?></span></td>
										<td class="cart-unit">
											<ul class="price text-right">
												<li class="price special-price">{{number_format($values[0]->promotion_price)}} vnđ</li>
												<li class="price-percent-reduction small">&nbsp;-7.05%&nbsp;</li>
												<li class="old-price">{{number_format($values[0]->price)}} vnđ</li>
											</ul>
										</td>
										<td class="cart_quantity text-center">
											<div class="cart-plus-minus-button">
												<input class="cart-plus-minus quantity-product" type="text" name="qtybutton" value="1">
											</div>
										</td>
										<td class="cart-delete text-center">
											<a href="javascript:void(0)" class="cart_quantity_delete" data-index= "{{$i}}" data-id="{{$values[0]->id}}" title="Delete"><i class="fa fa-trash-o"></i></a>
										</td>
										<td class="cart-total">
											<span class="price">{{number_format($values[0]->promotion_price)}} vnđ</span>
										</td>
									</tr>
									<?php $i++;?>
									@endforeach

									<!-- SINGLE CART_ITEM END -->
								</tbody>
								<!-- TABLE BODY END -->
								<!-- TABLE FOOTER START -->
								<tfoot>										
									<tr class="cart-total-price">
										<td class="cart_voucher" colspan="3" rowspan="4"></td>
										<td class="text-right" colspan="3">Total products (tax excl.)</td>
										<td id="total_product" class="price" colspan="1">$76.46</td>
									</tr>
									<tr>
										<td class="text-right" colspan="3">Total shipping</td>
										<td id="total_shipping" class="price" colspan="1">$5.00</td>
									</tr>
									<tr>
										<td class="text-right" colspan="3">Total vouchers (tax excl.)</td>
										<td class="price" colspan="1">$0.00</td>
									</tr>
									<tr>
										<td class="total-price-container text-right" colspan="3">
											<span>Total</span>
										</td>
										<td id="total-price-container" class="price" colspan="1">
											<span id="total-price">$76.46</span>
										</td>
									</tr>
								</tfoot>		
								<!-- TABLE FOOTER END -->									
							</table>
							<!-- TABLE END -->
						</div>
						<?php }else echo '<h1 style="text-align:center">Giỏ hàng trống</h1><br>'?>
						<!-- CART TABLE_BLOCK END -->
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="first_item primari-box mycartaddress-info">
							<!-- SINGLE ADDRESS START -->
							<ul class="address">
								<li>
									<h3 class="page-subheading box-subheading">
										Delivery address (BootExperts Office)
									</h3>
								</li>
								<li><span class="address_name">BootExperts</span></li>
								<li><span class="address_company">Web development Company</span></li>
								<li><span class="address_address1">Bonossri</span></li>
								<li><span class="address_address2">D-Block</span></li>
								<li><span class="">Rampura</span></li>
								<li><span class="">Dhaka</span></li>
								<li><span class="address_phone">+880 1735161598</span></li>
								<li><span class="address_phone_mobile">+880 1975161598</span></li>
							</ul>	
							<!-- SINGLE ADDRESS END -->
						</div>						
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="second_item primari-box mycartaddress-info">
							<!-- SINGLE ADDRESS START -->
							<ul class="address">
								<li>
									<h3 class="page-subheading box-subheading">
										Invoice address (BootExperts Home)
									</h3>
								</li>
								<li><span class="address_name">BootExperts</span></li>
								<li><span class="address_company">Web development Company</span></li>
								<li><span class="address_address1">Dhaka</span></li>
								<li><span class="address_address2">Bonossri</span></li>
								<li><span class="">Dhaka-1205</span></li>
								<li><span class="">Rampura</span></li>
								<li><span class="address_phone">+880 1735161598</span></li>
								<li><span class="address_phone_mobile">+880 1975161598</span></li>
							</ul>	
							<!-- SINGLE ADDRESS END -->
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- RETURNE-CONTINUE-SHOP START -->
						<div class="returne-continue-shop">
							<a href="index.html" class="continueshoping"><i class="fa fa-chevron-left"></i>Continue shopping</a>
							<a href="checkout-signin.html" class="procedtocheckout">Proceed to checkout<i class="fa fa-chevron-right"></i></a>
						</div>	
						<!-- RETURNE-CONTINUE-SHOP END -->						
					</div>
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<!-- BRAND-CLIENT-AREA START -->
		@stop
    </body>

</html>