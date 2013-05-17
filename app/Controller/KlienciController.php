<?php
App::uses('AppController', 'Controller');
/**
 * Klienci Controller
 *
 * @property Klient $Klient
 */
class KlienciController extends AppController {

	// public $paginate = array(
	// 	'page' => 1,
	// 	'limit' => 20,
	// 	'maxLimit' => 100,
	// 	'paramType' => 'named'
	// );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Klient->recursive = 0;
		$this->paginate = array_merge($this->paginate, $this->Klient->options);
		$this->set('klienci', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Klient->exists($id)) {
			throw new NotFoundException(__('Invalid klient'));
		}
		$options = array('conditions' => array('Klient.' . $this->Klient->primaryKey => $id));
		$this->set('klient', $this->Klient->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$this->Klient->create();
						
			if ($this->Klient->save($this->request->data)) {
				if($this->Klient->saveField('parent_id', $this->Klient->id)){
					$this->Session->setFlash('Klient został dodany');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Klient nie mógł zostać dodany. Spróbuj ponownie.');
				}
			}
		}
		// $parentKlients = $this->Klient->ParentKlient->find('list');
		$this->set(compact('parentKlients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Klient->exists($id)) {
			$this->Session->setFlash('Taki klient nie istnieje.');
			$this->redirect(array('action' => 'index'));
		}
		
		if ( $this->request->is('post') || $this->request->is('put') ) {
			
			$klient = $this->Klient->findById($id);
			$parent_id = $klient['Klient']['parent_id'];
			
			if( !empty($klient['Faktura']) ){
				unset($this->request->data['Klient']['id']);
				$this->request->data['Klient']['parent_id'] = $parent_id;
			}
			
			if ($this->Klient->save($this->request->data)) {
				$this->Session->setFlash('Dane klienta zostały zachowane.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Dane klienta nie mogły zostać zachowane. Spróbuj ponownie.');
			}
		} else {
			$options = array('conditions' => array('Klient.' . $this->Klient->primaryKey => $id));
			$this->request->data = $this->Klient->find('first', $options);
		}
		// $parentKlients = $this->Klient->ParentKlient->find('list');
		$this->set(compact('parentKlients'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Klient->id = $id;
		if (!$this->Klient->exists()) {
			$this->Session->setFlash('Taki klient nie istnieje.');
			$this->redirect(array('action' => 'index'));
		}
		
		$this->request->onlyAllow('post', 'delete');
		
		$klient = $this->Klient->findById($id);
		
		if ( $this->Klient->updateAll( array('Klient.deleted' => true), array('Klient.parent_id' => $klient['Klient']['parent_id']) )) {
			$this->Session->setFlash('Klient został usunięty');
			$this->redirect(array('action' => 'index'));
		}
		
		$this->Session->setFlash('Klient nie został usunięty');
		$this->redirect(array('action' => 'index'));
	}
}
