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
class Core_Indicator extends Demos_Dao_Core
{
	/**
	 * @static
	 */
	const TABLE_NAME = 'indicator';
	
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
	
	public function getIndicatorList(){
		$list = array();
		$sql = $this->select()
			->from($this->t1, '*');
		
		$res = $this->dbr()->fetchAll($sql);
		if ($res) {
			foreach ($res as $row) {
				$indicator = array(
					'id'		=> $row['id'],
					'name'	=> $row['name'],
					'type' => $row['type'],
				);
				array_push($list, $indicator);
			}
		}
		return $list;
	}
}