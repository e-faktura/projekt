<?php
App::uses('AppController', 'Controller');
/**
 * Klienci Controller
 *
 * @property Klient $Klient
 */
class KlienciController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Klient->recursive = 0;
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
				$this->Session->setFlash(__('The klient has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The klient could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid klient'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Klient->save($this->request->data)) {
				$this->Session->setFlash(__('The klient has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The klient could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid klient'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Klient->delete()) {
			$this->Session->setFlash(__('Klient deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Klient was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
