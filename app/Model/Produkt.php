<?php
App::uses('AppModel', 'Model');
/**
 * Produkt Model
 *
 * @property Produkt $ParentProdukt
 * @property Vat $Vat
 * @property Pozycja $Pozycja
 * @property Produkt $ChildProdukt
 */
class Produkt extends AppModel {
	
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
		'cena_netto' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Cena nie może być pusta.',
				// 'allowEmpty' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'dodatnia' => array(
				'rule' => array('comparison','>=',0),
				'message' => 'Cena musi być większa lub równa 0.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'decimal' => array(
				'rule' => array('decimal',2),
				'message' => 'Wartość jest niepoprawna.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ilosc' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ilość nie może być pusta.',
				// 'allowEmpty' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'dodatnia' => array(
				'rule' => array('comparison','>=',0),
				'message' => 'Ilość musi być większa lub równa 0.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	// 	'vat_id' => array(
	// 		'numeric' => array(
	// 			'rule' => array('numeric'),
	// 			//'message' => 'Your custom message here',
	// 			//'allowEmpty' => false,
	// 			//'required' => false,
	// 			//'last' => false, // Stop validation after this rule
	// 			//'on' => 'create', // Limit validation to 'create' or 'update' operations
	// 		),
	// 	),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $virtualFields = array(
		'cena_brutto' => 'ROUND((Produkt.cena_netto * Vat.wartosc) + Produkt.cena_netto, 2)'
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		// 'ParentProdukt' => array(
		// 	'className' => 'Produkt',
		// 	'foreignKey' => 'parent_id',
		// 	'conditions' => array('ParentProdukt.id !=' => 0),
		// 	'fields' => '',
		// 	'order' => ''
		// ),
		'Vat' => array(
			'className' => 'Vat',
			'foreignKey' => 'vat_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Pozycja' => array(
			'className' => 'Pozycja',
			'foreignKey' => 'produkt_id',
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
		// 'ChildProdukt' => array(
		// 	'className' => 'Produkt',
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
	
	// public function __construct($id = false, $table = null, $ds = null) {
	// 	parent::__construct($id, $table, $ds);
	// 	$this->virtualFields['cena_brutto'] = sprintf('ROUND((%s.cena_netto * Vat.wartosc) + %s.cena_netto, 2)', $this->alias, $this->alias);
	// }
}
