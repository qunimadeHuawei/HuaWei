$(document).on("pageinit","#homePage",function(){
	var count = 0;
	$("ul#classification").hide();
		$("#homePage h1.classify").on("tap",function(){
			$(this).css("bacgroundColor","#4da8dc")
			$("ul#classification").slideDown();
		});
	else { $("#homePage h1.classify").on("tap",function(){
			$(this).css("bacgroundColor","#55b8f1");
			$("ul#classification").slideUp();
		)};}
});