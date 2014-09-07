$(document).on("pageinit",".allPage",function(){
	var whichTaped;
	var aValue;
	var a,b,c,d,e;
	a = $("#a").attr("href");
	b = $("#b").attr("href");
	c = $("#c").attr("href");
	d = $("#d").attr("href");
	e = $("#e").attr("href");
	var count=0;
	var url = $("#url").attr("value");
	var Delete = "<?php echo Yii::app()->createUrl('site/delete'); ?>";
	$("#function").hide();
	$("#mainContent ul li a").on("taphold",function(){
		$(this).find("img.rightClick").attr("src",url+"images/arrow-d.png");
		$("#footer").hide();
		$('#function').slideDown();
	//	whichTaped = $(this).find('h2').html();       获取当前点击的文件名
		count++;//count==1
	});
	$("#mainContent ul li a").on("tap",function(){
		count++; //实现再次tap即消去#function的效果,count==2,再次点击时count==3
	//	whichTaped = $(this).find('h2').html();
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
		aValue = $(this).parent().find("a").attr("value");//获取当前点击的元素的value
		$("#function ul li a#a").attr("href",a+"/"+aValue);
		$("#function ul li a#b").attr("href",b+"/"+aValue);
		$("#function ul li a#c").attr("href",c+"/"+aValue);
		$("#function ul li a#d").attr("href",d+"/"+aValue);
		$("#function ul li a#e").attr("href",e+"/"+aValue);
		$("#footer").hide();
		$('#function').slideDown();
		count=2;
	});		
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
    



/*重命名隐藏提交按钮*/
	$("a#queding").on("tap",function(){
		$("#hideSubmit").submit();
	});
	$("a#queding1").on("tap",function(){
		$("#hideSubmit1").submit();
	});
//	$('input#chongmm').attr("placeholder",whichTaped);
//	console.log('jnn');
//	$('#chongmm').focus();

});
