<!-- <a href="<?php //echo Yii::app()->createUrl('site/delete',array('id'=>24)); ?>">delete</a> -->	
<!-- <form enctype="multipart/form-data" method="post" action="<?php //echo Yii::app()->createUrl('site/upload'); ?>">
	<input name="file" type="file" />
	<input name="submit" type="submit" />
</form>  -->
<form enctype="multipart/form-data" method="post" action="<?php echo Yii::app()->createUrl('site/rename',array('id'=>23)); ?>">
	<input type="text" name="new_name" value="幽灵客栈.txt" />
	<input type="submit" name="submit" />
</form>