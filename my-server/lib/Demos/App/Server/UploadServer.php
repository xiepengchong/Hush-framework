<?php
/**
 * Demos App
 *
 * @category   Demos
 * @package    Demos_App_Server
 * @author     James.Huang <huangjuanshi@163.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 * @version    $Id$
 */

require_once 'Demos/App/Server.php';

/**
 * @package Demos_App_Server
 */
class UploadServer extends Demos_App_Server
{
	/**
	 * ---------------------------------------------------------------------------------------------
	 * > 全局设置：
	 * <code>
	 * </code>
	 * ---------------------------------------------------------------------------------------------
	 */
	public function __init ()
	{
		parent::__init();
	}
	
	/**
	 * ---------------------------------------------------------------------------------------------
	 * > 接口说明 上传文章
	 * <code>
	 * URL地址：/upload/uploadUrl
	 * 提交方式：POST
	 * 参数#1：url，类型：STRING，必须：YES，示例：1
	 * </code>
	 * ---------------------------------------------------------------------------------------------
	 * @title 上传文章网址
	 * @action /upload/uploadUrl
	 * @params url STRING
	 * @params userId STRING
	 * @params type INT
	 * @params title STRING
	 * @method post
	 */
	public function uploadUrlAction ()
	{
		$this->doAuth();
		
		$userId = $this->param('userId');
		$url = $this->param('url');
		$type = $this->param('type');
		$title = $this->param('title');
		if($userId && $url){
			$fileDao = $this->dao->load('Core_File');
			$fileDao->create(array(
			'userId' => $userId,
			'url' => $url,
			'type' => $type,
			'title' => $title
			));
			$this->render('10000','upload file ok');
		}	
		$this->render('14006', 'upload file failed');
	}
	
		
	/**
	 * ---------------------------------------------------------------------------------------------
	 * > 接口说明 获取文章列表
	 * <code>
	 * URL地址：/upload/urlList
	 * 提交方式：get
	 * 参数#1：userId，类型：INT，必须：YES，示例：1
	 * </code>
	 * ---------------------------------------------------------------------------------------------
	 * @title 上传文章网址
	 * @action /upload/urlList
	 * @params userId INT
	 * @method get
	 */
	public function urlListAction ()
	{
		$this->doAuth();

		$userId = intval($this->param('userId'));
		$urlList = array();
		$fileDao = $this->dao->load('Core_File');
		$urlList = $fileDao->getListByCustomer($userId);
		if($urlList){
			$this->render('10000','get url list ok',array('Url.list' => $urlList));
		}
		$this->render('14008','get url list failed');
	}
	
	/**
	*@title 根据文章类型获取文章网址列表
	* @action /upload/urlListByType
	* @params type INT
	* @method get
	**/
	public function urlListByTypeAction ()
	{
		$type = intval($this->param('type'));
		$urlList = array();
		$fileDao = $this->dao->load('Core_File');
		$urlList = $fileDao->getListByType($type);
		if($urlList){
			$this->render('10000','get url list ok',array('Url.list' => $urlList));
		}
		$this->render('14008','get url list failed');
	}

	/**
	* @title 根据文章类型获取文章网址列表
	* @action /upload/urlListByTypeAndCondition
	* @params type INT
	* @params startId INT
	* @params length INT
	* @method get
	**/
	public function urlListByTypeAndConditionAction ()
	{
		$type = intval($this->param('type'));
		$startId = intval($this->param('startId'));
		$lenght = intval($this->param('length'));
		$urlList = array();
		$fileDao = $this->dao->load('Core_File');
		$urlList = $fileDao->getListByTypeAndCondition($type,$startId,$lenght);
		if($urlList){
			$this->render('10000','get url list ok',array('Url.list' => $urlList));
		}
		$this ->render('14008','get url list failed');
	}

		function file_get_contents($filename)
		{
    		$handle = fopen($filename, "rb");
	    	$contents = fread($handle, filesize($filename));
		    fclose($handle);
			return $contents;
		}
	/**
	* @title 测试联网
	* @action /upload/test
	* @params input STRING
	* @method get
	**/
	public function testAction ()
	{
		$input = $this->param('type');
		$url = 'http://www.baidu.com';
		$html = file_get_contents($url);
		if($html){
			$this->render('10000','get url is ok',$html);
		}
		$this->render('14009','get url failed');
	}

}
