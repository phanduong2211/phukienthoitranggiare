@extends("masterpage")
@section("miss")
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
                            @foreach($newsRelesion as $values)
                                <div class="row">

                                    <div class="col-xs-4 col-md-4" style="padding-right:0">
                                       <a href="{{Asset('')}}tin-tuc/{{$values->id}}/{{$convert->convertString($values->name)}}.html">
                                        <img style="width:100%;height:70px" src="{{Asset('')}}{{$values->image}}">
                                    </a>
                                    </div>
                                    <div class="col-xs-8 col-md-8"> 
                                        <a href="{{Asset('')}}tin-tuc/{{$values->id}}/{{$convert->convertString($values->name)}}.html">
                                        <h4>{{$values->name}}</h4>
                                        </a><time>Lúc {{$values->upated_at}}</time>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="col-md-3 col-sm-4 col-xs-12">

                   <div class="widget hotnews border-shadow">
                    <h3>Tin Mới</h3>
                    @foreach($newsnews as $values)
                         <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4" style="padding-right:0">
                            <a href="{{Asset('')}}tin-tuc/{{$values->id}}/{{$convert->convertString($values->name)}}.html" title="{{$values->name}}" >
                            <img src="{{Asset('')}}{{$values->image}}" alt="{{$values->name}}" title="{{$values->name}}"></a>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top:-5px">
                            <a href="{{Asset('')}}tin-tuc/{{$values->id}}/{{$convert->convertString($values->name)}}.html" title="{{$values->name}}">
                            <span class="hidden-xs">{{$values->name}}</span>
                            <span class="visible-xs">{{$values->name}}</span></a>
                            <div class="entry-meta small muted">
                                Lúc {{$values->updated_at}}                                </div>
                            </div>
                        </div> 
                         <br>
                    @endforeach                      
                        
                    </div><!--/.recent comments-->

                    <div class="widget hotnews border-shadow">
                        <div class="widget hotnews border-shadow">
                            <h3>Tin Xem Nhiều</h3>
                            @foreach($newMaxView as $values)
                                 <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4" style="padding-right:0">
                                    <a href="{{Asset('')}}tin-tuc/{{$values->id}}/{{$convert->convertString($values->name)}}.html" title="{{$values->name}}">
                                    <img src="{{Asset('')}}{{$values->image}}"></a>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top:-5px">
                                    <a href="{{Asset('')}}tin-tuc/{{$values->id}}/{{$convert->convertString($values->name)}}.html" title="{{$values->name}}">
                                    <span class="hidden-xs">{{$values->name}}</span>
                                    <span class="visible-xs">{{$values->name}}</span></a>
                                    <div class="entry-meta small muted">
                                        Lúc {{$values->updated_at}}                                        </div>
                                    </div>
                                </div> 
                                <br>                                                           
                            @endforeach 
                            </div><!--/.recent comments-->
                        </aside>
                    </div>
    </section>
@stop