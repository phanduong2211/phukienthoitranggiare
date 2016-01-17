$(function(){
	$(".listgrid").on("click",function(){
		$(".view-systeam").find("li").removeClass("active");
		$(".Productlistview").addClass("displaynone");
		$(".Productlistgrid").removeClass("displaynone");
		$(this).addClass("active");
	});
	$(".listview").on("click",function(){
		$(".view-systeam").find("li").removeClass("active");
		$(".Productlistgrid").addClass("displaynone");
		$(".Productlistview").removeClass("displaynone");
		$(this).addClass("active");
	});
	$("#productShort").change(function(){
		$(this).val();
	});

Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};

///////////tính lại giá trị khi thay đổi số lượng
$(".quantity-product").change(function(){
	var price = parseInt($(this).parent().parent().prev().children().find(".promotion_price-match").text().replace(",",""));
	//alert(price);
	var quantity = $(this).val();
	totalprice = $(this).parent().parent().next().next().children().text((price*quantity).format());
	var total=0;
	$(".total-price").each(function(){
		var textFull = $(this).text();
		var texreplace = convertNumberToNomal(textFull);
		total+=parseFloat(texreplace);
	});
	
	$("#total_product").text(total.format()+" vnđ");
	
	total = parseInt(convertNumberToNomal(total+""));
	if(total>1000000) // nếu số tiền lơn hơn 1trieu thì không mất phí ship
		$("#total_shipping").text("0");
	else
		$("#total_shipping").text("15,000");
	var price_ship = $("#total_shipping").text().replace(",","");
	$("#total-all-price").text((parseInt(price_ship)+total).format());
});

////////////
function convertNumberToNomal(textFull)
{
	var texreplace ="";
		for(var i=0;i<textFull.length;i++)
		{
			if(textFull[i]!=",")
			{
				texreplace+=textFull[i];
			}
		}
	return texreplace;
}

	///////////////////////////////////////// tính % giảm giá
$(".promotion-price-match").each(function(){
	var promotion = parseInt($(this).parent().prev().children().text());
	var price = parseInt($(this).parent().next().children().text());
	
	var setPromotion = 100 - (promotion*100)/price;
	$(this).text(setPromotion);
});
	
});