@extends('layouts.admin')

@section('title', 'SlideShow')
@section('script')
<script type="text/javascript">
    $(function(){
        $("#nav-accordion>li:eq(2)>a").addClass("active");
    });
</script>
@endsection
@section('content')
@if(Session::has('message'))
        <p class="message hidemessage"> {!! Session::get('message') !!}
        <i class="pull-right fa fa-times-circle"></i>
        </p>
@endif
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="margin-bottom:5px">
       <div class="group-button clearfix">
           <a href="{{Asset('admin/slide/add')}}" class="pull-left btn btn-primary btn-sm">Thêm mới</a>
       </div>
   </div>
   <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-xs-marg text-right clearfix">
    
    <form method="get" action="" class="pull-right">
        <select class="sfilter" name="s">
            <option value="0">-Sắp xếp-</option>
            <option value="1">Mới nhất</option>
            <option value="2">Cũ nhất</option>
            <option value="3">Tiêu Đề</option>
            <option value="4">Ngày Tạo</option>
            <option value="5">Ngày Cập Nhật</option>
        </select>
    </form>
    <form method="get" action="" class="pull-right">
        <div class="frmsearch clearfix">
            <input title="" type="text" class="textboxsearch" value="<?php if(isset($_GET['q'])) echo $_GET['q']; ?>"  placeholder="Nhập nội dung tìm kiếm..." name="q" />
            <input type="submit" class="buttonsearch" value="" />
        </div>
        <?php if(isset($_GET["sort"])){ ?>
        <input type="hidden" name="sort" value="<?php echo $_GET["sort"] ?>" />
        <?php } ?>
    </form>


</div>
</div><!---search-->
<br />
<?php 
function showImage($path){
  if(strpos($path, "http")===0)
    return $path;
  return Asset('public/image/').'/'.$path;
}
?>
 <div class="table-responsive">
   <table class="table table-hover">
       <tr>
            <th>Tiêu Đề</th>
            <th>Hình Ảnh</th>
            <th>Nội Dung</th>
            <th>Url</th>
            <th>Date</th>
        </tr>
        @foreach ($data as $key => $value)
            <tr>
            <td>
                {{$value->name}}
                 <div class="groupaction">
                        <a class="edit" href='{{Asset('admin/slide/edit?id='.$value->id)}}'>Sửa</a>
                        <form method="post" action="{{Asset('admin/slide/delete')}}" class="remove">
                                <input type="hidden" name="id" value="{{$value->id}}">
                                <input type="hidden" name="title" value="{{$value->name}}">
                                <input type="submit" value="Xóa">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            </form>
                    </div>
            </td>
            <td><img src="{{showImage($value->image)}}" style="width:100px" /></td>
            <td>
                 {!!$value->content!!}
            </td>
            <td>
                 {{$value->url}}
            </td>
            <td>
                Tạo: {{date('d/m/Y H:i',strtotime($value->created_at))}}<br />
            	Cập Nhật:  {{date('d/m/Y H:i',strtotime($value->updated_at))}}
            </td>
            <td>
        </tr>
       
        @endforeach
        
    </table>
</div>
    @endsection