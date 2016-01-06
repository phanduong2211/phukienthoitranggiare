$(function(){

	$('.fa-heart-o').click(function() {		
			ajaxget("wishlist",$(this).parent().parent().parent().attr('id'));
	});
	deletewishlist();



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
			//data: data from server 
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
			console.log(textStatus);
		}
		});
	}
	//ajax jquery get 
	function ajaxget(url,data)
	{
		$.get(url,
        {
          id: data
        },
        function(data,status){
	        if(status=="success"){
	            if(data==1)
	            	console.log("thanh cong");
	            else if(data == 0)
	            {
	            	window.location.replace("registration.html");
	            	console.log("chưa đăng nhập");
	            }
	            else if(data == 2)
	            	console.log("đã tồn tại");
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