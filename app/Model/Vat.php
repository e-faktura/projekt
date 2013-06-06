<?php
App::uses('AppModel', 'Model');
/**
 * Vat Model
 *
 * @property Vat $ParentVat
 * @property Produkt $Produkt
 * @property Vat $ChildVat
 */
class Vat extends AppModel {

	public $displayField = 'nazwa';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
	// 	'parent_id' => array(
	// 		'numeric' => array(
	// 			'rule' => array('numeric'),
	// 			//'message' => 'Your custom message here',
	// 			//'allowEmpty' => false,
	// 			//'required' => false,
	// 			//'last' => false, // Stop validation after this rule
	// 			//'on' => 'create', // Limit validation to 'create' or 'update' operations
	// 		),
	// 	),
		'nazwa' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Pole nie może być puste.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'wartosc' => array(
			// 'decimal' => array(
			// 	'rule' => array('decimal',2),
			// 	'message' => 'Wartość jest niepoprawna.',
			// 	//'allowEmpty' => false,
			// 	'required' => true,
			// 	//'last' => false, // Stop validation after this rule
			// 	//'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
			'mniejnizzero' => array(
				'rule' => array('range',-0.01,1.01),
				'message' => 'Wartość musi być pomiędzy 0.00 a 1.00.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		// 'ParentVat' => array(
		// 	'className' => 'Vat',
		// 	'foreignKey' => 'parent_id',
		// 	'conditions' => '',
		// 	'fields' => '',
		// 	'order' => ''
		// )
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Produkt' => array(
			'className' => 'Produkt',
			'foreignKey' => 'vat_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		// 'ChildVat' => array(
		// 	'className' => 'Vat',
		// 	'foreignKey' => 'parent_id',
		// 	'dependent' => false,
		// 	'conditions' => '',
		// 	'fields' => '',
		// 	'order' => '',
		// 	'limit' => '',
		// 	'offset' => '',
		// 	'exclusive' => '',
		// 	'finderQuery' => '',
		// 	'counterQuery' => ''
		// )
	);

}
