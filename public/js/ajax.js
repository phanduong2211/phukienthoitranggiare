$(function(){

//////////////click add wishlist
	$('.fa-heart-o').parent().click(function() {		
			ajaxget("wishlist",$(this).parent().parent().attr('id'),"Thêm thành công sản phẩm vào wishlist");
	});
	$(".fa-wishlist").parent().click(function() {
		//alert()
		ajaxget("../../wishlist",$(this).parent().parent().attr('data-productID'),"Thêm thành công sản phẩm vào wishlist");
	});
	deletewishlist();
///////////////// click add cart
	$(".add-cart").parent().click(function() {
		//alert($(this).parent().parent().attr('id'));
		ajaxpost("add-cart",$(this).parent().parent().attr('id'));
		
	});
	$(".single-product-add-cart").on("click",function(){

		ajaxpost("../../add-cart",$(this).attr("data-productID"));
		//alert($(this).attr("data-productID"));
	});

//////////////click count add quantity in cart 
	/*$(".quantity-product").change(function(){
    	console.log("abc");
	});*/
	$(".qtybutton").click(function(){
		alert("ldkf");
	});

	////////////delete product in cart
	$(".cart_quantity_delete").on("click",function(){
		///alert();
		var index= $(this).attr("data-index");
		bootbox.confirm("Xóa sản phẩm này khỏi giỏ hàng của bạn?", function(result) {
			  	if(result==true)
			  	{			  		
			  		ajaxpost("delete-cart",index);
			  	}
			}); 
		
	});
	////////////////////////////////////////--------------------////////////////////////////////

	//ajax post 
	function ajaxpost(url,data)
	{
		var Data = {
            _token:$(this).data('token'), //cần thiết với laravel 5
            contents: data
        }
		//var formData = {name:"Ravi",loc:"India",age:31,submit:true};
		$.ajax(
		{
		url : url,
		type: "POST",
		beforeSend: function (xhr) { // cần thiết với laravel 5
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
		data : Data,
		success: function(data, textStatus, jqXHR)
		{
			console.log(textStatus);
			if(data==1){				
				bootbox.alert("Đã thêm sản phầm vào giỏ hàng", function() {
					  $(".count-cart").text(parseInt($(".count-cart").text())+1);
					});				
			}
			else if(data==-1)
			{
				bootbox.alert("Sản phẩm này đã có trong giỏ hàng", function() {
					  //$(".count-cart").text(parseInt($(".count-cart").text())+1);					  
					});
			}
			else if(data==2)
			{
				bootbox.alert("Sản phẩm đã được xóa khỏi giỏ hàng", function() {
					  //$(".count-cart").text(parseInt($(".count-cart").text())+1);	
					  window.location.reload();				  
					});
			}
			//return true;
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
			console.log(textStatus);
			//return false;
		}
		});
	}
	//ajax jquery get 
	function ajaxget(url,data,alert)
	{
		$.get(url,
        {
          id: data
        },
        function(data,status){
	        if(status=="success"){
	            if(data==1)
	            	bootbox.alert(alert, function() {
					  
					});
	            else if(data == 0)
	            {
	            	window.location.replace("registration.html");
	            	console.log("chưa đăng nhập");
	            }
	            else if(data == 2)
	            	bootbox.alert("Đã tồn tại sản phẩm này trong wishlist của bạn", function() {
					  
					});
        	}
        	console.log(status);
        });
	}
//// xóa wishlist
	function deletewishlist()
	{
		$(".deletewishlist").click(function() {
			var id=$(this).attr('id');
			var html = $(this).parent().parent().parent().parent().parent();
			bootbox.confirm("Xóa sản phẩm này khỏi wishlist của bạn?", function(result) {
			  	if(result==true)
			  	{
			  		
			  		html.remove();
			  		ajaxpost("deletewishlist",id);
			  		console.log("da xao");
			  		//console.log(id);
			  	}
			  	else
			  		console.log("khong xoa");
			}); 
		});
	}
});