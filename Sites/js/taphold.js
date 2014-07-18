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
	//以上代码实现点击时的#function的弹框效果


function showFileName()
      {
        var file = document.getElementById("upload");
        for(var i = 0, j = file.files.length; i < j; i++)
            {
               alert(file.files[i].name);
                            };
            };
	$("#header #upload").hide();
});
