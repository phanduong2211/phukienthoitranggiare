<link rel="stylesheet" type="text/css" href="{{Asset('')}}public/admin/css/dialog.css" />

<div id="refreshuploadend"></div>
<div id="dialogupload">
    <div class='header'>
        Upload Image <i title="close" class="fa fa-times closedialog"></i>
    </div>
    <div class="tabupload">
        <div class="tabitem clearfix">
            <li class="active" data-value="tabchooseimg">Chọn Hình Ảnh</li>
            <li data-value="tabuploadimg">Upload Hình Mới</li>
            
        </div>
        
        <div class="ct">


            <div class="tabuploaditem active" id="tabchooseimg">
                <div id="groupbutton" class="clearfix">
                    <div id="chooseImg" title="Chọn" class="fa fa-check"></div>
                  
                    <div id="removeupload" title="Xóa ảnh" class="fa fa-times"></div>
                    <div id="zoomimage" title="Xem ảnh với kích thước lớn" class="fa fa-search-plus"></div>
                    <div id="refreshupload" title="làm mới" class="fa fa-refresh"></div>

                </div>
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-xs-4">
                       <b style="display:block;margin-bottom:8px">Chọn Folder:</b>
                       <div class='tabfolder'>
                        <li id="fffupload" class="active" data-value="folderupload">Upload</li>
                        <li id="fffproduct" data-value="foldersanpham">Sản Phẩm</li>
                        
                        <li id="fffnews" data-value="foldernews">Tin Tức</li>
                        <li id="fffslide" data-value="folderslide">Slide</li>
                    </div>
                </div>
                <div class="col-md-10 col-sm-8 col-xs-8" id="folderitems">
                    <div id="folderupload" data-value='{"folder":"upload"}' class="folderitem active">
                        Đang Tải...
                    </div>

                   <div id="foldersanpham" data-value='{"folder":"product"}' class="folderitem">
                        Đang Tải...
                    </div> 

                    <div id="foldernews" data-value='{"folder":"news"}' class="folderitem">
                        Đang Tải...
                    </div>

                    <div id="folderslide" data-value='{"folder":"slide"}' class="folderitem">
                        Đang Tải...
                    </div>
                </div>
            </div>
        </div>
        <div class="tabuploaditem" id="tabuploadimg">
            <iframe src="" width="100%" height="300px" frameborder="0"></iframe>
        </div>
    </div>

</div>

</div>

<div id="dialogshowimg">
    <div class='ct'>
    </div>
    <p></p>
    <div class="pull-right" style="margin-right:20px">
        <div class="btn btn-default" onclick="dialogshowimg.hide()">Đóng</div>
    </div>
</div>

<div id="dialogxoaimg">
    <div class='header'>
     Xác Nhận Xóa Hình Ảnh <i title="close" class="fa fa-remove closedialog"></i>
 </div>
 <div class='ct'>
 <div class='row'><div class='col-md-4 col-xs-4'><img class='img-thumbnail' style='width:100px' src='' /></div><div class='col-md-8 col-sm-8'>
    Bạn có chắc muốn xóa ảnh <b></b>.<br />Khi xóa ảnh này đi thì những nơi dùng ảnh này sẽ bị lỗi.<br />Bạn hãy kiểm tra kỹ trước khi xóa.<br /><br /><input type="button" class='btn btn-primary btn-xs' id="btnremoveimgdialog" value="Tiếp tục xóa" /> <a class='btn btn-default btn-xs' onclick='dialogxoahd.hide()'>Hủy bỏ</a>
</div></div>

</div>
</div>