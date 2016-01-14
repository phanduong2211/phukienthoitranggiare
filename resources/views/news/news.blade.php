@extends("masterpage")
@section("miss")
<style type="text/css" media="screen">
		body
		{
			font-family:arial !important;
		}
		.blog .blog-item .entry-meta {
   		 	border-radius: 5px;
    		overflow: hidden;
		}
		#publish_date {
		    background: #c52d2f;
		    border-bottom: 5px solid #4e4e4e;
		    color: #fff;
		    padding: 5px 0;
		    text-align: center;
		}
		.blog .blog-item .entry-meta > span {
		    background: #f5f5f5;
		    border-top: 1px solid #fff;
		    display: block;
		    font-size: 12px;
		    overflow: hidden;
		    padding: 5px;
		    text-align: left;
		    color: #ccc;
		}
		.blog .blog-item .blog-content {
		    padding-bottom: 25px;

		}
		.blog .blog-item .blog-content h2 {
		    margin-top: 10px;
		    font-size: 30px;
		    
		    
		}
		.blog .blog-item .blog-content h2 a{
			color: #c52d2f !important;
		}
		.blog .blog-item .blog-content h3 {
		    color: #858586;
		    margin-bottom: 40px;
		    margin-top:20px;
		    /* font-weight: 300; */
		}
		.readmore {
		    margin-top: 0;
		}
		.btn-primary {
		    padding: 8px 20px;
		    background: #c52d2f;
		    color: #fff;
		    border-radius: 4px;
		    border: none;
		    margin-top: 10px;
		}

		.btn {
		    display: inline-block;
		    padding: 6px 12px;
		    margin-bottom: 0;
		    font-size: 14px;
		    font-weight: normal;
		    line-height: 1.428571429;
		    text-align: center;
		    white-space: nowrap;
		    vertical-align: middle;
		    cursor: pointer;
		    background-image: none;
		    border: 1px solid transparent;
		    border-radius: 4px;
		    -webkit-user-select: none;
		    -moz-user-select: none;
		    -ms-user-select: none;
		    -o-user-select: none;
		    user-select: none;
		}	
		h3 {
		    font-size: 16px;
		    color: #787878;
		    font-weight: 400;
		    line-height: 24px;
		    font-family:arial !important;
		    
		}
		a
		{
			
			font-family:arial !important;
		}
	</style>
<div class="container">
	<section id="blog" class="container">
	<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="{{Asset('')}}">Trang Chủ<span><i class="fa fa-caret-right"></i> </span> </a>
							<span> <i class="fa fa-caret-right"> </i> </span>
							<a href="{{Asset('')}}tin-tuc">Tin tức</a>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
    <div class="blog">
        <div class="row">
           <div class="col-md-8 col-sm-8">
           @foreach($news as $values)
             <div class="blog-item">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                        <div class="entry-meta">
                            <span id="publish_date">

                                {{$values->created_at}}                               </span>

                                <span><i class="fa fa-eye"></i><a href="#">{{$values->view}} Xem</a></span>
                                <span><i class="fa fa-heart"></i><a href="#">0 Thích</a></span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-8 col-md-9 blog-content">
                            <a href="{{Asset('')}}tin-tuc/{{$values->id}}/{{$convert->convertString($values->name)}}.html"><img title="{{$values->name}}" class="img-responsive img-blog" src="{{$values->image}}" width="100%" alt="{{$values->name}}"></a>
                            <h2><a href="{{Asset('')}}tin-tuc/{{$values->id}}/{{$convert->convertString($values->name)}}.html">{{$values->name}}</a></h2>
                            <h3>{{$values->description}}</h3>
                            <a style="margin-top: -38px;float: right;" class="btn btn-primary readmore" href="{{Asset('')}}tin-tuc/{{$values->id}}/{{$convert->convertString($values->name)}}.html">Xem Thêm <i class="fa fa-angle-right"></i></a>
                        </div> 
                </div><!--/.blog-item-->
             </div>
            @endforeach
            <div style="text-align:center"><?php echo $news->render(); ?></div>
                 <div class="blog-item">
                   <div class="row">
                       <div class="col-md-10">
                           <div class="pull-right">
                                                  </div>
                    </div>
                </div>
            </div>
        </div><!--/.col-md-8-->


        <aside class="col-md-4 col-sm-4">

            <div class="widget hotnews">
                <h3>Tin Mới</h3>
                	@foreach($newsnews as $values)
                                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4" style="padding-right:0">
                        <a href="{{Asset('')}}tin-tuc/{{$values->id}}/{{$convert->convertString($values->name)}}.html" title="{{$values->name}}">
                        <img src="{{Asset('')}}{{$values->image}}" alt="{{$values->name}}"></a>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top:-5px">
                        <a style="color:#c52d2f;" href="{{Asset('')}}tin-tuc/{{$values->id}}/{{$convert->convertString($values->name)}}.html" title="{{$values->name}}">{{$values->name}}</a>
                        <div class="entry-meta small muted">
                            Lúc {{$values->updated_at}}    </div>
                        </div>
                    </div> 
                    <br>                                   
                    @endforeach
                </div><!--/.recent comments-->


                <div class="widget hotnews">
                    <h3>Tin Xem Nhiều</h3>
                    @foreach($newMaxView as $values)
                                        <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4" style="padding-right:0">
                            <a  href="{{Asset('')}}tin-tuc/{{$values->id}}/{{$convert->convertString($values->name)}}.html" title="{{$values->name}}">
                            <img src="{{Asset('')}}{{$values->image}}" alt="{{$values->name}}"></a>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top:-5px">
                            <a style="color:#c52d2f;" href="{{Asset('')}}tin-tuc/{{$values->id}}/{{$convert->convertString($values->name)}}.html" title="{{$values->name}}">{{$values->name}}</a>
                            <div class="entry-meta small muted">
                                Lúc {{$values->updated_at}}                                </div>
                            </div>
                        </div> 
                        <br>
                    @endforeach                  
                        
                    </div><!--/.recent comments-->


                </aside>  
            </div><!--/.row-->
        </div>
    </section>
@stop