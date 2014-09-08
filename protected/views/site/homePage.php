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
    function formSubmit() 
     {
        document.getElementById("myForm").submit();
     }
</script>
</head>
<body>

<div data-role="page" id="homePage" class="allPage">
  <div data-role="header" data-position="fixed" id="header">
    <h1>华为网盘</h1>
    <form id="myForm"  enctype="multipart/form-data" action="<?php echo Yii::app()->createUrl('site/upload'); ?>" method="post">
      <input id="upload" name="file" type="file" onchange="formSubmit()">
      <input class="tap" type="button" value="上传" data-inline="true" data-mini="true">
    </form>
  </div>
<!--header ends here  -->

<!-- mainContent starts here  -->
  <div data-role="content" id="mainContent">
    <ul data-role="listview" data-filter="true" data-filter-placeholder="搜索我的文件">
      <?php foreach($folder as $tmp_folder){?>
        <li><a value='' href="<?php echo Yii::app()->createUrl('site/homePage',array('f'=>$tmp_folder->folder_id)); ?>" class="floder"><img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/homePage1_floder.png" width="38" height="42"><h2><?php echo $tmp_folder['folder_name']; ?></h2></a></li>  <!--添加h2-->
      <?php }?>
      <?php foreach($file as $tmp_file){?>
        <li><a value='<?php echo $tmp_file->file_relation_id;?>' ><img src="<?php  echo Common::getPicPath($tmp_file->file_type); ?>" width="38" height="42"><h2><?php echo $tmp_file->file_name; ?></h2><p><?php echo Common::fileSize($tmp_file->file_size); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Common::cutDateTime($tmp_file->create_time); ?></p></a><img class="rightClick" src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/arrow-r.png"></li>
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
  <div id="function" style="display:none;">
      <ul class="clearfix">
        <li><a data-ajax="false" href="<?php echo Yii::app()->createUrl('site/download'); ?>" id="a">下载<img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/function_icon1.png"></a></li>
        <li><a data-ajax="false" href="<?php echo Yii::app()->createUrl('site/copy'); ?>" id="b">复制<img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/function_icon2.png"></a></li>
        <li><a data-ajax="false" href="<?php echo Yii::app()->createUrl('site/move'); ?>" id="c">移动<img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/function_icon3.png"></a></li>
        <li><a data-ajax="false" href="#rename" data-rel="dialog" id="d">重命名<img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/function_icon4.png"></a></li>
        <li><a data-ajax="false" href="<?php echo Yii::app()->createUrl('site/delete'); ?>" id="e">删除<img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/function_icon5.png"></a></li>
      </ul>
    </div>  <!--添加点击重命名后弹出的表单-->
</div> 
<!--    footer ends here  -->
  <div data-role="page" id="rename" class="allPage">
    <form id="hideSubmit" action="<?php echo Yii::app()->createUrl('site/rename'); ?>" method="post">
      <div data-role="header">
        <h2 id="chongmingming">重命名</h2>
      </div>
      <div data-role="content">
        <input type="text" name="new_name" id="chongmm" placeholder="请输入新名字"/>
        <input type="hidden" name="file_id" value='' />
      </div>
      <div data-role="footer"> 
        <div data-role="navbar">
          <ul>
            <li><a href="#" data-rel="back"><input type="button" data-inline="true" value="取消"></a></li>
            <li><a href="#" id="queding"><input type="button" data-inline="true" value="确定"></a></li>
          </ul>
      </div>
    </form>
  </div>
</body>
</html>
