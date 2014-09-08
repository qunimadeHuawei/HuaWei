<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content=" initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/Sites/css/reset.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/Sites/css/themes/header.min.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/Sites/css/themes/jquery.mobile.icons.min.css">
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/Sites/css/jquery.mobile.structure-1.4.3.min.css" />
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

<div data-role="page" id="logIn" class="allPage">
  <div data-role="header" data-position="fixed" id="header">
    <a href="#" data-rel="back" data-role="none" style="position:absolute;top:.8em;left:3em;"><img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/return2.png" width="48" height="40"></a>
    <h1>移动文件</h1>
    <a data-transition="slideup" href="#newFolder" data-transition="slide" class="registered" data-transition="slideup" data-mini="true" data-inline="true" data-role="none" data-transition="slide">新建..</a>
  </div>
<!--header ends here  -->

<!-- mainContent starts here  -->
  <div data-role="content" id="mainContent">
    <form action="<?php $this->action == 'move' ? $url=Yii::app()->createUrl('site/move') : $url=Yii::app()->createUrl('site/copy'); echo $url.'/'.$file; ?>" method="post" id="hideSubmit">
      <?php foreach($folder as $tmp_folder){?>
        <input type="radio" name="folder" value=<?php echo $tmp_folder->folder_id?>><img src="<?php echo Yii::app()->baseUrl; ?>/Sites/images/homePage1_floder.png" width="38" height="42"><?php echo $tmp_folder['folder_name']; ?>
      <?php }?>
  </div>
<!--  mainContent ends here   -->
  <div data-role="footer" data-position="fixed" id="footer">
    <div data-role="navbar">
      <ul>
        <li><a href="#" data-rel="back"><input type="button" data-inline="true" value="取消"></a></li>
        <li><a data-ajax="false" id="queding"><input type="button" data-inline="true" value="确定"></a></li>
      </ul>
    </div>
  </div>
  </form>
</div> 

 <!--```````````````````````````````````````````````````````````````````````````````````````````
                   点击新建 时弹出的新建文件夹页面
  `````````````````````````````````````````````````````````````````````````````````````````-->
<div data-role="page" id="newFolder" class="allPage">
    <form id="hideSubmit1" action="<?php echo Yii::app()->createUrl('site/newFolder').'/'.$file; ?>" method="post">
      <div data-role="header">
        <h2 id="chongmingming">新建文件夹</h2>
      </div>
      <div data-role="content">
        <input type="text" name="folder_name" id="chongmm" placeholder="请输入文件夹名"/>
        <input type="hidden" name="relation" value='' />
      </div>
      <div data-role="footer"> 
        <div data-role="navbar">
          <ul>
            <li><a href="#" data-rel="back"><input type="button" data-inline="true" value="取消"></a></li>
            <li><a href="#" id="queding1"><input type="button" data-inline="true" value="确定"></a></li>
          </ul>
      </div>
    </form>
  </div>
</body>
</html>