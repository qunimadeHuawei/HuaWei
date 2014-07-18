$(document).ready(function(){
	var width;
	var used = $(".used").html();
	var total = $(".total").html();
	var percent = used/total;
	percent = percent*100;
	percent = percent + "%";
	$(".top .blue").css('width',percent);
});