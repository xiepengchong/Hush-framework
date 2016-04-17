<?php
/*
 * Created on 2016年4月17日
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 require_once 'Demos/App/Server.php';
 require_once 'Demos/Util/plugin.php';
 
 
class PluginServer extends Demos_App_Server
{
	public function pluginListAction(){
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
?>
