$(document).on("pageinit",".allPage",function(){
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
			$('#footer').slideDown(1000);
			$("#function").hide();
			count=0;
		};
	});
	$("#mainContent ul li a.floder:after").css("color","green");
	console.log('aaa');
	//以上代码实现点击时的#function的弹框效果
/*	$("mainContent ul li .tap_icon").on("tap",function(){
		$("#footer").hide();
		$('#function').slideDown();
		alert('hi');
		console.log('aaa');
	})想去掉after图片但是没成功*/
	$("#header #upload").hide();
	$("#header .tap").on("tap",function(){
		$("#header #upload").click();
	}) //点击上传按钮时上传文件
//	$("#header .tap").on("tap",function(){

//	})
});
