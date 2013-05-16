<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');
App::uses('PlValidation','Localized.Validation');
/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	
	/**
	 * Generates a SQL subquery snippet to be used in your actual query.
	 * Your subquery snippet needs to return a single value or flat array of values.
	 *
	 * Example:
	 *
	 *   $this->Model->find('first', array(
	 *     'conditions' => array('NOT' => array('some_id' => $this->Model->subquery(...)))
	 *   ))
	 *
	 * Note: You might have to set `autoFields` to false in order to retrieve only the fields you request:
	 * http://book.cakephp.org/2.0/en/core-libraries/behaviors/containable.html#containablebehavior-options
	 *
	 * @param string $type The type of the query ('count'/'all'/'first' - first only works with some mysql versions)
	 * @param array $options The options array
	 * @param string $alias You can use this intead of $options['alias'] if you want
	 * @param bool $parenthesise Add parenthesis before and after
	 * @return string $result sql snippet of the query to run
	 * @modified Mark Scherer (cake2.x ready and improvements)
	 * @link http://bakery.cakephp.org/articles/lucaswxp/2011/02/11/easy_and_simple_subquery_cakephp
	 * 2011-07-05 ms
	 */
	public function subquery($type, $options = array(), $alias = null, $parenthesise = true) {
		if ($alias === null) {
			$alias = 'Sub' . $this->alias . '';
		}

		$fields = array($alias . '.id');
		$limit = null;
		switch ($type) {
			case 'count':
				$fields = array('COUNT(*)');
				break;
			case 'first':
				$limit = 1;
				break;
		}

		$dbo = $this->getDataSource();

		$default = array(
			'fields' => $fields,
			'table' => $dbo->fullTableName($this),
			'alias' => $alias,
			'limit' => $limit,
			'offset' => null,
			'joins' => array(),
			'conditions' => array(),
			'order' => null,
			'group' => null
		);
		$params = array_merge($default, $options);
		$subQuery = trim($dbo->buildStatement($params, $this));
		if ($parenthesise) {
			$subQuery = '(' . $subQuery . ')';
		}
		return $subQuery;
	}
	
}
