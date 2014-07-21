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
			return $size.'k';
		elseif($size<1048576)
			return round($size/1024,1).'M';
		else
			return round($size/1048576,2).'G';
	}

	/**
	 *  转换空间使用量格式
	 */
	public static function volumeUsed($volume){
		/*if($volume<1048576)
			return round($volume/1024,1).'M';
		else*/
			return round($volume/1048576);
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

}
?>