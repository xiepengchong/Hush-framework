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
class TransferServer extends Demos_App_Server
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
	* @title 测试联网
	* @action /transfer/test
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

	/**
	* @title 使用post发送表单
	* @action /transfer/post
	* @params name STRING
	* @params passwd STRING
	* @method post
	**/
	public function postAction ()
	{
		$name = $this->param('name');
		$passwd = $this->param('passwd');
		$input = array(
		'name' => $name,
		'pass' => $passwd);
		$params = http_build_query($input);
		$options = array(
			'http'=> array(
				'method' => 'POST',
				'header' => 'Content-type:application/x-www-form-urlencoded',
				'content' => $params,
				'timeout' => 15 * 60 
			)
		);
		$context = stream_context_create($options);
		$url = 'http://xpc_test:888/index/login';
		$html = file_get_contents($url,false,$context);
		if($html){
			$this->render('10000','post url is ok',$html);
		}
	}

}
