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
	 * @method post
	 */
	public function uploadUrlAction ()
	{
		$this->doAuth();
		
		$userId = $this->param('userId');
		$url = intval($this->param('url'));
	    if($userId && $url){
			$fileDao = $this->dao->load('Core_File');
			$fileDao->create(array(
			'userId' => $userId,
			'url' => $url
			));
			$this->render('10000','upload file ok')
		}	
		$this->render('10000', 'upload file failed');
	}
}
