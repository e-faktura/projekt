<?php
App::uses('AppController', 'Controller');
/**
 * Pozycje Controller
 *
 * @property Pozycja $Pozycja
 */
class PozycjeController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Pozycja->recursive = 0;
		$this->set('pozycje', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pozycja->exists($id)) {
			throw new NotFoundException(__('Invalid pozycja'));
		}
		$options = array('conditions' => array('Pozycja.' . $this->Pozycja->primaryKey => $id));
		$this->set('pozycja', $this->Pozycja->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pozycja->create();
			if ($this->Pozycja->save($this->request->data)) {
				$this->Session->setFlash(__('The pozycja has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pozycja could not be saved. Please, try again.'));
			}
		}
		$faktury = $this->Pozycja->Faktura->find('list');
		$produkty = $this->Pozycja->Produkt->find('list');
		$jednostki = $this->Pozycja->Jednostka->find('list');
		$this->set(compact('faktury', 'produkty', 'jednostki'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pozycja->exists($id)) {
			throw new NotFoundException(__('Invalid pozycja'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pozycja->save($this->request->data)) {
				$this->Session->setFlash(__('The pozycja has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pozycja could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Pozycja.' . $this->Pozycja->primaryKey => $id));
			$this->request->data = $this->Pozycja->find('first', $options);
		}
		$faktury = $this->Pozycja->Faktura->find('list');
		$produkty = $this->Pozycja->Produkt->find('list');
		$jednostki = $this->Pozycja->Jednostka->find('list');
		$this->set(compact('faktury', 'produkty', 'jednostki'));
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
		$this->Pozycja->id = $id;
		if (!$this->Pozycja->exists()) {
			throw new NotFoundException(__('Invalid pozycja'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pozycja->delete()) {
			$this->Session->setFlash(__('Pozycja deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Pozycja was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
