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
    <h1>账号登录</h1>
    <a href="<?php echo Yii::app()->createUrl('site/register');?>" data-transition="slide" class="registered" data-transition="slideup" data-mini="true" data-inline="true" data-role="none" data-transition="slide">注册</a>
  </div>
<!--header ends here  -->

<!-- mainContent starts here  -->
  <div data-role="content" id="mainContent">
<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'login-form',
  'enableClientValidation'=>true,
  'clientOptions'=>array(
    'validateOnSubmit'=>true,
  ),
)); ?>
      <div data-role="fieldcontain">
        <?php echo $form->error($model,'password',array('style'=>'color:red')); ?>
        <label for="registered">账号</label>
        <input type="text" name="LoginForm[username]" id="registered" placeholder="用户名/邮箱">
        <br>
        <label for="password">密码</label>
        <input type="password" name="LoginForm[password]" id="paddword">
      </div>
      <input id="submit" type="submit" value="登录" class="login">
<?php $this->endWidget(); ?>
  </div>
<!--  mainContent ends here   -->

</div> 


<div id="register" class="allPage" data-role="page">
  <div data-role="header" data-position="fixed" id="header">
    <h1>注册账号</h1>
    <a href="#" data-rel="back" class="registered" data-transition="slideup" data-mini="true" data-inline="true" data-role="none" data-transition="slide">返回</a>
  </div>
<!--header ends here  -->
</div> 
</body>
</html>