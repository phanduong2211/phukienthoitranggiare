@extends('layouts.admin')

@section('title', 'Quản Trị Viên')
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
    $("#nav-accordion>li:eq(5)>a").addClass("active");
    $("form.blockuser").submit(function(){
      var th=$(this);
      var th2=th;
      var loai=th.find("input[type='submit']").val();
      getConfirm('Bạn có chắc muốn '+loai+' QTV này?',function(result) {
        if(result){
          var id=th.find("input[name='id']").val();
          th=th.parents("tr");
          th.addClass("noaction");
          loai=(loai=="Khóa")?0:1;
          LoadJson(base_url+'ad/active',{"id":id,"loai":loai,"_token":__token},function(result){
            th.removeClass("noaction");
            if(result=="1"){
              if(loai==0){
                th.addClass("opahi");

                th2.find("input[type='submit']").val("Mở khóa");
              }
              else{
                th.removeClass("opahi");
                th2.find("input[type='submit']").val("Khóa");
             }
              th.attr("data-key",loai);
            }else{
              alert("có lỗi.");
            }
          });
        }
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
     <a href="{{Asset('admin/ad/add')}}" class="pull-left btn btn-primary btn-sm">Thêm mới</a>
   </div>
 </div>
 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-xs-marg text-right clearfix">
  <div class="pull-right">
    <select class="sfilter noautosubmit" name="f">
      <option value="0" data-key="" data-column="-2">-Lọc-</option>
      <option value="1" data-key="administrator" data-column="4">Là Administrator</option>
      <option value="2" data-key="moderator" data-column="4">Là Moderator</option>
      <option value="3" data-key="nhân viên" data-column="4">Là Nhân Viên</option>
      <option value="4" data-key="0" data-column="-1">Đang Khóa</option>
    </select>
  </div>
  <div class="pull-right">

    <select class="sfilter noautosubmit" name="s">
      <option value="0" data-sort="desc" data-column="-1">-Sắp xếp-</option>
      <option value="1" data-sort="desc" data-column="-1">Mới nhất</option>
      <option value="2" data-sort="asc" data-column="-1">Cũ nhất</option>
      <option value="3" data-sort="asc" data-column="0">Tên</option>
      <option value="4" data-sort="asc" data-column="1">Tài Khoản</option>
      <option value="4" data-sort="asc" data-column="2">Email</option>
      <option value="4" data-sort="asc" data-column="3">Số ĐT</option>
      <option value="4" data-sort="asc" data-column="4">Cấp Độ</option>
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
    <th>Tên</th>
    <th>Tài khoản</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Cấp độ</th>
    <th>Date</th>
  </tr>
  @foreach($data as $item)
   <tr data-column="{{$item->id}}" data-key="{{$item->active}}" <?php if($item->active==0) echo "class='opahi'" ?>>
    <td>{{$item->name}}

     <div class="groupaction">
     <a class="edit" href='{{Asset('admin/ad/edit?id='.$item->id)}}'>Sửa</a>
     <?php $useronline=Session::get('logininfo')->id; ?>
     @if($useronline!=$item->id)
     <form method="post" action="{{Asset('admin/ad/delete')}}" msg="Bạn có chắc muốn xóa QTV {{$item->name}}" class="remove">
        <input type="hidden" name="id" value="{{$item->id}}">
        <input type="hidden" name="title" value="{{$item->name}}">
         <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <input type="submit" value="Xóa">
    </form>
    <form method="post" action="{{Asset('admin/ad/active')}}" class="remove blockuser" nocomfirm="true">
        <input type="hidden" name="id" value="{{$item->id}}">
        <input type="submit" value="{{$item->active==0?'Mở khóa':'Khóa'}}">
    </form>
    @endif
 </div>
</td>
<td>
 {{$item->username}}
</td>
<td>
 {{$item->email}}
</td>
<td>
 {{$item->phone}}
</td>
<td>
<?php 
switch ($item->level) {
  case 1:
    echo "Administrator";
    break;
  case 2:
    echo "Moderator";
    break;
  case 3:
    echo "Nhân Viên";
    break;
}
 ?>
</td>
<td>
  Tạo: 
  {{date('d/m/Y H:i',strtotime($item->created_at))}}
  <br />
  Cập Nhật:  {{date('d/m/Y H:i',strtotime($item->updated_at))}}
</td>

</tr>
@endforeach

</table>

</div>
@endsection