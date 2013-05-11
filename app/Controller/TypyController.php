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
				$this->Session->setFlash(__('The typ has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The typ could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid typ'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Typ->save($this->request->data)) {
				$this->Session->setFlash(__('The typ has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The typ could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid typ'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Typ->delete()) {
			$this->Session->setFlash(__('Typ deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Typ was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
