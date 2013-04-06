<?php
App::uses('AppController', 'Controller');
/**
 * Role Controller
 *
 * @property Rola $Rola
 */
class RoleController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Rola->recursive = 0;
		$this->set('role', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Rola->exists($id)) {
			throw new NotFoundException(__('Invalid rola'));
		}
		$options = array('conditions' => array('Rola.' . $this->Rola->primaryKey => $id));
		$this->set('rola', $this->Rola->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Rola->create();
			if ($this->Rola->save($this->request->data)) {
				$this->Session->setFlash(__('The rola has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rola could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Rola->exists($id)) {
			throw new NotFoundException(__('Invalid rola'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Rola->save($this->request->data)) {
				$this->Session->setFlash(__('The rola has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rola could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Rola.' . $this->Rola->primaryKey => $id));
			$this->request->data = $this->Rola->find('first', $options);
		}
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
		$this->Rola->id = $id;
		if (!$this->Rola->exists()) {
			throw new NotFoundException(__('Invalid rola'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Rola->delete()) {
			$this->Session->setFlash(__('Rola deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Rola was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
