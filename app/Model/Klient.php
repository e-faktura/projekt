<?php
App::uses('AppModel', 'Model');
/**
 * Klient Model
 *
 * @property Klient $ParentKlient
 * @property Faktura $Faktura
 * @property Klient $ChildKlient
 */
class Klient extends AppModel {

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
				'message' => 'Nazwa nie może być pusta.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'adres' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Adres nie może być pusty.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nip' => array(
			'notempty' => array(
				'rule' => array('ssn', null, 'pl'),
				'message' => 'Numer NIP jest niepoprawny.',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Adres e-mail jest niepoprawny.',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'telefon' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Numer telefonu nie może być pusty.',
				'allowEmpty' => true,
				'required' => false,
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
		// 'ParentKlient' => array(
		// 	'className' => 'Klient',
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
		'Faktura' => array(
			'className' => 'Faktura',
			'foreignKey' => 'klient_id',
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
		// 'ChildKlient' => array(
		// 	'className' => 'Klient',
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
	
	public function index_gr() {
		
		
		$sub_opts = array(
			'fields' => array( 'MAX(SubKlient.id) as id' ),
			'conditions' => array(
				'SubKlient.deleted !=' => 1,
			 ),
			'group' => array( 'SubKlient.parent_id')
		);

		$subquery = $this->subquery('all', $sub_opts);
		
		$options = array(
			'joins' => array(
				array(
					'table' => $subquery,
					'alias' => 'KlMax',
					'type' => 'INNER',
					'conditions' => array(
						'Klient.id = KlMax.id'
					)
				)
			),
			'conditions' => array(
				'Klient.deleted != ' => 1
			),
			'order' => array( 'Klient.nazwa' => 'ASC' ),
			// 'fields' => array( 'Klient.id', 'Klient.nazwa'),
			'recursive' => 0
		);

		$klienci = $this->find('all', $options);
		
		// pr($klienci);
		
		return $klienci;
		
	}
	
}
