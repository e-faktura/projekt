<?php
App::uses('AppController', 'Controller');
/**
 * Produkty Controller
 *
 * @property Produkt $Produkt
 */
class ProduktyController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Produkt->recursive = 0;
		$this->set('produkty', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Produkt->exists($id)) {
			throw new NotFoundException(__('Invalid produkt'));
		}
		$options = array('conditions' => array('Produkt.' . $this->Produkt->primaryKey => $id));
		$this->set('produkt', $this->Produkt->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Produkt->create();
			if ($this->Produkt->save($this->request->data)) {
				$this->Session->setFlash(__('The produkt has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produkt could not be saved. Please, try again.'));
			}
		}
		$parentProdukts = $this->Produkt->ParentProdukt->find('list');
		$vat = $this->Produkt->Vat->find('list');
		$this->set(compact('parentProdukts', 'vat'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Produkt->exists($id)) {
			throw new NotFoundException(__('Invalid produkt'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Produkt->save($this->request->data)) {
				$this->Session->setFlash(__('The produkt has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produkt could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Produkt.' . $this->Produkt->primaryKey => $id));
			$this->request->data = $this->Produkt->find('first', $options);
		}
		$parentProdukts = $this->Produkt->ParentProdukt->find('list');
		$vat = $this->Produkt->Vat->find('list');
		$this->set(compact('parentProdukts', 'vat'));
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
		$this->Produkt->id = $id;
		if (!$this->Produkt->exists()) {
			throw new NotFoundException(__('Invalid produkt'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Produkt->delete()) {
			$this->Session->setFlash(__('Produkt deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Produkt was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
