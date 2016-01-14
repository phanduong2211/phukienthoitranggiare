@extends("masterpage")
@section("miss")
<style type="text/css">
	.displaynone
	{
		display:none;
	}
	</style>
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="index.html">Home</a>
							<span><i class="fa fa-caret-right"></i></span>
							<span>Tìm Kiếm</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
					
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<!-- PRODUCT-LEFT-SIDEBAR START -->
						<div class="product-left-sidebar">
							<h2 class="left-title pro-g-page-title">Danh mục sản phẩm</h2>
							
							<!-- SINGLE SIDEBAR CATEGORIES START -->
							<div class="product-single-sidebar">
								<span class="sidebar-title">Categories</span>
								<ul>
									<li>
										<label class="cheker">
											<input type="checkbox" name="categories"/>
											<span></span>
										</label>
										<a href="#">Tops<span> (12)</span></a>
									</li>
									<li>
										<label class="cheker">
											<input type="checkbox" name="categories"/>
											<span></span>
										</label>
										<a href="#">Dresses<span> (13)</span></a>
									</li>
								</ul>
							</div>
							<!-- SINGLE SIDEBAR CATEGORIES END -->
							
							<!-- SINGLE SIDEBAR PROPERTIES START -->
							<div class="product-single-sidebar">
								<span class="sidebar-title">Properties</span>
								<ul>
									<li>
										<label class="cheker">
											<input type="checkbox" name="properties"/>
											<span></span>
										</label>
										<a href="#">Colorful Dress<span>(4)</span></a>
									</li>
									<li>
										<label class="cheker">
											<input type="checkbox" name="properties"/>
											<span></span>
										</label>
										<a href="#">Maxi Dress <span>(1)</span></a>
									</li>
									<li>
										<label class="cheker">
											<input type="checkbox" name="properties"/>
											<span></span>
										</label>
										<a href="#">Midi Dress<span>(2)</span></a>
									</li>
									<li>
										<label class="cheker">
											<input type="checkbox" name="properties"/>
											<span></span>
										</label>
										<a href="#">Short Dress<span>(2)</span></a>
									</li>
									<li>
										<label class="cheker">
											<input type="checkbox" name="properties"/>
											<span></span>
										</label>
										<a href="#"> Short Sleeve<span>(4)</span></a>
									</li>
								</ul>
							</div>	
							<!-- SINGLE SIDEBAR PROPERTIES END -->
						</div>
						<!-- PRODUCT-LEFT-SIDEBAR END -->
						<!-- SINGLE SIDEBAR TAG START -->
						<div class="product-left-sidebar">
							<h2 class="left-title">Tags </h2>
							<div class="category-tag">
								@foreach($tag as $values)
								<a href="{{Asset('')}}tag/{{$convert->convertString($values->name)}}">{{$values->name}}</a>								
							@endforeach
							</div>
						</div>
						<!-- SINGLE SIDEBAR TAG END -->
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<div class="right-all-product">
							
							<div class="product-category-title">
								<!-- PRODUCT-CATEGORY-TITLE START -->
								<h1>
									<span class="cat-name">Kết quả tìm kiếm</span>
									<span class="count-product">Tìm thấy {{count($product)}} sản phẩm.</span>
								</h1>
								<!-- PRODUCT-CATEGORY-TITLE END -->
							</div>
							@if(count($product)>0)
							<div class="product-shooting-area">
								<div class="product-shooting-bar">
									<!-- SHOORT-BY START -->
									<div class="shoort-by">
										<label for="productShort">Sắp xếp theo</label>
										<div class="short-select-option">
											<select name="sortby" id="productShort">
												<option value="0">--</option>
												<option value="1">Giá: Thấp đến cao</option>
												<option value="2">Giá: Cao đến thấp</option>
												<option value="3">Tên sản phẩm: A đến Z</option>
												<option value="4">Tên sản phẩm: Z đến A</option>
											</select>												
										</div>
									</div>
									<!-- SHOORT-BY END -->
									<!-- SHOW-PAGE START -->
									<!-- <div class="show-page">
										<label for="perPage">Show</label>
										<div class="s-page-select-option">
											<select name="show" id="perPage">
												<option value="">11</option>
												<option value="">12</option>
											</select>													
										</div>
										<span>per page</span>										
									</div> -->
									<!-- SHOW-PAGE END -->
									<!-- VIEW-SYSTEAM START -->
									<div class="view-systeam">
										<label for="perPage">View:</label>
										<ul>
											<li class="active listgrid"><a href="javascript:void(0)"><i class="fa fa-th-large"></i></a><br />Grid</li>
											<li class="listview"><a href="javascript:void(0)"><i class="fa fa-th-list"></i></a><br />List</li>
										</ul>
									</div>
									<!-- VIEW-SYSTEAM END -->
								</div>
								<!-- PRODUCT-SHOOTING-RESULT START -->
								<div class="product-shooting-result">
									<form action="#">
										<!-- <button class="btn compare-button">
											So sánh (<span class="compare-value">1</span>)
											<i class="fa fa-chevron-right"></i>
										</button> -->
									</form>
									
									<?php echo $product->render(); ?>
											
								</div>
								<!-- PRODUCT-SHOOTING-RESULT END -->
							</div>
						</div>
						<!-- ALL GATEGORY-PRODUCT START -->
						<div class="all-gategory-product Productlistgrid">
							<div class="row">
								<ul class="gategory-product">
									<!-- SINGLE ITEM START -->
									@foreach($product as $values)
									<li class="gategory-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
										<div class="single-product-item">
											<div class="product-image">
												<a href="{{Asset('products')}}/{{$values->id}}/{{$convert->convertString($values->name)}}.html"><img title="{{$values->name}}" src="{{Asset('')}}{{$values->image}}" alt="{{$values->name}}" /></a>
												<a href="{{Asset('products')}}/{{$values->id}}/{{$convert->convertString($values->name)}}.html" class="new-mark-box">{{$values->icon_status}}</a>
												<div class="overlay-content">
													<ul id="{{$values->id}}">
														<li><a href="{{Asset('products')}}/{{$values->id}}/{{$convert->convertString($values->name)}}.html" title="Xem chi tiết"><i class="fa fa-search"></i></a></li>
														<li><a href="javascript:void(0)" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-cart add-cart"></i></a></li>
														<!-- <li><a href="javascript:void(0)" title="So sánh"><i class="fa fa-retweet"></i></a></li> -->
														<li><a href="javascript:void(0)" title="Thêm vào yêu thích"><i class="fa fa-heart-o"></i></a></li>
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
												<a href="{{Asset('products')}}/{{$values->id}}/{{$convert->convertString($values->name)}}.html">{{$values->name}}</a>
												<div class="price-box">
													<span class="price">{{number_format($values->promotion_price)}} vnđ</span>
													<span class="old-price">{{number_format($values->price)}} vnđ</span>
												</div>
											</div>
										</div>									
									</li>
									@endforeach
									<!-- SINGLE ITEM END -->							
								</ul>
							</div>
						</div>

						<!-- ALL GATEGORY-PRODUCT END -->
						<!-- ALL GATEGORY-PRODUCT START -->
						<div class="all-gategory-product Productlistview displaynone">
							<div class="row">
								<ul class="gategory-product">
									<!-- SINGLE ITEM START -->
									@foreach($product as $values)
									<li class="cat-product-list">
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="single-product-item">
												<div class="product-image">
													<a href="{{Asset('products')}}/{{$values->id}}/{{$convert->convertString($values->name)}}.html"><img src="{{Asset('')}}{{$values->image}}" alt="{{$values->name}}" title="{{$values->name}}"/></a>
													<a href="{{Asset('products')}}/{{$values->id}}/{{$convert->convertString($values->name)}}.html" class="new-mark-box">{{$values->icon_status}}</a>
												</div>
											</div>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
											<div class="list-view-content">
												<div class="single-product-item">
													<div class="product-info">
														<div class="customar-comments-box">
															<a href="{{Asset('products')}}/{{$values->id}}/{{$convert->convertString($values->name)}}.html">{{$values->name}}</a>
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
														<div class="product-datails">
															<p>{{$values->content}} </p>
														</div>
														<div class="price-box">
															<span class="price">{{number_format($values->promotion_price)}} vnđ</span>
															<span class="old-price">{{number_format($values->price)}} vnđ</span>
														</div>
													</div>
													<div class="overlay-content-list">
														<ul id="{{$values->id}}">
														<li><a href="{{Asset('products')}}/{{$values->id}}/{{$convert->convertString($values->name)}}.html" title="Xem chi tiết"><i class="fa fa-search"></i></a></li>
														<li><a href="javascript:void(0)" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-cart add-cart"></i></a></li>
														<!-- <li><a href="javascript:void(0)" title="So sánh"><i class="fa fa-retweet"></i></a></li> -->
														<li><a href="javascript:void(0)" title="Thêm vào yêu thích"><i class="fa fa-heart-o"></i></a></li>
													</ul>
													</div>												
												</div>														
											</div>
										</div>
									</li>
									@endforeach
									<!-- SINGLE ITEM END -->								
								</ul>
							</div>
						</div>
						<!-- ALL GATEGORY-PRODUCT END -->
						<!-- PRODUCT-SHOOTING-RESULT START -->
						<div class="product-shooting-result product-shooting-result-border">
							<form action="#">
								<!-- <button class="btn compare-button">
									So sánh (<strong class="compare-value">1</strong>)
									<i class="fa fa-chevron-right"></i>
								</button> -->
							</form>
								<?php echo $product->render(); ?>
						</div>	
						<!-- PRODUCT-SHOOTING-RESULT END -->
					</div>
					@endif
				</div>
			</div>			
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<!-- BRAND-CLIENT-AREA START -->
@stop