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

<div data-role="page" id="transportationListYun" class="allPage">
  <div data-role="header" data-position="fixed" id="header">
    <h1>传输列表</h1>
    <form>
      <input id="upload" type="file" method="post" enctype="multipart/form-data" value="上传">
      <input class="tap" type="button" value="上传" data-inline="true" data-mini="true">
    </form>
    
     <div data-role="navbar" style="background:url(<?php echo Yii::app()->baseUrl; ?>/Sites/images/border_top.png) bottom repeat-x;padding-bottom:6px;">
      <ul>
        <li><a href="<?php echo Yii::app()->createUrl('site/transportationUpload'); ?>" data-transition="slide" data-direction="reverse" data-ajax="false">上传列表</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('site/transportationYun'); ?>" class="ui-btn-active ui-state-persist" data-ajax="false">保存到云</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('site/transportationDownLoad'); ?>" data-transition="slide" data-ajax="false">下载列表</a></li>
      </ul>
  </div>
  <div>
</div>
<!--header ends here  -->

<!-- mainContent starts here  -->
  <div data-role="content" id="mainContent" >
      <table width="100%" height="200px"><tr><td style="text-align:center;vertical-align:bottom"><font color="#dddde1">一键保存到网盘</font></td></tr></table> 
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
  
</div> 
<!--    footer ends here  -->

</body>
<html>