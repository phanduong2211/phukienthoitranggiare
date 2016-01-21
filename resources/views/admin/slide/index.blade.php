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
    
    <div class="pull-right">
        <select class="sfilter noautosubmit" name="s">
            <option value="0" data-sort="desc" data-column="-1">-Sắp xếp-</option>
            <option value="1" data-sort="desc" data-column="-1">Mới nhất</option>
            <option value="2" data-sort="asc" data-column="-1">Cũ nhất</option>
            <option value="3" data-sort="asc" data-column="0">Tiêu Đề</option>
            <option value="3" data-sort="asc" data-column="2">Nội Dung</option>
            <option value="3" data-sort="asc" data-column="3">Url</option>
            <option value="3" data-sort="asc" data-column="4">Trang</option>
        </select>
    </div>
    <div class="pull-right">
        <div class="frmsearch clearfix" id="searchtable">
            <input title="" type="text" class="textboxsearch" value="<?php if(isset($_GET['q'])) echo $_GET['q']; ?>"  placeholder="Nhập nội dung tìm kiếm..." name="q" />
            <input type="submit" class="buttonsearch" value="" />
        </div>
    
    </div>


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
            <th width="10%">Nội Dung</th>
            <th>Url</th>
            <th>Trang</th>
            <th>Date</th>
        </tr>
        @foreach ($data as $value)
            <tr data-column="{{$value->id}}">
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
                 {{$value->namepage}}
            </td>
            <td>
                Tạo: {{date('d/m/Y H:i',strtotime($value->created_at))}}<br />
            	Cập Nhật:  {{date('d/m/Y H:i',strtotime($value->updated_at))}}
            </td>
            
        </tr>
       
        @endforeach
        
    </table>
</div>
    @endsection