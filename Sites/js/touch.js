$(document).ready(function(){
		$('#function').hide();
	$('#mainContent ul li .func_icon img').toggle(function(){
		$(this).attr("src","../images/select.png");
		$('footer').hide;
		$('#function').slideDown();
	},
	function(){
		$(this).attr("src","../images/homePage_li_bg.png");
		$('footer').show;
		$('#function').slideUp();
	});
});
$(document).on("pageinit","#homePage",function(){
		$("#mainContent ul li").on("taphold",function(){
			$(this).find(".func_icon img").attr("src","../images/select.png");
			$('footer').hide;
			$('#function').slideDown();
		});
	});