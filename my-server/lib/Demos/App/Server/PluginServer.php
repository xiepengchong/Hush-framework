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
class PluginServer extends Demos_App_Server
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
	 * > 接口说明：获取插件列表
	 * <code>
	 * URL地址：/plugin/pluginList
	 * 提交方式：GET
	 * </code>
	 * ---------------------------------------------------------------------------------------------
	 * @title 获取插件列表
	 * @action /plugin/pluginList
	 * @method get
	 */
	public function pluginListAction ()
	{
		$faceIdArr = range(0,0);
		// get  images
		$faceList = array();
		foreach ($faceIdArr as $faceId) {
			$faceList[] = Demo_Util_Plugin::getPluginObject("demos.app.com.plugindemo");
		}
		$this->render('10000', 'Get plugin list ok', array(
			'Plugin.list' => $faceList
		));
	}
}