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
        <title>Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		
</header>
<body>
@extends("masterpage")
@section("miss")
		<!-- MAIN-MENU-AREA END -->

		<!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<!-- MAIN-SLIDER-AREA START -->
					<div class="main-slider-area">
						<!-- SLIDER-AREA START -->
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							<div class="slider-area">
								<div id="wrapper">
									<div class="slider-wrapper">
										<div id="mainSlider" class="nivoSlider">
											<?php $i=0;?>
											@foreach($slideshow as $values)
											
											<img src="{{$values->image}}" alt="main slider" title="#htmlcaption{{$i}}"/>
											<?php $i++ ?>
											@endforeach
										</div>
										<?php $i=0;?>
										@foreach($slideshow as $values)
										
										<div id="htmlcaption{{$i}}" class="nivo-html-caption slider-caption">
											<div class="slider-progress"></div>
											<div class="slider-cap-text slider-text1">
												<div class="d-table-cell">
													<h2 class="animated bounceInDown">{{$values->name}}</h2>
													<p class="animated bounceInUp">{{$values->content}}</p>	
													<a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="{{$values->url}}">Chi Tiết <i class="fa fa-caret-right"></i></a>													
												</div>
											</div>
										</div>
										<?php $i++ ?>
										@endforeach
										<!-- <div id="htmlcaption2" class="nivo-html-caption slider-caption">
											<div class="slider-progress"></div>
											<div class="slider-cap-text slider-text2">
												<div class="d-table-cell">
													<h2 class="animated bounceInDown">BEST THEMES</h2>
													<p class="animated bounceInUp">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod ut laoreet dolore magna aliquam erat volutpat.</p>	
													<a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="#">Read More <i class="fa fa-caret-right"></i></a>
												</div>
											</div>
										</div> -->
									</div>
								</div>								
							</div>							
						</div>
						<!-- SLIDER-AREA END -->
						<!-- SLIDER-RIGHT START -->
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<div class="slider-right zoom-img m-top">
								<a href="#"><img class="public/img-responsive" src="public/img/product/cms11.jpg" alt="sidebar left" /></a>
							</div>
						</div>
						<!-- SLIDER-RIGHT END -->
					</div>
					<!-- MAIN-SLIDER-AREA END -->
				</div>
				<!-- TOW-COLUMN-PRODUCT START -->
				<div class="row tow-column-product">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<!-- NEW-PRODUCT-AREA START -->
						<div class="new-product-area">
							<div class="left-title-area">
								<h2 class="left-title">Sản phẩm mới</h2>
							</div>						
							<div class="row">
								<div class="col-xs-12">
									<div class="row">
										<!-- NEW-PRO-CAROUSEL START -->
										<div class="new-pro-carousel">
											<!-- NEW-PRODUCT-SINGLE-ITEM START -->
											@foreach($product as $values)
											@if($values->status=="new")
											<div class="item">
												<div class="new-product">
													<div class="single-product-item">
														<div class="product-image">
															<a href="#"><img src="{{$values->image}}" title="{{$values->name}}" alt="{{$values->name}}" /></a>
															<a href="#" class="new-mark-box">{{$values->icon_status}}</a>
															<div class="overlay-content">
																<ul>
																	<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
																	<li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
																	<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
																	<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
																</ul>
															</div>
														</div>
														<div class="product-info">
															<div class="customar-comments-box">
																<!-- <div class="rating-box">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-half-empty"></i>
																	<i class="fa fa-star-half-empty"></i>
																</div> -->
																<div class="review-box">
																	<span>{{$values->view}} View</span>
																</div>																
															</div>
															<a  title="{{$values->name}}" href="single-product.html" style="text-transform: uppercase;">{{$values->name}}</a>
															<div class="price-box">
																<span class="price">{{number_format($values->price)}} vnđ</span>
																<span class="old-price">{{number_format($values->promotion_price)}} vnđ</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											@endif
											@endforeach
											<!-- NEW-PRODUCT-SINGLE-ITEM END -->
																				
										</div>
										<!-- NEW-PRO-CAROUSEL END -->
									</div>
								</div>
							</div>
						</div>
						<!-- NEW-PRODUCT-AREA END -->
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<!-- SALE-PRODUCTS START -->
						<div class="Sale-Products">
							<div class="left-title-area">
								<h2 class="left-title">Sản phẩm khuyến mãi</h2>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<div class="row">
										<!-- SALE-CAROUSEL START -->
										<div class="sale-carousel">
										@foreach($product as $values)
										@if($values->status=="sale")
											<!-- SALE-PRODUCTS-SINGLE-ITEM START -->
											<div class="item">
												<div class="new-product">
													<div class="single-product-item">
														<div class="product-image">
															<a href="#"><img src="{{$values->image}}" title="{{$values->name}}" alt="{{$values->name}}" /></a>
															<a href="#" class="new-mark-box">{{$values->icon_status}}</a>
															<div class="overlay-content">
																<ul>
																	<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
																	<li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
																	<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
																	<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
																</ul>
															</div>
														</div>
														<div class="product-info">
															<div class="customar-comments-box">
																<div class="rating-box">
																	<!-- <i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-half-empty"></i>
																	<i class="fa fa-star-half-empty"></i> -->
																</div>
																<div class="review-box">
																	<span>{{$values->view}} View</span>
																</div>
															</div>
															<a title="{{$values->name}}" href="single-product.html" style="text-transform: uppercase;">{{$values->name}}</a>
															<div class="price-box">
																<span class="price">{{number_format($values->price)}}</span>
																<span class="old-price">{{number_format($values->promotion_price)}}</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- SALE-PRODUCTS-SINGLE-ITEM END -->
										@endif
										@endforeach									
										</div>
										<!-- SALE-CAROUSEL END -->
									</div>
								</div>
							</div>
						</div>
						<!-- SALE-PRODUCTS END -->
					</div>
				</div>
				<!-- TOW-COLUMN-PRODUCT END -->
				<div class="row">
					<!-- ADD-TWO-BY-ONE-COLUMN START -->
					<div class="add-two-by-one-column">
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<div class="tow-column-add zoom-img">
								<a href="#"><img src="public/img/product/shope-add1.jpg" alt="shope-add" /></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="one-column-add zoom-img">
								<a href="#"><img src="public/img/product/shope-add2.jpg" alt="shope-add" /></a>
							</div>								
						</div>
					</div>
					<!-- ADD-TWO-BY-ONE-COLUMN END -->
				</div>
				<div class="row">
					<!-- FEATURED-PRODUCTS-AREA START -->
					<div class="featured-products-area">
						<div class="center-title-area">
							<h2 class="center-title">Sản Phẩm nổi bật</h2>
						</div>	
						<div class="col-xs-12">
							<div class="row">
								<!-- FEARTURED-CAROUSEL START -->
								<div class="feartured-carousel">
								@foreach($product as $values)
								@if($values->status=="featured")
									<!-- SINGLE-PRODUCT-ITEM START -->
									<div class="item">
										<div class="single-product-item">
											<div class="product-image">
												<a href="#"><img src="{{$values->image}}" title="{{$values->name}}" alt="{{$values->name}}" /></a>
												<a href="#" class="new-mark-box">{{$values->icon_status}}</a>
												<div class="overlay-content">
													<ul>
														<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
													</ul>
												</div>
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
												<a title="{{$values->name}}" href="single-product.html" style="text-transform: uppercase;">{{$values->name}}</a>
												<div class="price-box">
													<span class="price">{{number_format($values->price)}}</span>
													<span class="old-price">{{number_format($values->promotion_price)}}</span>
												</div>
											</div>
										</div>							
									</div>
									<!-- SINGLE-PRODUCT-ITEM END -->
																
								</div>
								<!-- FEARTURED-CAROUSEL END -->
								@endif
								@endforeach
							</div>
						</div>						
					</div>
					<!-- FEATURED-PRODUCTS-AREA END -->
				</div>
				<div class="row">
					<div class="col-xs-12">
						<!-- TAB-BG-PRODUCT-AREA START -->
						<div class="tab-bg-product-area">
							<!-- TAB PANES START -->
							<div class="tab-content bg-tab-content">
								<!-- TABS ONE START-->
								<div role="tabpanel" class="tab-pane active" id="women-tab">
									<div class="bg-tab-content-area tab-carousel-1">
										<!-- TAB-SINGLE-ITEM START -->
										<div class="item">
											<div class="single-product-item">
												<div class="product-image">
													<a href="#"><img src="public/img/product/sale/3.jpg" alt="product-image" /></a>
													<a href="#" class="new-mark-box">new</a>
													<div class="overlay-content">
														<ul>
															<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
															<li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
															<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
															<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
														</ul>
													</div>
												</div>
												<div class="product-info">
													<div class="customar-comments-box">
														<div class="rating-box">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-half-empty"></i>
														</div>
														<div class="review-box">
															<span>1 Review(s)</span>
														</div>
													</div>
													<a href="single-product.html">Short Sleeves T-shirt</a>
													<div class="price-box">
														<span class="price">$16.51</span>
													</div>
												</div>
											</div>							
										</div>
										<!-- TAB-SINGLE-ITEM END -->
									</div>	
								</div>
								<!-- TABS ONE END-->
								<!-- TABS TWO START-->
								<div role="tabpanel" class="tab-pane" id="tops-tab">
									<div class="bg-tab-content-area tab-carousel-2">
										<!-- TAB-SINGLE-ITEM START -->
										<div class="item">
											<div class="single-product-item">
												<div class="product-image">
													<a href="#"><img src="public/img/product/sale/9.jpg" alt="product-image" /></a>
													<a href="#" class="new-mark-box">sale!</a>
													<div class="overlay-content">
														<ul>
															<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
															<li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
															<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
															<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
														</ul>
													</div>
												</div>
												<div class="product-info">
													<div class="customar-comments-box">
														<div class="rating-box">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-half-empty"></i>
															<i class="fa fa-star-half-empty"></i>
														</div>
														<div class="review-box">
															<span>1 Review(s)</span>
														</div>
													</div>
													<a href="single-product.html">Printed Dress</a>
													<div class="price-box">
														<span class="price">$23.40</span>
														<span class="old-price">$26.00</span>
													</div>
												</div>
											</div>							
										</div>
										<!-- TAB-SINGLE-ITEM END -->
									</div>	
								</div>
								<!-- TABS TWO END-->
								<!-- TABS THREE START-->
								<div role="tabpanel" class="tab-pane" id="t-shirts">
									<div class="bg-tab-content-area tab-carousel-3">
										<!-- TAB-SINGLE-ITEM START -->
										<div class="item">
											<div class="single-product-item">
												<div class="product-image">
													<a href="#"><img src="public/img/product/sale/5.jpg" alt="product-image" /></a>
													<a href="#" class="new-mark-box">new</a>
													<div class="overlay-content">
														<ul>
															<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
															<li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
															<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
															<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
														</ul>
													</div>
												</div>
												<div class="product-info">
													<div class="customar-comments-box">
														<div class="rating-box">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-half-empty"></i>
														</div>
														<div class="review-box">
															<span>1 Review(s)</span>
														</div>
													</div>
													<a href="single-product.html">Printed Dress</a>
													<div class="price-box">
														<span class="price">$50.99</span>
													</div>
												</div>
											</div>							
										</div>
										<!-- TAB-SINGLE-ITEM END -->
									</div>					
								</div>
								<!-- TABS THREE END-->
							</div>	
							<!-- TAB PANES END -->
							<!-- TABS MENU START-->
							<div class="tab-carousel-menu">
								<ul class="nav nav-tabs product-bg-nav">
									<li class="active"><a href="#women-tab" data-toggle="tab">Women</a></li>
									<li><a href="#tops-tab" data-toggle="tab">tops</a></li>
									<li><a href="#t-shirts" data-toggle="tab">t-shirts</a></li>
								</ul>
							</div>
							<!-- TABS MENU END-->					
						</div>
						<!-- TAB-BG-PRODUCT-AREA END -->
					</div>
				</div>
				<div class="row">	
					<!-- BESTSELLER-PRODUCTS-AREA START -->
					<div class="bestseller-products-area">
						<div class="center-title-area">
							<h2 class="center-title">Sản phẩm bán chạy</h2>
						</div>	
						<div class="col-xs-12">
							<div class="row">
								<!-- BESTSELLER-CAROUSEL START -->
								<div class="bestseller-carousel">
									<!-- BESTSELLER-SINGLE-ITEM START -->
									@foreach($product as $values)
									@if($values->status == "bestseller")
									<div class="item">
										<div class="single-product-item">
											<div class="product-image">
												<a href="#"><img src="public/img/product/sale/1.jpg" title="{{$values->name}}" alt="{{$values->name}}" /></a>
												<a href="#" class="new-mark-box">{{$values->icon_status}}</a>
												<div class="overlay-content">
													<ul>
														<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
													</ul>
												</div>
											</div>
											<div class="product-info">
												<div class="customar-comments-box">
													<!-- <div class="rating-box">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div> -->
													<div class="review-box">
														<span>{{$values->view}} View</span>
													</div>
												</div>
												<a title="{{$values->name}}" href="single-product.html" style="text-transform: uppercase;">{{$values->name}}</a>
												<div class="price-box">
													<span class="price">{{number_format($values->price)}}</span>
													<span class="old-price">{{number_format($values->promotion_price)}}</span>
												</div>
											</div>
										</div>							
									</div>
									@endif
									@endforeach
									<!-- BESTSELLER-SINGLE-ITEM END -->																
								</div>	
								<!-- BESTSELLER-CAROUSEL END -->
							</div>
						</div>								
					</div>
					<!-- BESTSELLER-PRODUCTS-AREA END -->
				</div>
				<div class="row">
					<!-- IMAGE-ADD-AREA START -->
					<div class="image-add-area">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<!-- ONEHALF-ADD START -->
							<div class="onehalf-add-shope zoom-img">
								<a href="#"><img src="public/img/product/one-helf1.jpg" alt="shope-add" /></a>
							</div>
							<!-- ONEHALF-ADD END -->
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<!-- ONEHALF-ADD START -->
							<div class="onehalf-add-shope zoom-img">
								<a href="#"><img src="public/img/product/one-helf2.jpg" alt="shope-add" /></a>
							</div>
							<!-- ONEHALF-ADD END -->
						</div>						
					</div>
					<!-- IMAGE-ADD-AREA END -->
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<!-- LATEST-NEWS-AREA START -->
		<section class="latest-news-area">
			<div class="container">
				<div class="row">
					<div class="latest-news-row">
						<div class="center-title-area">
							<h2 class="center-title"><a href="#">Tin tức</a></h2>
						</div>	
						<div class="col-xs-12">
							<div class="row">
								<!-- LATEST-NEWS-CAROUSEL START -->
								<div class="latest-news-carousel">
								<!-- LATEST-NEWS-SINGLE-POST START -->
								@foreach($news as $values)									
									<div class="item">
										<div class="latest-news-post">
											<div class="single-latest-post">
												<a href="#"><img src="{{$values->image}}" title="{{$values->name}}" alt="{{$values->name}}" /></a>
												<h2><a title="{{$values->name}}" href="#">{{$values->name}}</a></h2>
												<p>{{$values->description}}</p>
												<div class="latest-post-info">
													<i class="fa fa-calendar"></i><span>{{$values->created_at}}</span>
												</div>
												<div class="read-more">
													<a title="{{$values->name}}" href="#">Xem Thêm <i class="fa fa-long-arrow-right"></i></a>
												</div>
											</div>
										</div>
									</div>
								@endforeach
									<!-- LATEST-NEWS-SINGLE-POST END -->																		
								</div>	
								<!-- LATEST-NEWS-CAROUSEL START -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- LATEST-NEWS-AREA END -->
		<!-- BRAND-CLIENT-AREA START -->
@stop
    </body>

</html>