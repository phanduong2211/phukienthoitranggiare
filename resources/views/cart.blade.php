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
							<span>Giỏ hàng</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPPING-CART SUMMARY START -->
						<h2 class="page-title"><span class="shop-pro-item">Giỏ hàng của bạn có : <?php if(Session::has("cart")) echo count(Session::get("cart"))-1; else echo '0'; ?> sản phẩm</span></h2>
						<!-- SHOPPING-CART SUMMARY END -->
					</div>	
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPING-CART-MENU START -->
						<!-- <div class="shoping-cart-menu">
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
						</div> -->
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
									<?php $totalprice =0; ?>
									@foreach($product as $values)
									<tr>
										<td class="cart-product">
											<a href="#"><img alt="{{$values[0]->name}}" title="{{$values[0]->name}}" src="{{$convert->showImage($values[0]->image)}}"></a>
										</td>
										<td class="cart-description">
											<p class="product-name"><a href="{{Asset('products')}}/{{$values[0]->id}}/{{$convert->convertString($values[0]->name)}}.html">{{$values[0]->name}}</a></p>
											<small><a href="javascript:void(0)">Size : 
											<select style="width:20%" name="size" class="size">
											<?php $Size = count(explode(",",$convert->getSize($values[0]->size)));
												$Color =count(explode(",",$convert->getColor($values[0]->size))); 
												$totalprice += number_format($values[0]->promotion_price);?>
											@for($i=0;$i < count($Size) ;$i++)
												<option>{{$Size[$i]}}</option>
											@endfor
											</select></a></small>
											<small><a href="javascript:void(0)">Color : 
											<select style="width:20%" name="color" class="color">
											@for($i=0;$i < count($Color);$i++)
												<option>{{$Color[$i]}}</option>
											@endfor
											</select></a></small>
										</td>
										<td class="cart-avail"><span class="label label-success"><?php if($values[0]->quantity >3) echo "Còn hàng"; else if($values[0]->quantity > 0) echo "Còn ít hàng"; else echo "Hết hàng" ?></span></td>
										<td class="cart-unit">
											<ul class="price text-right">
												<li class="price special-price"><span class="promotion_price-match">{{number_format($values[0]->promotion_price)}}</span> vnđ</li>
												<li class="price-percent-reduction small">&nbsp;<span class="promotion-price-match">0</span>%&nbsp;</li>
												<li class="old-price"><span class="price-match">{{number_format($values[0]->price)}}</span> vnđ</li>
											</ul>
										</td>
										<td class="cart_quantity text-center">
											<div class="">
												<input min="1" class="cart-plus-minus quantity-product" type="number" name="qtybutton" value="1">
											</div>
										</td>
										<td class="cart-delete text-center">
											<a href="javascript:void(0)" class="cart_quantity_delete" data-index= "{{$i}}" data-id="{{$values[0]->id}}" title="Delete"><i class="fa fa-trash-o"></i></a>
										</td>
										<td class="cart-total">
											<span class="price total-price">{{number_format($values[0]->promotion_price)}}</span> vnđ
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
										<td class="text-right" colspan="3">Tổng cộng: </td>
										<td id="total_product" class="price" colspan="1">{{number_format($totalprice*1000)}} vnđ</td>
									</tr>
									<tr>
										<td class="text-right" colspan="3">Phí ship</td>
										@if($totalprice*1000>1000000)
											<td id="total_shipping" class="price" colspan="1">0</td> vnđ
										@else <td  class="price" colspan="1"><span id="total_shipping">15,000</span> vnđ</td> 
										@endif
									</tr>
									<tr>
										<td class="total-price-container text-right" colspan="3">
											<span>Tổng: </span>
										</td>
										<td id="total-price-container" class="price" colspan="1">
										@if($totalprice*1000>1000000)
											<span id="total-all-price">{{number_format($totalprice*1000)}}</span> vnđ
											@else <span id="total-all-price">{{number_format($totalprice*1000+15000)}}</span> vnđ
										@endif
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
					@if(Session::has("login_name") && Session::has('login'))
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="first_item primari-box mycartaddress-info">
							<!-- SINGLE ADDRESS START -->
							<ul class="address">
								<li>
									<h3 class="page-subheading box-subheading">
										Thông tin địa chỉ của bạn
									</h3>
								</li>
								<li><span class="address_name">Tên: {{$user->name}}</span></li> 
								<li><span class="address_company">Số Điện thoại: {{$user->phone}}</span></li>
								<li><span class="address_address1">Email: {{$user->email}}</span></li>
								<li><span class="address_address2">Địa chỉ: {{$user->address}}</span></li>
								<li class="update-button">
									<a href="my-cart-step-2-info.html">Update<i class="fa fa-chevron-right"></i></a>
								</li>
							</ul>

							<!-- SINGLE ADDRESS END -->
						</div>						
					</div>
					@endif
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- RETURNE-CONTINUE-SHOP START -->
						<div class="returne-continue-shop">
							<a href="{{Asset("")}}" class="continueshoping"><i class="fa fa-chevron-left"></i>Quay về trang chủ</a>
							@if(Session::has('cart')) @if(count(Session::get('cart'))>0) <a href="javascript:void(0)" id="ord" style="float:right" class="btn btn-primary">Thanh Toán <i class="fa fa-chevron-right"></i></a>@endif @endif
						</div>	
						<!-- RETURNE-CONTINUE-SHOP END -->						
					</div>
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<!-- BRAND-CLIENT-AREA START -->
		@stop