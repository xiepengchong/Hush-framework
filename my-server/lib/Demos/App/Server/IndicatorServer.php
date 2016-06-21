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
class IndicatorServer extends Demos_App_Server
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
	 * > 接口说明：导航列表接口
	 * <code>
	 * URL地址：indicator/naviList
	 * 提交方式：GET
	 * </code>
	 * ---------------------------------------------------------------------------------------------
	 * @title 导航列表接口
	 * @action /indicator/indicatorList
	 * @method get
	 */
	public function indicatorListAction ()
	{
		$indicatorList = array();
		$indicatorDao = $this->dao->load('Core_Indicator');
		$indicatorList = $indicatorDao->getIndicatorList();
		if ($indicatorList) {
			$this->render('10000', 'Get indicator list ok', array(
				'Indicator.list' => $indicatorList
			));
		}
		$this->render('14008', 'Get indicator list failed');
	}
}