/*
Copy right 2015 by trần văn thỏa
*/
var dialogupload=null;
var dialogshowimg=null;
function converSize(size){
  if(size>=1048576)
    return (size/1048576)+" MB";
    return Math.round((size/1024)*100,1)/100+" KB";
}
function LoadDataFolder(clickfirst){

  if(!$("#dialogupload .tabfolder li.active").hasClass("success")){

    var foldername=$("#dialogupload .tabfolder li.active").attr("data-value");
    var area=$("#dialogupload #"+foldername+"folder");
    area.html("Đang Tải...<br /><small>Nếu không tải được vui lòng click vào nút tải lại.</small>");
        LoadJson(base_url_admin+"ajax/loadfolder",{"folder":foldername,"_token":__token},function(result){
        
        if(typeof result==="undefined" || typeof result==="number"){
          alert("Có lỗi. Không thể load folder");
           
        }else{

          if(typeof result==="object"){
            var leg=result.length;
            for (var i=0;i<leg;i++) {
              for (var j=i+1;j<leg;j++) {
                if(result[i].time<result[j].time){
                  var temp=result[i];
                  result[i]=result[j];
                  result[j]=temp;
                }
              }
            }
            var asset=asset_path+"image/"+foldername+"/";
          
            area.html("<div class='item col-md-2 col-sm-3 col-xs-6'>success</div>");
            var maxwidth=area.find(".item:eq(0)").width()+10;

            area.html("");
            for (var key in result) {
              var item=result[key];
              var dorong=0;
              if(item['width']<maxwidth){
                dorong="width:"+item['width']+"px";
              }else{
                if(item['height']>=item['width']){
                  if(item['height']>100){
                    dorong="height:100px";
                  }else{
                    dorong="height:"+item['height']+"px";
                  }
                  
                }else{
                  dorong="width:100%";
                }
              }
              area.append("<div title='"+("Tên File: "+item['name']+"\nKích Thước: "+(converSize(item['size']))+"\nKích Thước: "+(item['width']+"x"+item['height'])+"\nNgày Tạo: "+item["time"])+"' class='item col-md-2 col-sm-3 col-xs-6'><div class='hoveritem'><div class='ctitem'><img class='contentitem' style='"+dorong+"' src='"+(asset+item['name'].replace(" ","%20"))+"' /></div><div class='namefile'>"+item['name']+"</div></div></div>");
            };

            if(clickfirst!=null){
              area.find(".item:eq(0)").click();
            }
          }
          $("#dialogupload .tabfolder li.active").addClass("success");     
          
        }
    }); 
  } 
}
function removeimgaa(){
  alert(pathremoveimg);
}
var idobjclick="";
var dialogxoahd=null;
var pathremoveimg=null;
$(document).ready(function(){
    

        $("body").on("click",".showupload",function(){
          if(dialogupload==null){
            dialogupload=new dialog($("#dialogupload"),{
            "width":1000,
            "height":500
            });
            dialogupload.init();
          }
          LoadDataFolder();
       		dialogupload.show();
          idobjclick=$(this).attr("href");
          
        	return false;
   	 	  });

   	 	$("#dialogupload .tabupload .tabitem li").click(function(){
   	 		if(!$(this).hasClass("active")){
   	 			var parenttab=$(this).parent().find(".active").removeClass("active");
   	 			$("#dialogupload .ct #"+parenttab.attr("data-value")).hide();

				  $(this).addClass("active");   
				  $("#dialogupload .ct #"+$(this).attr("data-value")).show();	 			
   	 		 if($(this).attr("data-value")=="tabuploadimg"){
          if($("#tabuploadimg>iframe").attr("src")==""){
            $("#tabuploadimg>iframe").attr("src",base_url_admin+"uploadimage?keyupload="+__token);
          }
         }

         if($(this).attr("data-value")=="tabuploadin"){
          if($("#tabuploadin").html()==""){
            $("#tabuploadin").html('<iframe src="http://upload.aloxovn.com/" width="100%" height="650px" style="margin-top:-300px" frameborder="0"></iframe><br /><h4 style="font-size:15px;color:red">Upload ảnh xong click vào tab <b>Direct Link</b> để lấy url hình, sau đó dán vào textbox</h4>');
          }
         }

        }
   	 	});

      $("#dialogupload .tabuploaditem").on('dblclick',"#folderitems .folderitem .item",function(){
        var folder=jQuery.parseJSON($(this).parent('.folderitem').attr("data-value"));
        
        dialogupload.hide();
        callBackUpload(idobjclick,folder.folder+"/"+$(this).find(".namefile").html().replace(" ","%20"));
      });

      $("#dialogupload .tabuploaditem").on('click',"#folderitems .folderitem .item",function(){
        if(!$(this).hasClass("activeitem")){
          $(this).parent().find(".activeitem").removeClass("activeitem");
          $(this).addClass("activeitem");
        }else{
          $(this).removeClass("activeitem");
        }
        
      });

   	 	$("#dialogupload .tabfolder li").click(function(){
   	 		if(!$(this).hasClass("active")){
   	 			var parenttab=$(this).parent().find(".active").removeClass("active");
   	 			$("#dialogupload .ct #folderitems #"+parenttab.attr("data-value")+"folder").removeClass("active");

				$(this).addClass("active");   
				$("#dialogupload .ct #folderitems #"+$(this).attr("data-value")+"folder").addClass("active");	 			
   	 		 LoadDataFolder();
        }
   	 	});
   	 	$("#dialogupload #refreshupload").click(function(){
   	 		 $("#dialogupload .tabfolder li.active").removeClass("success");
          LoadDataFolder();
   	 	});
      $("#refreshuploadend").click(function(){
        $("#fff"+$(this).attr("data-value")).removeClass("success").click();
        LoadDataFolder(true);
        
      });

      $("#downloadimg").click(function(){
        var itemselect=$("#folderitems .folderitem.active .activeitem");
        if(itemselect.size()==0)
        {
          alert("Vui lòng chọn 1 hình ảnh cần download");
          return false;
        }
        var filename=$("#dialogupload .tabfolder li.active").attr("id").substr(3)+"/"+itemselect.eq(0).find(".namefile").html();

        window.open(base_url+"downloadfiles.php?keydown=true&filename="+filename);
      });

      $("#chooseImg").click(function(){
        var currentItemSeclect=$("#folderitems .folderitem.active .activeitem");
        if(currentItemSeclect.size()>0){
        var folder=jQuery.parseJSON(currentItemSeclect.parent('.folderitem').attr("data-value"));

        dialogupload.hide();
        callBackUpload(idobjclick,folder.folder+"/"+currentItemSeclect.find(".namefile").html().replace(" ","%20"));
        }else{
          alert("Vui lòng chọn 1 hình ảnh");
        }
      });
      $("#removeupload").click(function(){
        var currentItemSeclect=$("#folderitems .folderitem.active .activeitem");
        if(currentItemSeclect.size()>0){
          var namefile=currentItemSeclect.eq(0).find(".namefile").html();
           if(dialogxoahd==null){
             dialogxoahd=new dialog($("#dialogxoaimg"),{
              "width":400,
              "height":200,
              'ttop':50
              });
              dialogxoahd.init();
             
            }
            var folder=jQuery.parseJSON(currentItemSeclect.parent('.folderitem').attr("data-value"));
           
            pathremoveimg=folder.folder+"/"+namefile;
          dialogxoahd.getObj().find("img").attr("src",asset_path+"image/"+pathremoveimg);
          dialogxoahd.getObj().find("b").html(namefile);
            dialogxoahd.show();


        }else{
          alert("Vui lòng chọn 1 hình ảnh");
        }
      });

      $("#btnremoveimgdialog").click(function(){
        var th=$(this);
        th.attr("disabled","disabled").val("Đang xóa...");
        LoadJson(base_url_admin+"ajax/removeimg",{"file":pathremoveimg,"_token":__token},function(result){
         th.removeAttr("disabled").val("Tiếp tục xóa");
          dialogxoahd.hide();
          if(result==1)
           $("#folderitems .folderitem.active .activeitem").remove();
        });
      });

      $("#zoomimage").click(function(){
        var objselect=$("#folderitems .folderitem.active .activeitem");
        if(objselect.size()>0){
          if(dialogshowimg==null){
            dialogshowimg=new dialog($("#dialogshowimg"),{
              "width":1100,
              "height":550
            });
            dialogshowimg.init();
          }
          var objdialog=dialogshowimg.getObj();
          objdialog.find(".ct").css("line-height",objdialog.height()-100+"px").html("<img src='"+objselect.find(".contentitem").attr("src")+"' class='img' />");
          objdialog.find(".img").css({"max-width":objdialog.width()-100,"max-height":objdialog.height()-100});
          objdialog.find("p").html(objselect.attr("title").replace(/\n/g," - "));
          
          dialogshowimg.show();
        }else{
          alert("Vui lòng chọn 1 hình ảnh");
        }

      });
});