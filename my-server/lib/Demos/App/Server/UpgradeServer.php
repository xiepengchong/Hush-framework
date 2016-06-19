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
require_once 'Demos/Util/plugin.php';

/**
 * @package Demos_App_Server
 */
class UpgradeServer extends Demos_App_Server
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
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// service api methods
	
	/**
	 * ---------------------------------------------------------------------------------------------
	 * > 接口说明：获取版本信息
	 * <code>
	 * URL地址：/upgrade/checkversion
	 * 提交方式：POST
	 * 参数#1：ver，类型：STRING，必须：YES
	 * </code>
	 * ---------------------------------------------------------------------------------------------
	 * @title 获取版本信息
	 * @action /upgrade/checkUpgrade
	 * @params ver '' STRING
	 * @method post
	 */
	public function checkUpgradeAction ()
	{
		$ver = $this->param('ver');
 		$versionDao = $this->dao->load('Core_Version');
		$version = $versionDao->getVersion($ver);
		$this->render('10000', 'version ok', array(
				'Version' => $version
			));
	}
}