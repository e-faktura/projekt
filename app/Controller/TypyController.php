<?php
App::uses('AppController', 'Controller');
/**
 * Typy Controller
 *
 * @property Typ $Typ
 */
class TypyController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Typ->recursive = 0;
		$this->paginate = array_merge($this->paginate, $this->Typ->options);
		$this->set('typy', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Typ->exists($id)) {
			throw new NotFoundException(__('Invalid typ'));
		}
		$options = array('conditions' => array('Typ.' . $this->Typ->primaryKey => $id));
		$this->set('typ', $this->Typ->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Typ->create();
			if ($this->Typ->save($this->request->data)) {
				if($this->Typ->saveField('parent_id', $this->Typ->id)){
					$this->Session->setFlash('Typ został dodany');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Typ nie mógł zostać dodany. Spróbuj ponownie.');
				}
			}
		}
		// $parentTyps = $this->Typ->ParentTyp->find('list');
		$this->set(compact('parentTyps'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Typ->exists($id)) {
			$this->Session->setFlash('Taki typ nie istnieje.');
			$this->redirect(array('action' => 'index'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$typ = $this->Typ->findById($id);
			$parent_id = $typ['Typ']['parent_id'];
			
			if( !empty($typ['Faktura']) ){
				unset($this->request->data['Typ']['id']);
				$this->request->data['Typ']['parent_id'] = $parent_id;
			}
			
			if ($this->Typ->save($this->request->data)) {
				$this->Session->setFlash('Typ został zapisany');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Typ nie mógł zostać dodany. Spróbuj ponownie.');
			}
		} else {
			$options = array('conditions' => array('Typ.' . $this->Typ->primaryKey => $id));
			$this->request->data = $this->Typ->find('first', $options);
		}
		// $parentTyps = $this->Typ->ParentTyp->find('list');
		$this->set(compact('parentTyps'));
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
		$this->Typ->id = $id;
		if (!$this->Typ->exists()) {
			$this->Session->setFlash('Taki typ nie istnieje.');
			$this->redirect(array('action' => 'index'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		$typ = $this->Typ->findById($id);
		
		if ( $this->Typ->updateAll( array('Typ.deleted' => true), array('Typ.parent_id' => $typ['Typ']['parent_id']) )) {
			$this->Session->setFlash('Typ został usunięty');
			$this->redirect(array('action' => 'index'));
		}
		
		$this->Session->setFlash('Typ nie został usunięty');
		$this->redirect(array('action' => 'index'));
	}
}
