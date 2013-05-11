<?php
App::uses('AppController', 'Controller');
/**
 * Jednostki Controller
 *
 * @property Jednostka $Jednostka
 */
class JednostkiController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Jednostka->recursive = 0;
		$this->set('jednostki', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Jednostka->exists($id)) {
			throw new NotFoundException(__('Invalid jednostka'));
		}
		$options = array('conditions' => array('Jednostka.' . $this->Jednostka->primaryKey => $id));
		$this->set('jednostka', $this->Jednostka->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Jednostka->create();
			if ($this->Jednostka->save($this->request->data)) {
				$this->Session->setFlash(__('The jednostka has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The jednostka could not be saved. Please, try again.'));
			}
		}
		// $parentJednostkas = $this->Jednostka->ParentJednostka->find('list');
		$this->set(compact('parentJednostkas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Jednostka->exists($id)) {
			throw new NotFoundException(__('Invalid jednostka'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Jednostka->save($this->request->data)) {
				$this->Session->setFlash(__('The jednostka has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The jednostka could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Jednostka.' . $this->Jednostka->primaryKey => $id));
			$this->request->data = $this->Jednostka->find('first', $options);
		}
		// $parentJednostkas = $this->Jednostka->ParentJednostka->find('list');
		$this->set(compact('parentJednostkas'));
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
		$this->Jednostka->id = $id;
		if (!$this->Jednostka->exists()) {
			throw new NotFoundException(__('Invalid jednostka'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Jednostka->delete()) {
			$this->Session->setFlash(__('Jednostka deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Jednostka was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
