<?php
/*
 * Created on 2016年4月17日
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class Demo_Util_Plugin{
 		/**
	 * 获取某个插件的URL地址
	 * @param String $id
	 */
	public static function getPluginUrl ($id) 
	{
		$facePath = __HOST_WEBSITE . '/plugin';
		return $facePath . '/' . $id . '.apk';
	}
	
	/**
	 * 获取插件的对象
	 * @param String $id
	 */
	public static function getPluginObject ($id) 
	{
		return array(
			'id' => $id,
			'url' => self::getPluginUrl($id),
			'type' => 'apk',
		);
	}
 }
 
?>
