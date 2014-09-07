<!DOCTYPE html>
<html>
<head>
  <div value="<?php echo Yii::app()->baseUrl; ?>/Sites/" id="url"></div>
  <meta charset="utf-8">
  <meta name="viewport" content=" initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/Sites/css/reset.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/Sites/css/themes/header.min.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/Sites/css/themes/jquery.mobile.icons.min.css">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.3/jquery.mobile.structure-1.4.3.min.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/Sites/css/themes/supplement.css">
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/Sites/css/themes/classify.css">
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

<div data-role="page" id="doc" class="allPage">
  <div data-role="header" data-position="fixed" id="header">
    <h1>分类</h1>
    <div id="classification">
      <ul class="clearfix">
        <li id="docLink"><a href="<?php echo Yii::app()->createUrl('site/classifyDoc'); ?>" data-transition="slide" data-direction="reverse" data-ajax="false">文档<img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/classify_doc.png"></a></li>
        <li id="picLink"><a href="<?php echo Yii::app()->createUrl('site/classifyPic'); ?>" data-ajax="false">图片<img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/classify_pic.png"></a></li>
        <li id="musicLink"><a href="<?php echo Yii::app()->createUrl('site/classifyMusic'); ?>">音乐<img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/classify_music.png"></a></li>
        <li id="videoLink"><a href="<?php echo Yii::app()->createUrl('site/classifyVideo'); ?>" data-ajax="false">视频<img class="shipin" src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/classify_video.png"></a></li>
        <li id="othersLink"><a href="<?php echo Yii::app()->createUrl('site/classifyOthers'); ?>" data-transition="slide" data-ajax="false">其他<img class="qita" src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/classify_others.png"></a></li>
      </ul>
  </div>
  </div>
<!--header ends here  -->

<!-- mainContent starts here  -->
  <div data-role="content" id="mainContent">
    <ul data-role="listview" data-filter="true" data-filter-placeholder="搜索我的文件">
      <?php foreach($file as $tmp_file){?>
        <li><a ><img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/homePage1_doc.png" width="38" height="42"><h2><?php echo $tmp_file->file_name; ?></h2><p><?php echo Common::fileSize($tmp_file->file_size); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Common::cutDateTime($tmp_file->create_time); ?></p></a><img class="rightClick" src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/arrow-r.png"></li>
      <?php }?>
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