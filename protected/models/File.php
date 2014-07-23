<?php

/**
 * This is the model class for table "file".
 *
 * The followings are the available columns in table 'file':
 * @property integer $file_id
 * @property string $file_name
 * @property string $file_path
 * @property integer $file_size
 * @property string $create_time
 */
class File extends CActiveRecord
{
	public static $doc=1;
	public static $pic=2;
	public static $music=3;
	public static $video=4;
	public static $others=5;

	protected $file;   	//保存上传文件信息 CUploadedFile类
	public $file_type;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'file';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('file_name, file_path, file_size', 'required'),
			array('file_size', 'numerical', 'integerOnly'=>true),
			array('file_name, file_path', 'length', 'max'=>100),
			array('create_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('file_id, file_name, file_path, file_size, create_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'file_id' => 'File',
			'file_name' => 'File Name',
			'file_path' => 'File Path',
			'file_size' => 'File Size',
			'create_time' => 'Create Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('file_id',$this->file_id);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('file_path',$this->file_path,true);
		$criteria->compare('file_size',$this->file_size);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return File the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * before save()
	 */
	public function beforeSave()
	{
		if(parent::beforeSave())
		{  	
			$this->create_time = date('Y-m-d H:i:s'); 
			return true;
		}else{
			return false;
		} 			
	}

	/**
	* 为上传文件命名
	* @param $myAttribute 上传文件的字段名
	 */
	public function changeName()
	{
		$this->file = CUploadedFile::getInstanceByName('file');  //file为字段，也是input标签的name
		$suffix = $this->file->getExtensionName();		//获取文件后缀名
		$this->file_type = $suffix;
		($suffix != null) ? $suffix ='.'.$suffix : '';
		$this->file_name = $this->file->getName();
		$this->file_size = $this->file->getSize();
		$this->file_path = Yii::app()->user->id.'_'.time().''.$suffix;            //$this->fileName 在下面moveFile方法中要用
	}
	/**
	* 移动上传文件至指定路径
	* $dir 格式示例：  movefile('/var/www/file/')
	* 不传参数默认为 files目录
	 */
	public function moveFile($dir='')
	{
		if(is_object($this->file) && get_class($this->file)==='CUploadedFile'){
			if($dir=='') 
				$dir = Yii::app()->basePath."/../files/".$this->file_path;
			else 
				$dir .= $this->file_path;
			$this->file->saveAs($dir);
			chmod($dir, 0776);
			return true;
		}else{
			return false;
		}
	}
	/**
	* 删除文件
	* $file 文件名
	* $dir 文件所在路径名
	 */
	public function delFile()
	{
		$dir = Yii::app()->basePath."/../files/".$this->file_path;
		if(file_exists($dir)){
			unlink($dir);
		}
	}

}
