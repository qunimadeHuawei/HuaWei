$(document).on("pageinit","#homePage",function(){
	var count=0;
	$("#function").hide();
	$("#mainContent ul li a").on("taphold",function(){
		$("#footer").hide();
		$('#function').slideDown();
		count++;//count==1
	});
	$("#mainContent ul li a").on("tap",function(){
		count++; //实现再次tap即消去#function的效果,count==2,再次点击时count==3
		if(count>2){
			$('#footer').show();
			$("#function").slideUp();
			count=0;
		};
	});
});