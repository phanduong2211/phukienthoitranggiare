<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{$header['title']}}</title>            
	    <meta name="keywords" content="{{$header['keyword']}}">	        
	    <meta name="description" content="{{$header['description']}}">	        
        <meta name="author" content="phukienthoitrang.xyz">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf_token" content="{{ csrf_token() }}" />
		<!-- Favicon
		============================================ -->
		@foreach($info as $values)
		@if($values->name == "favicon" && $values->contents!="")
		<link rel="shortcut icon" type="image/x-icon" href="{{Asset('')}}{{$values->contents}}">
		@endif
		@endforeach		
		<!-- FONTS
		============================================ -->	
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'> 
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
				
		<!-- animate CSS
		============================================ -->
        <link rel="stylesheet" href="{{Asset('')}}public/css/animate.css">		
		
		<!-- FANCYBOX CSS
		============================================ -->			
        <link rel="stylesheet" href="{{Asset('')}}public/css/jquery.fancybox.css">	
		
		<!-- BXSLIDER CSS
		============================================ -->			
        <link rel="stylesheet" href="{{Asset('')}}public/css/jquery.bxslider.css">			
				
		<!-- MEANMENU CSS
		============================================ -->			
        <link rel="stylesheet" href="{{Asset('')}}public/css/meanmenu.min.css">	
		
		<!-- JQUERY-UI-SLIDER CSS
		============================================ -->			
        <link rel="stylesheet" href="{{Asset('')}}public/css/jquery-ui-slider.css">		
		
		<!-- NIVO SLIDER CSS
		============================================ -->			
        <link rel="stylesheet" href="{{Asset('')}}public/css/nivo-slider.css">
		
		<!-- OWL CAROUSEL CSS 	
		============================================ -->	
        <link rel="stylesheet" href="{{Asset('')}}public/css/owl.carousel.css">
		
		<!-- OWL CAROUSEL THEME CSS 	
		============================================ -->	
         <link rel="stylesheet" href="{{Asset('')}}public/css/owl.theme.css">
		
		<!-- BOOTSTRAP CSS 
		============================================ -->	
        <link rel="stylesheet" href="{{Asset('')}}public/css/bootstrap.min.css">
		
		<!-- FONT AWESOME CSS 
		============================================ -->
        <link rel="stylesheet" href="{{Asset('')}}public/css/font-awesome.min.css">
		
		<!-- NORMALIZE CSS 
		============================================ -->
        <link rel="stylesheet" href="{{Asset('')}}public/css/normalize.css">
		
		<!-- MAIN CSS 
		============================================ -->
        <link rel="stylesheet" href="{{Asset('')}}public/css/main.css">
		
		<!-- STYLE CSS 
		============================================ -->
        <link rel="stylesheet" href="{{Asset('')}}public/css/style.css">
		
		<!-- RESPONSIVE CSS 
		============================================ -->
        <link rel="stylesheet" href="{{Asset('')}}public/css/responsive.css">
		
		<!-- IE CSS 
		============================================ -->
        <link rel="stylesheet" href="{{Asset('')}}public/css/ie.css">
		
		<!-- MODERNIZR JS 
		============================================ -->
        <script src="{{Asset('')}}public/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		
		<!-- HEADER-TOP START -->
		<div class="header-top">
			<div class="container">
				<div class="row">
					<!-- HEADER-LEFT-MENU START -->
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="header-left-menu">
							<div class="welcome-info">
								Xin chào <span><?php if(Session::get('login')==true || Session::has('login')) echo Session::get('login_name')."!"; else echo "bạn!";?></span>
							</div>
							<!-- <div class="currenty-converter">
								<form method="post" action="#" id="currency-set">
									<div class="current-currency">
										<span class="cur-label">Đơn vị tính : </span><strong>VNĐ</strong>
									</div>
									<ul class="currency-list currency-toogle">
										<li>
											<a title="Việt Nam đồng (VNĐ)" href="#">Việt Nam đồng (VNĐ)</a>
										</li>
										<li>
										<a title="Dollar (USD)" href="#">Dollar (USD)</a>
										</li>
									</ul>
								</form>									
							</div>
							<div class="selected-language">
								<div class="current-lang">
									<span class="current-lang-label">Ngôn ngữ : </span><strong>Vietnamese</strong>
								</div>
								<ul class="languages-choose language-toogle">
									<li>
										<a href="/vn" title="Vietnamese">
											<span>Vietnamese</span>
										</a>
									</li>
									<li>
										<a href="/en" title="English (English)">
											<span>English</span>
										</a>
									</li>
								</ul>										
							</div> -->
						</div>
					</div>
					<!-- HEADER-LEFT-MENU END -->
					<!-- HEADER-RIGHT-MENU START -->
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="header-right-menu">
							<nav>
								<ul class="list-inline">
									<li style="display:none"><a href="{{Asset('')}}checkout.html">Check Out</a></li>
									<li><a href="{{Asset('')}}wishlist.html">Yêu thích</a></li>
									
									<li><a href="{{Asset('')}}cart.html">Giỏ hàng</a></li>
									<?php if(!Session::has('login_name')) echo '<li><a href="\registration.html">Đăng Nhập</a></li>';
										else echo '<li><a href="\my-account.html">Tài Khoản</a></li> <li><a href="\signout">Đăng Xuất</a></li>';
									?>
								</ul>									
							</nav>
						</div>
					</div>
					<!-- HEADER-RIGHT-MENU END -->
				</div>
			</div>
		</div>
		<!-- HEADER-TOP END -->
		<!-- HEADER-MIDDLE START -->
		<section class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<!-- LOGO START -->
						@foreach($info as $values)
							@if($values->name == "logo")
							<div class="logo">
								<a href="{{Asset('')}}"><img src="{{$convert->showImage($values->contents)}}" alt="bstore logo" /></a>
							</div>
							@endif
						<!-- LOGO END -->
						<!-- HEADER-RIGHT-CALLUS START -->
						
							@if($values->name == "phone" && $values->contents!="")
							<div class="header-right-callus">
								<h3>Liên hệ</h3>

								<span>{{$values->contents}}</span>
							</div>
							@endif
						@endforeach
						<!-- HEADER-RIGHT-CALLUS END -->
						<!-- CATEGORYS-PRODUCT-SEARCH START -->
						<div class="categorys-product-search">
							<form action="{{Asset('')}}tim-kiem" method="get" class="search-form-cat">
								<div class="search-product form-group">
									<select name="category" class="cat-search">
										<option value="all">Tất cả</option>
										@foreach($categorys as $values)
										<option value="{{$values->id}}">{{$values->name}}</option>	
										@endforeach							
									</select>
									<input type="text" class="form-control search-form" name="name" placeholder="Nhập vào sản phẩm cần tìm... " />
									<button class="search-button" value="Search" type="submit">
										<i class="fa fa-search"></i>
									</button>									 
								</div>
							</form>
						</div>
						<!-- CATEGORYS-PRODUCT-SEARCH END -->
					</div>
				</div>
			</div>
		</section>
		<!-- HEADER-MIDDLE END -->
		<!-- MAIN-MENU-AREA START -->
		<header class="main-menu-area">
			<div class="container">
				<div class="row">
					<!-- SHOPPING-CART START -->
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-right shopingcartarea">
						<div class="shopping-cart-out pull-right">
							<div class="shopping-cart">
								<a class="shop-link" href="{{Asset('')}}cart.html" title="Vào xem giỏ hàng của bạn">
									<i class="fa fa-shopping-cart cart-icon"></i>
									<b>Giỏ Hàng</b>
									<span class="ajax-cart-quantity count-cart"><?php if(Session::has("cart")) echo count(Session::get("cart"))-1; else echo '0'; ?></span>
								</a>								
							</div>
						</div>
					</div>	
					<!-- SHOPPING-CART END -->
					<!-- MAINMENU START -->
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 no-padding-right menuarea">
						<div class="mainmenu">
							<nav>
								<ul class="list-inline mega-menu">
									<li class="active"><a href="{{Asset('')}}">Trag chủ</a>
										<!-- DROPDOWN MENU START -->
										<!-- <div class="home-var-menu">
											<ul class="home-menu">
												<li><a href="index.html">Home variation 1</a></li>
												<li><a href="index-2.html">Home variation 2</a></li>
											</ul>												
										</div> -->
										<!-- DROPDOWN MENU END -->
									</li>
									@if(count($menu)>0)
									@for($i=0;$i< count($menu["root_menu"]);$i++)
									<li>
										@if($menu['root_menu'][$i]['url']!="")
											<a title="{{$menu['root_menu'][$i]['name']}}" href="{{Asset('')}}{{$menu['root_menu'][$i]['url']}}" >{{$menu["root_menu"][$i]["name"]}}</a>
											@else
											<a title="{{$menu['root_menu'][$i]['name']}}" href="{{Asset('')}}{{$convert->convertString($menu['root_menu'][$i]['name'])}}" >{{$menu["root_menu"][$i]["name"]}}</a>
										@endif
										<!-- DRODOWN-MEGA-MENU START -->
										<?php $ischeck=false; ?>
											@for($j=0;$j< count($menu["second_menu"]);$j++)
											@if($menu["root_menu"][$i]["id"]==$menu["second_menu"][$j]["root"])
												<?php $ischeck=true; break;?>
											@endif
											@endfor
											<?php if($ischeck) echo '<div class="drodown-mega-menu">'; ?>				
											@for($j=0;$j< count($menu["second_menu"]);$j++)
											@if($menu["root_menu"][$i]["id"]==$menu["second_menu"][$j]["root"])
											
											<div class="left-mega col-xs-6">
												<div class="mega-menu-list">
												@if($menu['second_menu'][$j]['url']!="")
													<a title="{{$menu['second_menu'][$j]['name']}}" class="mega-menu-title" href="{{$menu['second_menu'][$j]['url']}}">{{$menu["second_menu"][$j]["name"]}}</a>
													@else
													<a title="{{$menu['second_menu'][$j]['name']}}" class="mega-menu-title" href="{{Asset('')}}{{$convert->convertString($menu['root_menu'][$i]['name'])}}/{{$convert->convertString($menu['second_menu'][$j]['name'])}}">{{$menu["second_menu"][$j]["name"]}}</a>
												@endif
													<ul>
														@for($k=0;$k< count($menu["three_menu"]);$k++)
														@if($menu["second_menu"][$j]["id"]==$menu["three_menu"][$k]["root"])
														<li>
														@if($menu['three_menu'][$k]['url']!="")
															<a title="{{$menu['three_menu'][$k]['name']}}" href="{{$menu['three_menu'][$k]['url']}}">{{$menu["three_menu"][$k]["name"]}}</a>
															@else
															<a title="{{$menu['three_menu'][$k]['name']}}" href="{{Asset('')}}{{$convert->convertString($menu['root_menu'][$i]['name'])}}/{{$convert->convertString($menu['second_menu'][$j]['name'])}}/{{$convert->convertString($menu['three_menu'][$k]['name'])}}">{{$menu["three_menu"][$k]["name"]}}</a>
														@endif
														</li>	
														@endif
														@endfor													
													</ul>
												</div>
											</div>

											@endif
											@endfor
											<?php if($ischeck) echo '</div>'; ?>												
										<!-- DRODOWN-MEGA-MENU END -->										
									</li>
									@endfor
									@endif
								</ul>
							</nav>
						</div>
					</div>
					<!-- MAINMENU END -->
				</div>
				<div class="row">
					<!-- MOBILE MENU START -->
					<div class="col-sm-12 mobile-menu-area">
						<div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
							<span class="mobile-menu-title">MENU</span>
							<nav>
								<ul>
									<li class="active"><a href="{{Asset('')}}">Trang chủ</a>											
									</li>
									@if(count($menu)>0)
									@for($i=0;$i< count($menu["root_menu"]);$i++)							
									<li><a tile="{{$menu['root_menu'][$i]['name']}}" href="shop-gird.html">{{$menu['root_menu'][$i]['name']}}</a>														
										
										<ul>
										@for($j=0;$j< count($menu["second_menu"]);$j++)
										@if($menu["root_menu"][$i]["id"]==$menu["second_menu"][$j]["root"])
											<li><a title="{{$menu['second_menu'][$j]['name']}}" href="shop-gird.html">{{$menu['second_menu'][$j]['name']}}</a>
												<ul>
													@for($k=0;$k< count($menu["three_menu"]);$k++)
													@if($menu["second_menu"][$j]["id"]==$menu["three_menu"][$k]["root"])
													<li><a title="{{$menu['three_menu'][$k]['name']}}" href="shop-gird.html">{{$menu['three_menu'][$k]['name']}}</a></li>
													@endif
													@endfor	
												</ul>													
											</li>											
										@endif
										@endfor

										</ul>
										
									</li>

									@endfor
									@endif									
								</ul>
							</nav>
						</div>						
					</div>
					<!-- MOBILE MENU END -->
				</div>
			</div>
		</header>
		<!-- MAIN-MENU-AREA END -->
		@yield('miss')
		<section class="brand-client-area">
			<div class="container">
				<div class="row">
					<!-- BRAND-CLIENT-ROW START -->
					<div class="brand-client-row">
						<div class="center-title-area">
							<h2 class="center-title">Đối tác</h2>
						</div>
						<div class="col-xs-12">
							<div class="row">
								<!-- CLIENT-CAROUSEL START -->
								<div class="client-carousel">
									<!-- CLIENT-SINGLE START -->
									@foreach($info as $values)
									@if($values->name == "brand" && $values->contents != "")
									<?php $str = explode(",",$values->contents); foreach($str as $vl){?>
										<div class="item">
											<div class="single-client">
												<a href="#">
													<img src="{{$convert->showImage($vl)}}" alt="brand-client" />
												</a>
											</div>									
										</div>
									<?php }?>
									@endif
									@endforeach
									<!-- CLIENT-SINGLE END -->
								</div>
								<!-- CLIENT-CAROUSEL END -->
							</div>
						</div>
					</div>
					<!-- BRAND-CLIENT-ROW END -->
				</div>
			</div>
		</section>
		<!-- BRAND-CLIENT-AREA END -->
		<!-- COMPANY-FACALITY START -->
		<section class="company-facality">
			<div class="container">
				<div class="row">
					<div class="company-facality-row">
						<!-- SINGLE-FACALITY START -->
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="single-facality">
								<div class="facality-icon">
									<i class="fa fa-rocket"></i>
								</div>
								<div class="facality-text">
									<h3 class="facality-heading-text">Miễn phí Ship</h3>
									<span>đối với đơn hàng trên 1 triệu</span>
								</div>
							</div>
						</div>
						<!-- SINGLE-FACALITY END -->
						<!-- SINGLE-FACALITY START -->
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="single-facality">
								<div class="facality-icon">
									<i class="fa fa-umbrella"></i>
								</div>
								<div class="facality-text">
									<h3 class="facality-heading-text">Hỗ trợ 24/7</h3>
									<span>Tư vấn trực tuyến</span>
								</div>
							</div>
						</div>
						<!-- SINGLE-FACALITY END -->
						<!-- SINGLE-FACALITY START -->						
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="single-facality">
								<div class="facality-icon">
									<i class="fa fa-calendar"></i>
								</div>
								<div class="facality-text">
									<h3 class="facality-heading-text">DAILY UPDATES</h3>
									<span>update mỗi ngày</span>
								</div>
							</div>
						</div>
						<!-- SINGLE-FACALITY END -->
						<!-- SINGLE-FACALITY START -->						
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="single-facality">
								<div class="facality-icon" style="width:54px;">
									<i class="fa fa-refresh"></i>
								</div>
								<div class="facality-text">
									<h3 class="facality-heading-text">Hoàn lại tiền</h3>
									<span>nếu sản phẩm không như hình</span>
								</div>
							</div>
						</div>		
						<!-- SINGLE-FACALITY END -->					
					</div>
				</div>
			</div>
		</section>
		<!-- COMPANY-FACALITY END -->
		<!-- FOOTER-TOP-AREA START -->
		<section class="footer-top-area">
			<div class="container">
				<div class="footer-top-container">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
							<!-- FOOTER-TOP-LEFT START -->
							<div class="footer-top-left">
								<!-- NEWSLETTER-AREA START -->
								<div class="newsletter-area">
									<h2>Nhận Tin</h2>
									<p>Nhập thông tin email của bạn vào khung texbox dưới để nhận những tin tức khuyến mãi từ chúng tôi</p>
									<form action="#">
										<div class="form-group newsletter-form-group">
										  <input type="text" class="form-control newsletter-form" placeholder="Email của bạn">
										  <input type="submit" class="newsletter-btn" name="submit" value="Gửi" />
										</div>
									</form>
								</div>
								<!-- NEWSLETTER-AREA END -->
								<!-- ABOUT-US-AREA START -->
								<!-- <div class="about-us-area">
									<h2>About Us</h2>
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
								</div> -->
								<!-- ABOUT-US-AREA END -->
								<!-- FLLOW-US-AREA START -->
								<div class="fllow-us-area">
									<h2>Theo dõi chúng tôi</h2>
									<ul class="flow-us-link">
										@foreach($info as $values)
										@if($values->contents!="")
											@if($values->name == "facebook")
											<li><a href="{{$values->contents}}"><i style="margin-top:10px" class="fa fa-facebook"></i></a></li>
											@endif
											@if($values->name == "twitter")
											<li><a href="{{$values->contents}}"><i style="margin-top:10px" class="fa fa-twitter"></i></a></li>
											@endif
											@if($values->name == "skype")
											<li><a href="{{$values->contents}}"><i style="margin-top:10px" class="fa fa-skype"></i></a></li>
											@endif
											@if($values->name == "google")
											<li><a href="{{$values->contents}}"><i style="margin-top:10px" class="fa fa-google-plus"></i></a></li>
											@endif
										@endif
										@endforeach
									</ul>
								</div>
								<!-- FLLOW-US-AREA END -->
							</div>
							<!-- FOOTER-TOP-LEFT END -->
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
							<!-- FOOTER-TOP-RIGHT-1 START -->
							<div class="footer-top-right-1">
								<div class="row">
									<!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 hidden-sm">
										<div class="staticblock">
											<h2>static block</h2>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s<br />when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
										</div>
									</div> -->
									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
										<!-- STORE-INFORMATION START -->
										<div class="Store-Information">
											<h2>Thông tin liên hệ</h2>
											<ul>
											@foreach($info as $values)
											@if($values->contents!="")
												@if($values->name == "address")
												<li>
													<div class="info-lefticon">
														<i class="fa fa-map-marker"></i>
													</div>
													<div class="info-text">
														<p>Adress : {{$values->contents}}</p>
													</div>
												</li>
												@endif
												@if($values->name == "phone")
												<li>
													<div class="info-lefticon">
														<i class="fa fa-phone"></i>
													</div>
													<div class="info-text call-lh">
														<p>Phone : {{$values->contents}}</p>
													</div>
												</li>
												@endif
												@if($values->name == "email")
												<li>
													<div class="info-lefticon">
														<i class="fa fa-envelope-o"></i>
													</div>
													<div class="info-text">
														<p>Email : <a href="mailto:{{$values->contents}}"><i class="fa fa-angle-double-right"></i> {{$values->contents}}</a></p>
													</div>
												</li>
												@endif
											@endif
											@endforeach
											</ul>
										</div>
										<!-- STORE-INFORMATION END -->
									</div>
									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
										<!-- GOOGLE-MAP-AREA START -->

										<div class="google-map-area">
											<div class="google-map">
											@foreach($info as $values)
											@if($values->contents!="" && $values->name =="maps")
												<?php echo $values->contents; ?>
												<!-- <div id="googleMap" style="width:100%;height:150px;"></div> -->
											@endif
											@endforeach
											</div>
										</div>
										<!-- GOOGLE-MAP-AREA END -->
									</div>
								</div>
							</div>
							<!-- FOOTER-TOP-RIGHT-1 END -->
							<div class="footer-top-right-2">
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
										<!-- FOTTER-MENU-WIDGET START -->
										<div class="fotter-menu-widget">
											<div class="single-f-widget">
												<h2>Danh mục</h2>
												<ul>
												@foreach($categorys as $values)
													<li><a href="{{Asset('')}}danh-muc/{{$convert->convertString($values->name)}}"><i class="fa fa-angle-double-right"></i>{{$values->name}} </a></li>
												@endforeach
												</ul>
											</div>
										</div>
										<!-- FOTTER-MENU-WIDGET END -->
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
										<!-- FOTTER-MENU-WIDGET START -->
										<div class="fotter-menu-widget">
											<div class="single-f-widget">
												<h2>Thông tin</h2>
												<ul>
													<li><a href="#"><i class="fa fa-angle-double-right"></i>Chính sách đổi trả</a></li>
													<li><a href="#"><i class="fa fa-angle-double-right"></i>Hướng dẫn mua hàng</a></li>
													<li><a href="#"><i class="fa fa-angle-double-right"></i>Về chúng tôi</a></li>
													<li><a href="contact-us.html"><i class="fa fa-angle-double-right"></i>Liên hệ</a></li>
												</ul>
											</div>
										</div>
										<!-- FOTTER-MENU-WIDGET END -->
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
										<!-- FOTTER-MENU-WIDGET START -->
										<div class="fotter-menu-widget">
											<div class="single-f-widget">
												<h2>Tài khoản</h2>
												<ul>
													<li><a href="{{Asset('')}}wishlist.html"><i class="fa fa-angle-double-right"></i>Yêu thích</a></li>
													<li><a href="{{Asset('')}}cart.html"><i class="fa fa-angle-double-right"></i>Giỏ hàng</a></li>
													<!-- <li><a href="{{Asset('')}}compage.html"><i class="fa fa-angle-double-right"></i>So sánh</a></li> -->
												@if(!Session::has("login_name"))													
													<li><a href="{{Asset('')}}registration.html"><i class="fa fa-angle-double-right"></i>Đăng ký</a></li>
													@else													
													<li><a href="#"><i class="fa fa-angle-double-right"></i>My account</a></li>
													<li><a href="#"><i class="fa fa-angle-double-right"></i>Sign out</a></li>
												@endif
												</ul>
											</div>
										</div>
										<!-- FOTTER-MENU-WIDGET END -->
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<!-- PAYMENT-METHOD START -->
										<div class="payment-method">
											<img class="img-responsive pull-right" src="{{Asset('')}}public/img/payment.png" alt="payment-method" />
										</div>
										<!-- PAYMENT-METHOD END -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- FOOTER-TOP-AREA END -->
		<!-- COPYRIGHT-AREA START -->
		<footer class="copyright-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="copy-right">
							<address>Copyright © 2016 <a href="{{Asset('')}}">Phukienthoitrang.xyz</a> All Rights Reserved</address>
						</div>
						<div class="scroll-to-top">
							<a href="#" class="bstore-scrollertop"><i class="fa fa-angle-double-up"></i></a>
						</div>
					</div>
				</div>
			</div>
		</footer> 
		<!-- COPYRIGHT-AREA END -->
		<!-- JS 
		===============================================-->
		<!-- jquery js -->
		<script src="{{Asset('')}}public/js/vendor/jquery-1.11.3.min.js"></script>
		
		<!-- fancybox js -->
        <script src="{{Asset('')}}public/js/jquery.fancybox.js"></script>
        <!-- search js -->
        <script src="{{Asset('')}}public/js/search.js"></script>
        <!-- ajax js -->
        <script src="{{Asset('')}}public/js/ajax.js"></script>
		
		<!-- bxslider js -->
        <script src="{{Asset('')}}public/js/jquery.bxslider.min.js"></script>
		
		<!-- meanmenu js -->
        <script src="{{Asset('')}}public/js/jquery.meanmenu.js"></script>
		
		<!-- owl carousel js -->
        <script src="{{Asset('')}}public/js/owl.carousel.min.js"></script>
		
		<!-- nivo slider js -->
        <script src="{{Asset('')}}public/js/jquery.nivo.slider.js"></script>
		
		<!-- jqueryui js -->
        <script src="{{Asset('')}}public/js/jqueryui.js"></script>
        <!-- bootbox.min js -->
       <!--  <script src="{{Asset('')}}public/js/bootbox.min.js"></script> -->

        <!-- bootbox js -->
        <script src="{{Asset('')}}public/js/bootbox.js"></script>
		
		<!-- bootstrap js -->
        <script src="{{Asset('')}}public/js/bootstrap.min.js"></script>
		
		<!-- wow js -->
        <script src="{{Asset('')}}public/js/wow.js"></script>		
		<script>
			new WOW().init();
		</script>

		<!-- Google Map js -->
        <!-- <script src="https://maps.googleapis.com/maps/api/js"></script>	 -->
		<script>
			/*function initialize() {
			  var mapOptions = {
				zoom: 10,
				scrollwheel: true,
				center: new google.maps.LatLng(10.8804956, 106.7295944)
			  };
			  var map = new google.maps.Map(document.getElementById('googleMap'),
				  mapOptions);
			  var marker = new google.maps.Marker({
				position: map.getCenter(),
				map: map
			  });

			}
			google.maps.event.addDomListener(window, 'load', initialize);		*/		
		</script>
		<!-- main js -->
        <script src="{{Asset('')}}public/js/main.js"></script>
</body>
</html>