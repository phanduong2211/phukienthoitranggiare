<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css" media="screen">
		body
		{
			font-family:arial !important;
		}
        h2,h3
        {
            font-family:arial !important;
        }
                
        .widget, #boxrecent, #detailnews #boxleft {
            margin-bottom: 15px;
        }
        .border-shadow {
            background-color: #fff;
            padding: 5px 15px;
            box-shadow: 0px 0px 4px #ccc;
            -webkit-box-shadow: 0px 0px 4px #ccc;
            -webkit-box-shadow: 0px 0px 4px #ccc;
        }
        .hidden-xs {
            display: block!important;
            color:#c52d2f;
        }	
        .visible-xs, tr.visible-xs, th.visible-xs, td.visible-xs {
            display: none!important;
        }	
	</style>
</head>
<body>
@extends("masterpage")
@section("miss")
<div class="container">
	<section id="blog" class="container">
	<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="index.html">Trang Chủ<span><i class="fa fa-caret-right"></i> </span> </a>
							<span> <i class="fa fa-caret-right"> </i> </span>
							<a href="{{Asset('')}}tin-tuc">Tin tức</a>
							<span>{{$news[0]->name}}</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
    <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12">
                <div id="boxleft" class="clearfix border-shadow">
                    <h2 style="font-size:25px;margin-bottom:0">{{$news[0]->name}}</h2>
                    <div style="margin-bottom:5px;color:#888;font-size:12px">
                        {{$news[0]->created_at}}
                            <span style="padding:0px 5px">|</span>

                            {{$news[0]->view}} Xem                            <span style="padding:0px 5px">|</span>

                            <span id="sllike">0</span> Thích                        </div>
                        <div id="contentbox">
                           {{$news[0]->content}}
                      </div>

                    </div>
                    <br>
                    <div id="boxrecent" class="border-shadow">
                        <h3>TIN LIÊN QUAN</h3>
                        <hr>
                        <div class="row">
                                                        <div class="col-md-4">
                                <div class="row">

                                    <div class="col-xs-4 col-md-4" style="padding-right:0">
                                       <a href="/news/tinh-bao-anh-tuyen-350-chuyen-gia-cong-nghe-lam-an-ninh-mang_5.html?ref=recent">
                                        <img style="width:100%;height:70px" src="http://img.f5.sohoa.vnecdn.net/2015/11/24/151123091727-ben-whishaw-780x4-6795-8478-1448329107.jpg">
                                    </a>
                                </div>
                                <div class="col-xs-8 col-md-8"> 
                                    <a href="/news/tinh-bao-anh-tuyen-350-chuyen-gia-cong-nghe-lam-an-ninh-mang_5.html?ref=recent"><h4>Tình báo Anh tuyển 350 chuyên gia công nghệ làm an ninh mạng</h4></a><time>Lúc 06:56 24/11/2015</time>
                                </div>
                            </div>
                            </div>
                                                    </div>
                    </div>
                </div>
                <aside class="col-md-3 col-sm-4 col-xs-12">

                   <div class="widget hotnews border-shadow">
                    <h3>Tin Mới</h3>

                                        <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4" style="padding-right:0">
                            <a href="/news/gan-camera-o-pho-den-do-va-ca-phe-den-mo-co-anh-huong-den-quyen-rieng-tu_6.html?ref=widget_image" title="GẮN CAMERA Ở " phỐ="" ĐÈn="" ĐỎ"="" vÀ="" cÀ="" phÊ="" mỜ="" cÓ="" Ảnh="" hƯỞng="" ĐẾn="" quyỀn="" riÊng="" tƯ?"=""><img src="/public/images/news/mat-than.jpg" alt="GẮN CAMERA Ở " phỐ="" ĐÈn="" ĐỎ"="" vÀ="" cÀ="" phÊ="" mỜ="" cÓ="" Ảnh="" hƯỞng="" ĐẾn="" quyỀn="" riÊng="" tƯ?"=""></a>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top:-5px">
                            <a href="/news/gan-camera-o-pho-den-do-va-ca-phe-den-mo-co-anh-huong-den-quyen-rieng-tu_6.html?ref=widget_title" title="GẮN CAMERA Ở " phỐ="" ĐÈn="" ĐỎ"="" vÀ="" cÀ="" phÊ="" mỜ="" cÓ="" Ảnh="" hƯỞng="" ĐẾn="" quyỀn="" riÊng="" tƯ?"=""><span class="hidden-xs">GẮN CAMERA Ở "PHỐ ĐÈN...</span><span class="visible-xs">GẮN CAMERA Ở "PHỐ ĐÈN ĐỎ" VÀ CÀ PHÊ ĐÈN MỜ CÓ ẢNH...</span></a>
                            <div class="entry-meta small muted">
                                Lúc 12:20 24/11/2015                                </div>
                            </div>
                        </div> 
                        <br>
                                            <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4" style="padding-right:0">
                            <a href="/news/tinh-bao-anh-tuyen-350-chuyen-gia-cong-nghe-lam-an-ninh-mang_5.html?ref=widget_image" title="Tình báo Anh tuyển 350 chuyên gia công nghệ làm an ninh mạng"><img src="http://img.f5.sohoa.vnecdn.net/2015/11/24/151123091727-ben-whishaw-780x4-6795-8478-1448329107.jpg" alt="Tình báo Anh tuyển 350 chuyên gia công nghệ làm an ninh mạng"></a>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top:-5px">
                            <a href="/news/tinh-bao-anh-tuyen-350-chuyen-gia-cong-nghe-lam-an-ninh-mang_5.html?ref=widget_title" title="Tình báo Anh tuyển 350 chuyên gia công nghệ làm an ninh mạng"><span class="hidden-xs">Tình báo Anh tuyển 350...</span><span class="visible-xs">Tình báo Anh tuyển 350 chuyên gia công nghệ làm an ninh mạng</span></a>
                            <div class="entry-meta small muted">
                                Lúc 06:56 24/11/2015                                </div>
                            </div>
                        </div> 
                        <br>
                        
                    </div><!--/.recent comments-->

                    <div class="widget hotnews border-shadow">
                        <h3>Tin Nổi Bật</h3>

                                                <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4" style="padding-right:0">
                                <a href="/news/tinh-bao-anh-tuyen-350-chuyen-gia-cong-nghe-lam-an-ninh-mang_5.html?ref=widget_image" title="Tình báo Anh tuyển 350 chuyên gia công nghệ làm an ninh mạng"><img src="http://img.f5.sohoa.vnecdn.net/2015/11/24/151123091727-ben-whishaw-780x4-6795-8478-1448329107.jpg"></a>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top:-5px">
                                <a href="/news/tinh-bao-anh-tuyen-350-chuyen-gia-cong-nghe-lam-an-ninh-mang_5.html?ref=widget_title" title="Tình báo Anh tuyển 350 chuyên gia công nghệ làm an ninh mạng"><span class="hidden-xs">Tình báo Anh tuyển 350...</span><span class="visible-xs">Tình báo Anh tuyển 350 chuyên gia công nghệ làm an ninh mạng</span></a>
                                <div class="entry-meta small muted">
                                    Lúc 06:56 24/11/2015                                    </div>
                                </div>
                            </div> 
                            <br>
                                                    <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4" style="padding-right:0">
                                <a href="/news/gan-camera-o-pho-den-do-va-ca-phe-den-mo-co-anh-huong-den-quyen-rieng-tu_6.html?ref=widget_image" title="GẮN CAMERA Ở " phỐ="" ĐÈn="" ĐỎ"="" vÀ="" cÀ="" phÊ="" mỜ="" cÓ="" Ảnh="" hƯỞng="" ĐẾn="" quyỀn="" riÊng="" tƯ?"=""><img src="/public/images/news/mat-than.jpg"></a>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top:-5px">
                                <a href="/news/gan-camera-o-pho-den-do-va-ca-phe-den-mo-co-anh-huong-den-quyen-rieng-tu_6.html?ref=widget_title" title="GẮN CAMERA Ở " phỐ="" ĐÈn="" ĐỎ"="" vÀ="" cÀ="" phÊ="" mỜ="" cÓ="" Ảnh="" hƯỞng="" ĐẾn="" quyỀn="" riÊng="" tƯ?"=""><span class="hidden-xs">GẮN CAMERA Ở "PHỐ ĐÈN...</span><span class="visible-xs">GẮN CAMERA Ở "PHỐ ĐÈN ĐỎ" VÀ CÀ PHÊ ĐÈN MỜ CÓ ẢNH...</span></a>
                                <div class="entry-meta small muted">
                                    Lúc 12:20 24/11/2015                                    </div>
                                </div>
                            </div> 
                            <br>
                            
                        </div><!--/.recent comments-->


                        <div class="widget hotnews border-shadow">
                            <h3>Tin Xem Nhiều</h3>

                                                        <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4" style="padding-right:0">
                                    <a href="/news/tinh-bao-anh-tuyen-350-chuyen-gia-cong-nghe-lam-an-ninh-mang_5.html?ref=widget_image" title="Tình báo Anh tuyển 350 chuyên gia công nghệ làm an ninh mạng"><img src="http://img.f5.sohoa.vnecdn.net/2015/11/24/151123091727-ben-whishaw-780x4-6795-8478-1448329107.jpg"></a>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top:-5px">
                                    <a href="/news/tinh-bao-anh-tuyen-350-chuyen-gia-cong-nghe-lam-an-ninh-mang_5.html?ref=widget_title" title="Tình báo Anh tuyển 350 chuyên gia công nghệ làm an ninh mạng"><span class="hidden-xs">Tình báo Anh tuyển 350...</span><span class="visible-xs">Tình báo Anh tuyển 350 chuyên gia công nghệ làm an ninh mạng</span></a>
                                    <div class="entry-meta small muted">
                                        Lúc 06:34 24/11/2015                                        </div>
                                    </div>
                                </div> 
                                <br>
                                                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4" style="padding-right:0">
                                    <a href="/news/gan-camera-o-pho-den-do-va-ca-phe-den-mo-co-anh-huong-den-quyen-rieng-tu_6.html?ref=widget_image" title="GẮN CAMERA Ở " phỐ="" ĐÈn="" ĐỎ"="" vÀ="" cÀ="" phÊ="" mỜ="" cÓ="" Ảnh="" hƯỞng="" ĐẾn="" quyỀn="" riÊng="" tƯ?"=""><img src="/public/images/news/mat-than.jpg"></a>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top:-5px">
                                    <a href="/news/gan-camera-o-pho-den-do-va-ca-phe-den-mo-co-anh-huong-den-quyen-rieng-tu_6.html?ref=widget_title" title="GẮN CAMERA Ở " phỐ="" ĐÈn="" ĐỎ"="" vÀ="" cÀ="" phÊ="" mỜ="" cÓ="" Ảnh="" hƯỞng="" ĐẾn="" quyỀn="" riÊng="" tƯ?"=""><span class="hidden-xs">GẮN CAMERA Ở "PHỐ ĐÈN...</span><span class="visible-xs">GẮN CAMERA Ở "PHỐ ĐÈN ĐỎ" VÀ CÀ PHÊ ĐÈN MỜ CÓ ẢNH...</span></a>
                                    <div class="entry-meta small muted">
                                        Lúc 12:12 24/11/2015                                        </div>
                                    </div>
                                </div> 
                                <br>
                                
                            </div><!--/.recent comments-->
                        </aside>
                    </div>
    </section>
@stop
</body>
</html>