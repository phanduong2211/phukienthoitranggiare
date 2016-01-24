@extends('layouts.admin')

@section('title', 'Quản Lý Trang')
@section('script')
<script type="text/javascript">
   var __datatoken="{{csrf_token()}}";
    $(function(){
        $("#nav-accordion>li:eq(3)>a").addClass("active").parent().find("ul>li:eq(2)").addClass("active");
        $(".table .viewcontent").click(function(){
            $("#modalcontent .modal-title").html($(this).parent().parent().find("td:eq(0) span:eq(0)").text()).parents('.modal-content').find('.modal-body').html($(this).parent().find(".hide").html());
            
        });
    });
</script>
@endsection
@section('content')
@if(Session::has('message'))
        <p class="message hidemessage"> {{ Session::get('message') }}
        <i class="pull-right fa fa-times-circle"></i>
        </p>
@endif
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="margin-bottom:5px">
       <div class="group-button clearfix">
           <a href="{{Asset('admin/page/add')}}" class="pull-left btn btn-primary btn-sm">Thêm mới</a>
       </div>
   </div>
   <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-xs-marg text-right clearfix">
    
    <div class="pull-right">
        <select class="sfilter noautosubmit" name="s">
            <option value="0" data-sort="desc" data-column="-1">-Sắp xếp-</option>
            <option value="1" data-sort="desc" data-column="-1">Mới nhất</option>
            <option value="2" data-sort="asc" data-column="-1">Cũ nhất</option>
            <option value="3" data-sort="asc" data-column="0">Tên</option>
            <option value="4" data-sort="desc" data-column="4">Ngày Tạo</option>
            <option value="5" data-sort="desc" data-column="5">Ngày Cập Nhật</option>
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
 <div class="table-responsive">
   <table class="table table-hover">
       <tr>
            <th>Tiêu Đề</th>
            <th>Nội Dung</th>
            <th>Menu</th>
            <th>Lượt Xem</th>
            
            <th>Ngày Tạo</th>
            <th>Ngày Cập Nhật</th>
        </tr>
        @foreach ($data as $value)
            <tr data-column="{{$value->id}}">
            <td>
                <span>{{$value->name}}</span>
                <div class="groupaction">
                        <a class="edit" href='{{Asset('admin/page/edit?id='.$value->id)}}'>Sửa</a>
                        <form method="post" action="{{Asset('admin/page/delete')}}" class="remove" dataitem='{"id":"{{$value->id}}","title":"{{$value->name}}","url":"{{Asset('admin/page/delete')}}"}'>
                                <input type="submit" value="Xóa">
                        </form>
                 </div>
            </td>
            <td>
                <a href='#view' class='viewcontent' data-toggle="modal" data-target="#modalcontent">Xem</a>
                <div class="hide">
                    {!! $value->content !!}
                </div>
            </td>
            <td>
                {{$value->namem}}
            </td>
            <td>
                {{$value->view}}
            </td>
            
            <td>
                 {{date('d/m/Y H:i',strtotime($value->created_at))}}
            </td>
            <td>
                 {{date('d/m/Y H:i',strtotime($value->updated_at))}}
            </td>
        </tr>
       
        @endforeach
        
    </table>
</div>

<!-- Modal -->
<div id="modalcontent" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


@endsection