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
  <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/Sites/css/themes/set.css">
  <script src="<?php echo Yii::app()->baseUrl; ?>/Sites/js/jquery.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.js"></script>
  <script src="<?php echo Yii::app()->baseUrl; ?>/Sites/js/min_height.js"></script>
  <script src="<?php echo Yii::app()->baseUrl; ?>/Sites/js/taphold.js"></script>
  <script src="<?php echo Yii::app()->baseUrl; ?>/Sites/js/capacity.js"></script>
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

<div data-role="page" id="set" class="allPage">
  <div data-role="header" data-position="fixed" id="header">
    <h1>设置</h1>
  </div>
<!--header ends here  -->

<!-- mainContent starts here  -->
  <div data-role="content" id="mainContent">
    <div class="top">
      <div class="account clearfix">
        <span class="account_left">华为网盘账号：<?php echo Yii::app()->user->name; ?></span>
        <a data-ajax="false" href="<?php echo Yii::app()->createUrl('site/logout'); ?>" class="account_right">注销</a>
      </div>
      <div class="capacity">
        <div class="showInWord">
          容量（<span class="used"><?php echo Common::volumeUsed($volume); ?></span>/<span class="total">2048</span>G） <!--用JS控制）-->
        </div>
        <div class="showInImg">
          <div class="blue">
          </div>
        </div>
      </div>
    </div>
    <div >
    <ul data-role="listview" id="shezhi">
      <li><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/set_icon1.png" width="20" height="24" >仅WiFi环境下上传/下载</a></li>
      <li><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/set_icon2.png" width="16" height="16">检查新版本</a></li>
      <li><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/set_icon3.png" width="16" height="16">默认下载位置</a></li>
      <li><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/set_icon4.png" width="16" height="16">用户反馈</a></li>
      <li id="lastSet"><a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/set_icon5.png" width="16" height="16">关于</a></li>
    <ul>
  </div>
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
</html>
