<?php
App::uses('AppController', 'Controller');
/**
 * Vat Controller
 *
 * @property Vat $Vat
 */
class VatController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Vat->recursive = 0;
		$this->set('vat', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Vat->exists($id)) {
			throw new NotFoundException(__('Invalid vat'));
		}
		$options = array('conditions' => array('Vat.' . $this->Vat->primaryKey => $id));
		$this->set('vat', $this->Vat->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Vat->create();
			if ($this->Vat->save($this->request->data)) {
				$this->Session->setFlash(__('The vat has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vat could not be saved. Please, try again.'));
			}
		}
		// $parentVats = $this->Vat->ParentVat->find('list');
		$this->set(compact('parentVats'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Vat->exists($id)) {
			throw new NotFoundException(__('Invalid vat'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Vat->save($this->request->data)) {
				$this->Session->setFlash(__('The vat has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vat could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Vat.' . $this->Vat->primaryKey => $id));
			$this->request->data = $this->Vat->find('first', $options);
		}
		// $parentVats = $this->Vat->ParentVat->find('list');
		$this->set(compact('parentVats'));
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
		$this->Vat->id = $id;
		if (!$this->Vat->exists()) {
			throw new NotFoundException(__('Invalid vat'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Vat->delete()) {
			$this->Session->setFlash(__('Vat deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Vat was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
