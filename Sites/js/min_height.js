$(document).ready(function(){
	var h=window.innerHeight              //实现设置最小高度为浏览器高度
|| document.documentElement.clientHeight
|| document.body.clientHeight + 'px';
	$('#mainContent').css("min-height",h);
	
});
