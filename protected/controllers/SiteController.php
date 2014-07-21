<?php

class SiteController extends Controller
{
	public $defaultAction = 'homePage';
	public $layout='//layouts/empty';
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
	public function actionHomePage()
	{
		//$model = FileRelation::model()->findBySql("select rel.file_id,file.file_name as name,file.create_time from file_relation as rel inner join file on rel.file_id=file.file_id where user_id=1 and type=0 and locate=0 union select rel.file_id,folder.folder_name as name,folder.create_time from file_relation as rel inner join folder on rel.file_id=folder.folder_id where user_id=1 and type=1 and locate=0 order by create_time desc;");
		$folder = Folder::model()->findAllBySql("select folder.folder_id,folder.folder_name,folder.create_time from file_relation as rel inner join folder on rel.file_id=folder.folder_id where user_id=".Yii::app()->user->id." and type=1 and locate=0 order by create_time desc");
		//$file = File::model()->findAllBySql("select file.file_id,file.file_name,file.file_size,file.create_time from file_relation as rel inner join file on rel.file_id=file.file_id where user_id=".Yii::app()->user->id." and type=0 and locate=0 order by create_time desc");
		$file = File::model()->findAllBySql("select f.file_id,f.file_name,f.file_size,s.file_type,f.create_time from (file as f  left join file_relation as r on f.file_id=r.file_id) left join file_sort as s on f.file_id=s.file_id where r.user_id=".Yii::app()->user->id." and r.type=0 and r.locate=0 order by f.create_time desc");

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

}