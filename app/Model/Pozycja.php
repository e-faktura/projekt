<?php
App::uses('AppModel', 'Model');
/**
 * Pozycja Model
 *
 * @property Faktura $Faktura
 * @property Produkt $Produkt
 * @property Jednostka $Jednostka
 */
class Pozycja extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	// public $validate = array(
	// 	'faktura_id' => array(
	// 		'numeric' => array(
	// 			'rule' => array('numeric'),
	// 			//'message' => 'Your custom message here',
	// 			//'allowEmpty' => false,
	// 			//'required' => false,
	// 			//'last' => false, // Stop validation after this rule
	// 			//'on' => 'create', // Limit validation to 'create' or 'update' operations
	// 		),
	// 	),
	// 	'produkt_id' => array(
	// 		'numeric' => array(
	// 			'rule' => array('numeric'),
	// 			//'message' => 'Your custom message here',
	// 			//'allowEmpty' => false,
	// 			//'required' => false,
	// 			//'last' => false, // Stop validation after this rule
	// 			//'on' => 'create', // Limit validation to 'create' or 'update' operations
	// 		),
	// 	),
	// 	'jednostka_id' => array(
	// 		'numeric' => array(
	// 			'rule' => array('numeric'),
	// 			//'message' => 'Your custom message here',
	// 			//'allowEmpty' => false,
	// 			//'required' => false,
	// 			//'last' => false, // Stop validation after this rule
	// 			//'on' => 'create', // Limit validation to 'create' or 'update' operations
	// 		),
	// 	),
	// );

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Faktura' => array(
			'className' => 'Faktura',
			'foreignKey' => 'faktura_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Produkt' => array(
			'className' => 'Produkt',
			'foreignKey' => 'produkt_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Jednostka' => array(
			'className' => 'Jednostka',
			'foreignKey' => 'jednostka_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
