<?php

class SiteController extends Controller
{
	public $defaultAction = 'homePage';
	public $layout='//layouts/empty';
	public $action = '';
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
 			//'postOnly', // we only allow deletion via POST request
		);
	}

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('login'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('logout','test','homePage','classifyDoc','classifyMusic','classifyPic','classifyVideo','classifyOthers','transportationUpload','transportationDownload','transportationYun','set',
						'upload','download','rename','copy','move','delete'
					),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionHomePage($f=0)
	{
		if($f == 0){
			//$model = FileRelation::model()->findBySql("select rel.file_id,file.file_name as name,file.create_time from file_relation as rel inner join file on rel.file_id=file.file_id where user_id=1 and type=0 and locate=0 union select rel.file_id,folder.folder_name as name,folder.create_time from file_relation as rel inner join folder on rel.file_id=folder.folder_id where user_id=1 and type=1 and locate=0 order by create_time desc;");
			$folder = Folder::model()->findAllBySql("select folder.folder_id,folder.folder_name,folder.create_time from file_relation as rel inner join folder on rel.file_id=folder.folder_id where user_id=".Yii::app()->user->id." and type=1 and locate=0 order by create_time desc");
			//$file = File::model()->findAllBySql("select file.file_id,file.file_name,file.file_size,file.create_time from file_relation as rel inner join file on rel.file_id=file.file_id where user_id=".Yii::app()->user->id." and type=0 and locate=0 order by create_time desc");
			$file = File::model()->findAllBySql("select r.file_relation_id,f.file_id,f.file_name,f.file_size,s.file_type,f.create_time from (file as f  left join file_relation as r on f.file_id=r.file_id) left join file_sort as s on f.file_id=s.file_id where r.user_id=".Yii::app()->user->id." and r.type=0 and r.locate=0 order by f.create_time desc");
		}else{
			$folder = Folder::model()->findAllBySql("select folder.folder_id,folder.folder_name,folder.create_time from file_relation as rel inner join folder on rel.file_id=folder.folder_id where user_id=".Yii::app()->user->id." and type=1 and locate=$f order by create_time desc");
			$file = File::model()->findAllBySql("select r.file_relation_id,f.file_id,f.file_name,f.file_size,s.file_type,f.create_time from (file as f  left join file_relation as r on f.file_id=r.file_id) left join file_sort as s on f.file_id=s.file_id where r.user_id=".Yii::app()->user->id." and r.type=0 and r.locate=$f order by f.create_time desc");
		}
		$this->render('homePage',array(
			'folder'=>$folder,
			'file'=>$file,
		));
	}

	/**
	 * 
	 * @return [type] [description]
	 */
	public function actionClassifyDoc()
	{
		$file = File::model()->findAllBySql("select file.file_id,file.file_name,file.file_size,file.create_time from file_sort inner join file on file_sort.file_id=file.file_id where user_id=".Yii::app()->user->id." and  file_type=".File::$doc." order by create_time desc");
		$this->render('classify_doc',array(
			'file'=>$file,
		));
	}

	/**
	 * 
	 * @return [type] [description]
	 */
	public function actionClassifyPic()
	{
		$file = File::model()->findAllBySql("select file.file_id,file.file_name,file.file_size,file.create_time from file_sort inner join file on file_sort.file_id=file.file_id where user_id=".Yii::app()->user->id." and  file_type=".File::$pic." order by create_time desc");
		$this->render('classify_pic',array(
			'file'=>$file,
		));
	}

	/**
	 * 
	 * @return [type] [description]
	 */
	public function actionClassifyMusic()
	{
		$file = File::model()->findAllBySql("select file.file_id,file.file_name,file.file_size,file.create_time from file_sort inner join file on file_sort.file_id=file.file_id where user_id=".Yii::app()->user->id." and  file_type=".File::$music." order by create_time desc");
		$this->render('classify_music',array(
			'file'=>$file,
		));
	}

	/**
	 * 
	 * @return [type] [description]
	 */
	public function actionClassifyOthers()
	{
		$file = File::model()->findAllBySql("select file.file_id,file.file_name,file.file_size,file.create_time from file_sort inner join file on file_sort.file_id=file.file_id where user_id=".Yii::app()->user->id." and  file_type=".File::$others." order by create_time desc");
		$this->render('classify_others',array(
			'file'=>$file,
		));
	}

	/**
	 * 
	 * @return [type] [description]
	 */
	public function actionClassifyVideo()
	{
		$file = File::model()->findAllBySql("select file.file_id,file.file_name,file.file_size,file.create_time from file_sort inner join file on file_sort.file_id=file.file_id where user_id=".Yii::app()->user->id." and  file_type=".File::$video." order by create_time desc");
		$this->render('classify_video',array(
			'file'=>$file,
		));
	}
	
	/**
	 * 
	 * @return [type] [description]
	 */
	public function actionTransportationUpload()
	{
		$file = File::model()->findAllBySql("select f.file_id,f.file_name,f.file_size,s.file_type,u.create_time from (file as f  left join upload as u on f.file_id=u.file_id) left join file_sort as s on f.file_id=s.file_id where u.user_id=".Yii::app()->user->id." order by u.create_time desc");
		//$file = File::model()->findAllBySql("select file.file_id,file.file_name,file.file_size,upload.create_time from upload inner join file on upload.file_id=file.file_id where user_id=".Yii::app()->user->id." order by create_time desc");
		$this->render('transportationUpload',array(
			'file'=>$file,
		));
	}
	
	/**
	 * 
	 * @return [type] [description]
	 */
	public function actionTransportationDownload()
	{
		$file = File::model()->findAllBySql("select f.file_id,f.file_name,f.file_size,s.file_type,d.create_time from (file as f  left join download as d on f.file_id=d.file_id) left join file_sort as s on f.file_id=s.file_id where d.user_id=".Yii::app()->user->id." order by d.create_time desc");
		//$file = File::model()->findAllBySql("select file.file_id,file.file_name,file.file_size,download.create_time from download inner join file on download.file_id=file.file_id where user_id=".Yii::app()->user->id." order by create_time desc");
		$this->render('transportationDownload',array(
			'file'=>$file,
		));
	}
	
	/**
	 * 
	 * @return [type] [description]
	 */
	public function actionTransportationYun()
	{
		$this->render('transportationYun');
	}	

	/**
	 * 
	 * @return [type] [description]
	 */
	public function actionSet()
	{
		$volume = Volume::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
		$this->render('set',array(
			'volume'=>$volume->volume_used,
		));
	}

/****************************************************************************      功能函数       ******************************************************************************************/
/****************************************************************************      功能函数       ******************************************************************************************/
/****************************************************************************      功能函数       ******************************************************************************************/
/****************************************************************************      功能函数       ******************************************************************************************/
/****************************************************************************      功能函数       ******************************************************************************************/
/****************************************************************************      功能函数       ******************************************************************************************/
/****************************************************************************      功能函数       ******************************************************************************************/

	/**
	 * 用于测试
	 * @return [type] [description]
	 */
	public function actionTest()
	{
		$this->render('test',array(
		//	'volume'=>$volume->volume_used,
		));
	}	

	/**
	 * 上传文件
	 */
	public function actionUpload()
	{
		//var_dump($_POST);die;
		$file = new File;	
		$fileRelation = new FileRelation;
		$fileSort = new FileSort;
		$fileVolume = Volume::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
		$fileUpload = new Upload;
		$file->changeName();
		if($file->moveFile()){
			$file->save();
			
			$fileRelation->user_id = Yii::app()->user->id;
			$fileRelation->file_id = $file->file_id;
			$fileRelation->save();
			
			$fileSort->user_id = Yii::app()->user->id;
			$fileSort->file_id = $file->file_id;
			$fileSort->file_type = Common::getFileType($file->file_type);
			$fileSort->save();
			
			$fileVolume->volume_used += $file->file_size;
			$fileVolume->save();
			
			$fileUpload->user_id = Yii::app()->user->id;
			$fileUpload->file_id = $file->file_id;
			$fileUpload->save();
			$this->redirect(Yii::app()->user->returnUrl);
		}else{
			echo "<script type='text/javascript'>	alert('Error! ');history.go(-1);	</script>";
		}
	}

	/**
	 * 下载
	 * @return [type] [description]
	 */
	public function actionDownload($id)
	{
		//$file = File::model()->findBySql("select * from file_relation inner join file on file_relation.file_id=file.file_id where user_id=".Yii::app()->user->id." and file.file_id=".$id);
		$file = File::model()->findBySql("select * from file where file_id=(select file_id from file_relation where user_id=".Yii::app()->user->id." and file_relation_id=".$id.")");
		//var_dump($file);die;
		if($file != null){
			$file_name = $file->file_name;
			$file_path = Yii::app()->basePath."/../files/".$file->file_path;
			if(!file_exists($file_path))
			{	
				echo '对不起你要下载的文件不存在';
				echo $file->file_path;
			    	return false;
			}
			$file_size = filesize($file_path);
			
			header("Content-type: application/octet-stream;charset=gbk");
			header("Accept-Ranges: bytes");
			header("Accept-Length: $file_size");
			header("Content-Disposition: attachment; filename=".$file_name);
			
			$fp = fopen($file_path,"r");
			$buffer_size = 1024;
			$cur_pos = 0;
			
			while(!feof($fp)&&$file_size-$cur_pos>$buffer_size)
			{
			    $buffer = fread($fp,$buffer_size);
			    echo $buffer;
			    $cur_pos += $buffer_size;
			}
			
			$buffer = fread($fp,$file_size-$cur_pos);
			echo $buffer;
			fclose($fp);
			return true;
		}else{
		         echo "<script type='text/javascript'>	alert('对不起,没有可下载的文件! ');history.go(-1);	</script>";
		}
	}
	
	/**
	* Deletes a particular model.
	* @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		//$file = File::model()->findBySql("select * from file_relation inner join file on file_relation.file_id=file.file_id where user_id=".Yii::app()->user->id." and file.file_id=".$id);
		$relation = FileRelation::model()->findByPk($id);
		$file = File::model()->findBySql("select * from file where file_id=(select file_id from file_relation where user_id=".Yii::app()->user->id." and file_relation_id=".$id.")");
		if($file != null)
		{
			$file->delFile();
			$file->delete();
			$relation->delete();
			$fileVolume = Volume::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
			$fileVolume->volume_used -= $file->file_size;
			$fileVolume->save();
			$this->redirect(Yii::app()->user->returnUrl);
		}else{
			echo "<script type='text/javascript'>	alert('Error! ');history.go(-1);	</script>";
		}
	}

	/**
	* Updates a particular model.
	* @param integer $id the ID of the model to be updated
	 */
	public function actionRename()
	{
		if(isset($_POST['id']))
			$id = $_POST['id'];
		else return;
		//$file = File::model()->findBySql("select * from file_relation inner join file on file_relation.file_id=file.file_id where user_id=".Yii::app()->user->id." and file.file_id=".$id);
		$file = File::model()->findBySql("select * from file where file_id=(select file_id from file_relation where user_id=".Yii::app()->user->id." and file_relation_id=".$id.")");
		if($file != null)
		{
			$file->file_name = $_POST['new_name'];
			$file->save();
			echo 'ture';
		}else{
			echo 'false';
		}
	}

	/**
	 * 复制
	 * @return [type] [description]
	 */
	public function actionCopy($id)
	{
		$file = File::model()->findBySql("select file_id from file_relation where user_id=".Yii::app()->user->id." and file_relation_id=".$id)->file_id;
		if($file)
			echo "<script type='text/javascript'>	alert('Wrong file! ');history.go(-1);	</script>";
		if(isset($_POST['folder']))
		{
			$relation = new FileRelation;
			$relation->user_id = Yii::app()->user->id;
			$relation->file_id = File::model()->findBySql("select file_id from file_relation where file_relation_id=".$id)->file_id;
			$type = 0;
			$relation->locate = $_POST['folder'];
			if($relation->save())
				$this->redirect(Yii::app()->createUrl('site/homePage',array('f'=>$_POST['folder'])));
			else
				echo "<script type='text/javascript'>	alert('Error! ');history.go(-1);	</script>";
		}
		$model = Folder::model()->findAllBySql("select * from folder where folder_id in (select file_id from file_relation where type=1 and locate=(select locate from file_relation where file_relation_id=$id))");
		$this->render('copyAndMove', array(
			'model'=>$model,
		));
	}

	/**
	 * 移动
	 * @return [type] [description]
	 */
	public function actionMove($id)
	{
		$this->action = 'move';
		$file = File::model()->findBySql("select file_id from file_relation where user_id=".Yii::app()->user->id." and file_relation_id=".$id)->file_id;
		if($file)
			echo "<script type='text/javascript'>	alert('Wrong file! ');history.go(-1);	</script>";
		if(isset($_POST['folder']))
		{
			$relation = new FileRelation;
			$relation->user_id = Yii::app()->user->id;
			$relation->file_id = File::model()->findBySql("select file_id from file_relation where file_relation_id=".$id)->file_id;
			$type = 0;
			$relation->locate = $_POST['folder'];
			if($relation->save()){
				FileRelation::model()->findByPk($id)->delete();
				$this->redirect(Yii::app()->createUrl('site/homePage',array('f'=>$_POST['folder'])));
			}else
				echo "<script type='text/javascript'>	alert('Error! ');history.go(-1);	</script>";
		}
		$model = Folder::model()->findAllBySql("select * from folder where folder id in (select file_id from file_relation where type=1 and locate=(select locate from file_relation where file_relation_id=$id))");
		$this->render('copyAndMove', array(
			'model'=>$model,
		));
	}
}