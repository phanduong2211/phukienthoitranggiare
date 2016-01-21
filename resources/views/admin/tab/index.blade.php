@extends('layouts.admin')

@section('title', 'Quản Lý Tab')
@section('script')
<script type="text/javascript">
    $(function(){
        $("#nav-accordion>li:eq(1)>a").addClass("active").parent().find("ul>li:eq(3)").addClass("active");
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
           <a href="{{Asset('admin/tab/add')}}" class="pull-left btn btn-primary btn-sm">Thêm mới</a>
       </div>
   </div>
   <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-xs-marg text-right clearfix">
    
    <form method="get" action="" class="pull-right">
        <select class="sfilter noautosubmit" name="s">
            <option value="0" data-sort="desc" data-column="-1">-Sắp xếp-</option>
            <option value="1" data-sort="desc" data-column="-1">Mới nhất</option>
            <option value="2" data-sort="asc" data-column="-1">Cũ nhất</option>
            <option value="3" data-sort="asc" data-column="1">Tên</option>
            <option value="4" data-sort="desc" data-column="2">Ngày Tạo</option>
            <option value="5" data-sort="desc" data-column="3">Ngày Cập Nhật</option>
        </select>
    </form>
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
            <th>STT</th>
            <th>Tên</th>
            <th>Ngày Tạo</th>
            <th>Ngày Cập Nhật</th>
        </tr>
        <?php $count=0; ?>
        @foreach ($data as $value)
        <?php $count++; ?>
            <tr data-column="{{$value->id}}">
            <td>{{$count}}</td>
            <td>
                {{$value->name}}
                 <div class="groupaction">
                        <a class="edit" href='{{Asset('admin/tab/edit?id='.$value->id)}}'>Sửa</a>
                        <form method="post" action="{{Asset('admin/tab/delete')}}" class="remove">
                                <input type="hidden" name="id" value="{{$value->id}}">
                                <input type="hidden" name="title" value="{{$value->name}}">
                                <input type="submit" value="Xóa">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            </form>
                    </div>
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
    @endsection