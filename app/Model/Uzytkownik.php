<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Uzytkownik Model
 *
 * @property Rola $Rola
 */
class Uzytkownik extends AppModel {

	public $displayField = 'nazwa';
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
	// 	'rola_id' => array(
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
		'login' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Login nie może być pusty.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'haslo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Hasło nie może być puste.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Email nie może być pusty.',
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
		'Rola' => array(
			'className' => 'Rola',
			'foreignKey' => 'rola_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $actsAs = array('Acl' => array('type' => 'requester'));

	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['Uzytkownik']['rola_id'])) {
			$rolaId = $this->data['Uzytkownik']['rola_id'];
		} else {
			$rolaId = $this->field('rola_id');
		}
		if (!$rolaId) {
			return null;
		} else {
			return array('Rola' => array('id' => $rolaId));
		}
	}
	
	public function bindNode($uzytkownik) {
		return array('model' => 'Rola', 'foreign_key' => $uzytkownik['Uzytkownik']['rola_id']);
	}
	
	public function beforeSave($options = array()) {
		if (isset($this->data['Uzytkownik']['haslo'])) {
			$this->data['Uzytkownik']['haslo'] = AuthComponent::password($this->data['Uzytkownik']['haslo']);
		}
		return true;
	}
	
}
