@extends('layouts.admin')

@section('title', 'Tin Tức')
@section('script')
<script type="text/javascript">
  function LoadJson(url,dt,callback) {
    $.ajax({
      type: "POST",
      url: url,
      dataType: 'json',
      data:dt,
      beforeSend: function(){
      },
      success: callback,
      error: function (e, e2, e3) {
      }
    });
  }
  var base_url="{{Asset('admin')}}/";
  var __token="{{csrf_token()}}";
  $(function(){
    $("#nav-accordion>li:eq(4)>a").addClass("active").parent().find("ul>li:eq(0)").addClass("active");
   

    $(".displayitem").click(function(){
      var th=$(this);
      var id=th.attr("data-id");
      var flag=(th.html()=="Ẩn")?0:1;
      th.parents("tr").addClass("noaction");


      LoadJson(base_url+'news/hidden',{"id":id,"_token":__token,"flag":flag},function(result){
        if(result=="1"){
          if(flag==0){
            th.html("Hiện");
            th.parents("tr").addClass("opahi");
          }else{
            th.html("Ẩn");
            th.parents("tr").removeClass("opahi");
          }
        }else{

          alert("có lỗi.");
        }
        th.parents("tr").removeClass("noaction");
      });

      return false;
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
     <a href="{{Asset('admin/news/add')}}" class="pull-left btn btn-primary btn-sm">Thêm mới</a>
   </div>
 </div>
 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-xs-marg text-right clearfix">
  <form method="get" action="" class="pull-right">
    <select class="sfilter" name="f">
      <option value="0">-Lọc-</option>
      <option value="1">Tin Của Bạn</option>
      <option value="2">Hiện</option>
      <option value="3">Ẩn</option>
    </select>
  </form>
  <form method="get" action="" class="pull-right">

    <select class="sfilter" name="s">
      <option value="0">-Sắp xếp-</option>
      <option value="1">Mới nhất</option>
      <option value="2">Cũ nhất</option>
      <option value="3">Tên</option>
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
    <th width="20%">Tiêu Đề</th>
    <th>Image</th>
    <th width="25%">Mô Tả</th>
    <th>Loại</th>
    <th>Xem</th>
    <th>Người Tạo</th>
    <th>Date</th>
  </tr>
  <?php $count=0; ?>
  <?php foreach ($data as $item): ?>
   <tr <?php if($item->display==0) echo "class='opahi'" ?>>
    <td>{{$item->name}}

     <div class="groupaction">
    
     <a class="edit" href='{{Asset('admin/news/edit?id='.$item->id)}}'>Sửa</a>
     <form method="post" action="{{Asset('admin/news/delete')}}" class="remove">
      <input type="hidden" name="id" value="{{$item->id}}">
      <input type="hidden" name="title" value="{{$item->name}}">
       <input type="hidden" name="_token" value="{{csrf_token()}}"/>
      <input type="submit" value="Xóa">
    </form>
    <?php if($item->display==0){
      echo "<a class='edit displayitem' href='#' data-id='".$item->id."'>Hiện</a>";
    }else{
     echo "<a class='edit displayitem' href='#' data-id='".$item->id."'>Ẩn</a>";
   } ?>
 </div>
</td>
<td><img src="{{showImage($item->image)}}" style="width:50px" />
</td>
<td>
 {{$item->description}}
</td>
<td>{{$item->namec}}</td>
<td>{{$item->view}}</td>
<td>{{$item->nameuser}}</td>
<td>
  Tạo: 
  {{date('d/m/Y H:i',strtotime($item->created_at))}}
  <br />
  Cập Nhật:  {{date('d/m/Y H:i',strtotime($item->updated_at))}}
</td>

</tr>
<?php endforeach; ?>

</table>
<?php echo $data->render(); ?>
</div>
@endsection