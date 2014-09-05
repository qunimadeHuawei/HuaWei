$(document).on("pageinit",".allPage",function(){
	var whichTaped;
	var count=0;
	var url = $("#url").attr("value");
	$("#function").hide();
	$("#mainContent ul li a").on("taphold",function(){
		$(this).find("img.rightClick").attr("src",url+"images/arrow-d.png");
		$("#footer").hide();
		$('#function').slideDown();
		whichTaped = $(this).find('h2').html();
		count++;//count==1
	});
	$("#mainContent ul li a").on("tap",function(){
		count++; //实现再次tap即消去#function的效果,count==2,再次点击时count==3
		whichTaped = $(this).find('h2').html();
		if(count>2){
			$(this).parent().parent().find("img.rightClick").each(function(){
				if($(this).attr("src")==url+"images/arrow-d.png"){
					$(this).attr("src",url+"images/arrow-r.png");
				}
			});
			$(this).parent().find("img.rightClick").attr("src",url+"images/arrow-r.png");
			console.log('asa');
			$('#footer').slideDown();
			$("#function").hide();
			count=0;
		};
	});
	$("img.rightClick").on("tap",function(){
		$(this).attr("src",url+"images/arrow-d.png");
		$("#footer").hide();
		$('#function').slideDown();
		count=2;
	})
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
    




//	$('input#chongmm').attr("placeholder",whichTaped);
//	console.log('jnn');
//	$('#chongmm').focus();
});
