<?php
/**
 * 本类存放项目中公用的方法函数，所有方法为静态方法
 */
class Common {
	protected function __construct(){
		//不允许new操作
	}
	
	/**
	 *  截取时间 字符串
	 * @param  [type]  $time   [description]
	 */
	public static function cutDateTime($time, $length=10){
		return substr($time, 0, $length);
	}

	/**
	 * 转换文件大小格式
	 */
	public static function fileSize($size){
		if($size<1024)
			return $size.'B';
		elseif($size<10240)
			return round($size/1024,1).'KB';
		elseif($size<1048576)
			return round($size/1024).'KB';
		elseif($size<1048576)
			return round($size/1048576,1).'M';
		elseif($size<1073741824)
			return round($size/1048576).'M';
		else	
			return round($size/1073741824,2).'G';
	}

	/**
	 *  转换空间使用量格式
	 */
	public static function volumeUsed($volume){
		/*if($volume<1048576)
			return round($volume/1024,1).'M';
		else*/
			return round($volume/1073741824);
	}

	/**
	 * 获取不同文件显示图片路径
	 */
	public static function getPicPath($type){
		$path = Yii::app()->baseUrl.'/Sites/images/homePage1_';
		switch($type){
			case 1: $path .='doc';break;
			case 2: $path .='pic';break;
			case 3: $path .='music';break;
			case 4: $path .='video';break;
			case 5: $path .='others';break;
		}
		$path .= '.png';
		return $path;
	}

	/**
	 * 获取文件类型
	 * @return [type] [description]
	 */
	public static function getFileType($type)
	{
		$doc = array('txt','doc','xls','xml','html','htm','xlt','csv','xlw','wk4','wk3','wk1','wd1','wks','wq1. slk','sla','ppt','pps','ppa','dot','rft','wps','doxc','docx','pdf');
		$pic = array('bmp','jpg','png','tiff','gif','pcx','tga','exif','fpx','svg','psd','cdr','pcd','dxf','ufo','eps','ai','raw');
		$music = array('mp3','ogg','wmv','wma','aiff','midi','vqf','aac','flac','tak','tta','wv');
		$video = array('avi','mp4','rmvb','mov','asf','navi','3gp','mkv','divx','flv');
		if(in_array($type, $doc))
			$result = 1;
		elseif(in_array($type, $pic))
			$result = 2;
		elseif(in_array($type, $music))
			$result = 3;
		elseif(in_array($type, $video))
			$result = 4;
		else
			$result = 5;
		return $result;
	}

	/**
	 * [getFolderName description]
	 * @return [type] [description]
	 */
	public static function getFolderName($id)
	{
		return Folder::model()->findByPk($id)->folder_name;
	}

}
?>