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
        <title>{{$product[0]->name}}</title>
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
							<a href="{{Asset('')}}">Trang Chủ<span><i class="fa fa-caret-right"></i> </span> </a>
							<span> <i class="fa fa-caret-right"> </i> </span>
							<a href="{{Asset('')}}product/{{$convert->convertString($category['name'])}}">{{$category['name']}}</a>
							<span>{{$product[0]->name}}</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>				
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<!-- SINGLE-PRODUCT-DESCRIPTION START -->
						<div class="row">
							<div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
								<div class="single-product-view">
									  <!-- Tab panes -->
									<div class="tab-content">
										<?php $images = explode(",",$detailproduct[0]->images); 
										for($i=0;$i<count($images); $i++){?>
										<div class="<?php if($i==0) echo "tab-pane active"; else echo "tab-pane"; ?>" id="thumbnail_<?php echo $i+1?>">
											<div class="single-product-image">
												<img src="{{Asset('')}}<?php echo $images[$i];?>" alt="single-product-image" />
												<a class="new-mark-box" href="#">new</a>
												<a class="fancybox" href="{{Asset('')}}<?php echo $images[$i];?>" alt="single-product-image" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
											</div>

										</div>
										<?php }?>
										<!-- <div class="tab-pane" id="thumbnail_2">
											<div class="single-product-image">
												<img src="{{Asset('')}}public/img/product/sale/3.jpg" alt="single-product-image" />
												<a class="new-mark-box" href="#">new</a>
												<a class="fancybox" href="{{Asset('')}}public/img/product/sale/3.jpg" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
											</div>	
										</div>
										<div class="tab-pane" id="thumbnail_3">
											<div class="single-product-image">
												<img src="{{Asset('')}}public/img/product/sale/9.jpg" alt="single-product-image" />
												<a class="new-mark-box" href="#">new</a>
												<a class="fancybox" href="{{Asset('')}}public/img/product/sale/9.jpg" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
											</div>	
										</div>
										<div class="tab-pane" id="thumbnail_4">
											<div class="single-product-image">
												<img src="{{Asset('')}}public/img/product/sale/13.jpg" alt="single-product-image" />
												<a class="new-mark-box" href="#">new</a>
												<a class="fancybox" href="{{Asset('')}}public/img/product/sale/13.jpg" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
											</div>	
										</div>
										<div class="tab-pane" id="thumbnail_5">
											<div class="single-product-image">
												<img src="{{Asset('')}}public/img/product/sale/7.jpg" alt="single-product-image" />
												<a class="new-mark-box" href="#">new</a>
												<a class="fancybox" href="{{Asset('')}}public/img/product/sale/7.jpg" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
											</div>	
										</div>
										<div class="tab-pane" id="thumbnail_6">
											<div class="single-product-image">
												<img src="{{Asset('')}}public/img/product/sale/12.jpg" alt="single-product-image" />
												<a class="new-mark-box" href="#">new</a>
												<a class="fancybox" href="{{Asset('')}}public/img/product/sale/12.jpg" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
											</div>	
										</div> -->
									</div>										
								</div>
								<div class="select-product">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs select-product-tab bxslider">
										<?php $images = explode(",",$detailproduct[0]->silebar_images); 
										for($i=0;$i<count($images); $i++){?>
										<li class="<?php if($i==0) echo 'active';?>">
											<a href="#thumbnail_<?php echo $i+1?>" data-toggle="tab"><img src="{{Asset('')}}<?php echo $images[$i];?>" alt="Không thể hiển thị hình ảnh" /></a>
										</li>
										<?php }?>
										<!-- <li>
											<a href="#thumbnail_2" data-toggle="tab"><img src="{{Asset('')}}public/img/product/sidebar_product/2.jpg" alt="pro-thumbnail" /></a>
										</li>
										<li>
											<a href="#thumbnail_3" data-toggle="tab"><img src="{{Asset('')}}public/img/product/sidebar_product/3.jpg" alt="pro-thumbnail" /></a>
										</li>
										<li>
											<a href="#thumbnail_4" data-toggle="tab"><img src="{{Asset('')}}public/img/product/sidebar_product/4.jpg" alt="pro-thumbnail" /></a>
										</li>
										<li>
											<a href="#thumbnail_5" data-toggle="tab"><img src="{{Asset('')}}public/img/product/sidebar_product/5.jpg" alt="pro-thumbnail" /></a>
										</li>
										<li>
											<a href="#thumbnail_6" data-toggle="tab"><img src="{{Asset('')}}public/img/product/sidebar_product/6.jpg" alt="pro-thumbnail" /></a>
										</li> -->
									</ul>										
								</div>
							</div>
							<div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
								<div class="single-product-descirption">
									<h2>{{$product[0]->name}}</h2>
									<div class="single-product-social-share">
										<ul>
											<li><a href="#" class="twi-link"><i class="fa fa-twitter"></i>Tweet</a></li>
											<li><a href="#" class="fb-link"><i class="fa fa-facebook"></i>Share</a></li>
											<li><a href="#" class="g-plus-link"><i class="fa fa-google-plus"></i>Google+</a></li>
											<li><a href="#" class="pin-link"><i class="fa fa-pinterest"></i>Pinterest</a></li>
										</ul>
									</div>
									<!-- <div class="single-product-review-box">
										<div class="rating-box">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-empty"></i>
										</div>
										<div class="read-reviews">
											<a href="#">Read reviews (1)</a>
										</div>
										<div class="write-review">
											<a href="#">Write a review</a>
										</div>		
									</div> -->
									<div class="single-product-condition">
										<!-- <p>Reference: <span>demo_1</span></p> -->
										<p>Status: <span>{{$product[0]->status}}</span></p>
									</div>
									<div class="single-product-price">
										<h2>{{number_format($product[0]->promotion_price)}} vnđ</h2>
									</div>
									<div class="single-product-desc">
										<p>{{$product[0]->content}}</p>
										<div class="product-in-stock">
											<p>{{$product[0]->quantity}} Items<span><?php if($product[0]->quantity >3) echo "Còn hàng"; else if($product[0]->quantity > 0) echo "Còn ít hàng"; else echo "Hết hàng" ?></span></p>
										</div>
									</div>
									<div class="single-product-info">
										<a href="#"><i class="fa fa-envelope"></i></a>
										<a href="#"><i class="fa fa-print"></i></a>
										<a href="#"><i class="fa fa-heart"></i></a>
									</div>
									<div class="single-product-quantity">
										<p class="small-title">Số lượng</p> 
										<div class="cart-quantity">
											<div class="cart-plus-minus-button single-qty-btn">
												<input class="cart-plus-minus sing-pro-qty" type="text" name="qtybutton" value="0">
											</div>
										</div>
									</div>
									<div class="single-product-size">
									<p class="small-title">Size </p> 
									<select name="product-size" id="product-size">
										<?php $size = explode(",",$detailproduct[0]->size); 
										for($i=0;$i<count($size); $i++){?>						
										
											<option value=""><?php echo $size[$i]; ?></option>
											<?php }?>
										</select>
									</div>
									<div class="single-product-color">
										<p class="small-title">Color </p>
										 <?php $color = explode(",",$detailproduct[0]->color); 
										for($i=0;$i<count($color); $i++){?>	
										<a href="#"><span style="background:<?php echo $color[$i];?>"></span></a>
										<?php }?>
									</div>
									<div class="single-product-add-cart">
										<a class="add-cart-text" title="Thêm {{$product[0]->name}} vào giỏ hàng" href="#">Thêm vào giỏ hàng</a>
									</div>
								</div>
							</div>
						</div>
						<!-- SINGLE-PRODUCT-DESCRIPTION END -->
						<!-- SINGLE-PRODUCT INFO TAB START -->
						<div class="row">
							<div class="col-sm-12">
								<div class="product-more-info-tab">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs more-info-tab">
										<li class="active"><a href="#moreinfo" data-toggle="tab">Thông tin chi tiết</a></li>
										<li><a href="#datasheet" data-toggle="tab">Thông số</a></li>
										<li><a href="#review" data-toggle="tab">Nhận xét</a></li>
									</ul>
									  <!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active" id="moreinfo">
											<div class="tab-description">
												<p>{{$detailproduct[0]->infomation}}</p>
											</div>
										</div>
										<div class="tab-pane" id="datasheet">
											<div class="deta-sheet">
												{{$detailproduct[0]->data_sheet}}
												<!-- <table class="table-data-sheet">			
													<tbody>
														<tr class="odd">
															<td>Compositions</td>
															<td>Cotton</td>
														</tr>
														<tr class="even">
															<td class="td-bg">Styles</td>
															<td class="td-bg">Casual</td>
														</tr>
														<tr class="odd">
															<td>Properties</td>
															<td>Short Sleeve</td>
														</tr>
													</tbody>
												</table> -->				
											</div>
										</div>
										<div class="tab-pane" id="review">
											{{$detailproduct[0]->comment}}
											<!-- <div class="row tab-review-row">

												<div class="col-xs-5 col-sm-4 col-md-4 col-lg-3 padding-5">
													<div class="tab-rating-box">
														<span>Grade</span>
														<div class="rating-box">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-half-empty"></i>
														</div>	
														<div class="review-author-info">
															<strong>write A REVIEW</strong>
															<span>06/22/2015</span>
														</div>															
													</div>
												</div>
												<div class="col-xs-7 col-sm-8 col-md-8 col-lg-9 padding-5">
													<div class="write-your-review">
														<p><strong>write A REVIEW</strong></p>
														<p>write A REVIEW</p>
														<span class="usefull-comment">Was this comment useful to you? <span>Yes</span><span>No</span></span>
														<a href="#">Report abuse </a>
													</div>
												</div>
												<a href="#" class="write-review-btn">Write your review!</a>
											</div> -->
										</div>
									</div>									
								</div>
							</div>
						</div>
						<!-- SINGLE-PRODUCT INFO TAB END -->
						<!-- RELATED-PRODUCTS-AREA START -->
						<div class="row">
							<div class="col-sm-12">
								<div class="left-title-area">
									<h2 class="left-title">Sản phẩm liên quan</h2>
								</div>	
							</div>
							<div class="related-product-area featured-products-area">
								<div class="col-sm-12">
									<div class=" row">
										<!-- RELATED-CAROUSEL START -->
										<div class="related-product">
										@foreach($relatedproducts as $values)
											<!-- SINGLE-PRODUCT-ITEM START -->
											<div class="item">
												<div class="single-product-item">
													<div class="product-image">
														<a href="{{Asset('products')}}/{{$values->id}}/{{$convert->convertString($values->name)}}.html"><img src="{{Asset('')}}{{$values->image}}" alt="{{$values->name}}" title="{{$values->name}}"/></a>
													</div>
													<div class="product-info">
														<div class="customar-comments-box">
															<!-- <div class="rating-box">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-half-empty"></i>
															</div> -->
															<div class="review-box">
																<span>{{$values->view}} View</span>
															</div>
														</div>
														<a href="{{Asset('products')}}/{{$values->id}}/{{$convert->convertString($values->name)}}.html" style="text-transform:uppercase">{{$values->name}}</a>
														<div class="price-box">
															<span class="price">{{number_format($values->promotion_price)}} vnđ</span>
															<span class="old-price">{{number_format($values->price)}} vnđ</span>
														</div>
													</div>
												</div>							
											</div>
											<!-- SINGLE-PRODUCT-ITEM END -->
										@endforeach
										</div>
										<!-- RELATED-CAROUSEL END -->
									</div>	
								</div>
							</div>	
						</div>
						<!-- RELATED-PRODUCTS-AREA END -->
					</div>
					<!-- RIGHT SIDE BAR START -->
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<!-- SINGLE SIDE BAR START -->
						<div class="single-product-right-sidebar">
							<h2 class="left-title">Sản phầm xem nhiều</h2>
							<ul>
								<li>
									<a href="#"><img src="{{Asset('')}}public/img/product/sidebar_product/2.jpg" alt="" /></a>
									<div class="r-sidebar-pro-content">
										<h5><a href="#">Faded Short ...</a></h5>
										<p>Faded short sleeves t-shirt with high...</p>
									</div>
								</li>								
							</ul>
						</div>	
						<!-- SINGLE SIDE BAR END -->
						<!-- SINGLE SIDE BAR START -->
						<div class="single-product-right-sidebar clearfix">
							<h2 class="left-title">Tags </h2>
							<div class="category-tag">
								<a href="#">fashion</a>
								<a href="#">handbags</a>
								<a href="#">women</a>
								<a href="#">men</a>
								<a href="#">kids</a>
								<a href="#">New</a>
								<a href="#">Accessories</a>
								<a href="#">clothing</a>
								<a href="#">New</a>
							</div>							
						</div>	
						<!-- SINGLE SIDE BAR END -->
						<!-- SINGLE SIDE BAR START -->	
						@if(count($ads)>0)											
						<div class="single-product-right-sidebar">
							<div class="slider-right zoom-img">
								<a href="{{$ads[0]->url}}"><img class="img-responsive" src="{{Asset('')}}{{$ads[0]->image}}" alt="{{$ads[0]->name}}" /></a>
							</div>							
						</div>
						@endif
					</div>
					<!-- SINGLE SIDE BAR END -->				
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<!-- BRAND-CLIENT-AREA START -->
		@stop
    </body>

</html>