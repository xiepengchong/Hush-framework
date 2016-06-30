<?php
/**
 * Demos Dao
 *
 * @category   Demos
 * @package    Demos_Dao_Core
 * @author     James.Huang <shagoo@gmail.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 * @version    $Id$
 */

require_once 'Demos/Dao/Core.php';

/**
 * @package Demos_Dao_Core
 */
class Core_File extends Demos_Dao_Core
{
	/**
	 * @static
	 */
	const TABLE_NAME = 'file';
	
	/**
	 * @static
	 */
	const TABLE_PRIM = 'id';
	
	/**
	 * Initialize
	 */
	public function __init () 
	{
		$this->t1 = self::TABLE_NAME;
		$this->k1 = self::TABLE_PRIM;
		
		$this->_bindTable($this->t1, $this->k1);
	}

	public function getListByCustomer($customer_id){
        $list = array();
		$sql = $this->select()
			->from($this->t1,'*')
			->where("{$this->t1}.userId = ?",$customer_id);
		$res = $this->dbr()->fetchAll($sql);
		if($res){
			foreach($res as $row){
			 $url = array(
			 	'title' => $row['title'],
			 	'url' => $row['url']
			 );
				array_push($list,$url);
			}
		}
		return $list;
	}

	public function getListByType($type){
		$list = array();
		$sql = $this->select()
				->from($this->t1,'*')
				->where("{$this->t1}.type = ?",$type);
		$res = $this->dbr()->fetchAll($sql);
		if($res){
			foreach($res as $row){
				$url = array(
					'title' => $row['title'],
					'url' => $row['url']
				);
				array_push($list,$url);
			}
		}
		return $list;
	}
}
