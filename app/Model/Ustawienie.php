<?php
App::uses('AppModel', 'Model');
/**
 * Ustawienie Model
 *
 */
class Ustawienie extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nazwa' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Nazwa nie może być pusta.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('isUnique'),
				'message' => 'Nazwa musi być unikalna.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	// 	'wartosc' => array(
	// 		'notempty' => array(
	// 			'rule' => array('notempty'),
	// 			//'message' => 'Your custom message here',
	// 			//'allowEmpty' => false,
	// 			//'required' => false,
	// 			//'last' => false, // Stop validation after this rule
	// 			//'on' => 'create', // Limit validation to 'create' or 'update' operations
	// 		),
	// 	),
	);
}
