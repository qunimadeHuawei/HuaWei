<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content=" initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/Sites/css/reset.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/Sites/css/themes/header.min.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/Sites/css/themes/jquery.mobile.icons.min.css">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.3/jquery.mobile.structure-1.4.3.min.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/Sites/css/themes/supplement.css">
<script src="<?php echo Yii::app()->baseUrl; ?>/Sites/js/jquery.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.js"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/Sites/js/min_height.js"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/Sites/js/taphold.js"></script>
<script type="text/javascript">
    function showFileName()
      {
        var file = document.getElementById("upload");
        for(var i = 0, j = file.files.length; i < j; i++)
            {
               alert(file.files[i].name);
                            };
            };
            </script>
</head>
<body>

<div data-role="page" id="homePage" class="allPage">
  <div data-role="header" data-position="fixed" id="header">
    <h1>华为网盘</h1>
    <form>
      <input id="upload" type="file" method="post" enctype="multipart/form-data" value="上传">
      <input class="tap" type="button" value="上传" data-inline="true" data-mini="true">
    </form>
  </div>
<!--header ends here  -->

<!-- mainContent starts here  -->
  <div data-role="content" id="mainContent">
    <ul data-role="listview" data-filter="true" data-filter-placeholder="搜索我的文件">
      <li><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/homePage1_doc.png" width="38" height="42"><h2>舌尖上的中国.txt</h2><p>586k&nbsp;&nbsp;&nbsp;&nbsp;2014-07-14</p></a></li>
      <li><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/homePage1_pic.png" width="38" height="42"><h2>春光.png</h2><p>586k&nbsp;&nbsp;&nbsp;&nbsp;2014-07-14</p></a></li>
      <li><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/homePage1_video.png" width="38" height="42"><h2>神探夏洛克.rmvb</h2><p>586k&nbsp;&nbsp;&nbsp;&nbsp;2014-07-14</p></a></li>
      <li><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/homePage1_music.png" width="38" height="42"><h2>不要说话.mp3</h2><p>586k&nbsp;&nbsp;&nbsp;&nbsp;2014-07-14</p></a></li>
      <li><a href="#" class="floder"><img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/homePage1_floder.png" width="38" height="42">新建文件夹</a></li>
    <ul>
  </div>
<!--  mainContent ends here   -->

<!--    footer starts here   -->
  <div data-role="footer" data-position="fixed" id="footer">
    <div data-role="navbar">
      <ul>
        <li><a href="<?php echo Yii::app()->createUrl('site/homePage'); ?>" data-icon="home" class="mulu" data-ajax="false">目录</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('site/classifyDoc'); ?>" data-icon="home" class="fenlei" data-ajax="false">分类</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('site/transportationUpload'); ?>" data-icon="home" class="chuanshuliebiao" data-ajax="false">传输列表</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('site/set'); ?>" data-icon="home" class="shezhi" data-ajax="false">设置</a></li>
      </ul>
    </div>
  </div>
  <div id="function">
      <ul class="clearfix">
        <li><a href="">下载<img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/function_icon1.png"></a></li>
        <li><a href="">复制<img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/function_icon2.png"></a></li>
        <li><a href="">移动<img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/function_icon3.png"></a></li>
        <li><a href="">重命名<img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/function_icon4.png"></a></li>
        <li><a href="">删除<img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/function_icon5.png"></a></li>
      </ul>
    </div>
</div> 
<!--    footer ends here  -->

</body>
</html>
