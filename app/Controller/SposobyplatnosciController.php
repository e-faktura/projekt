<?php
App::uses('AppController', 'Controller');
/**
 * Sposobyplatnosci Controller
 *
 * @property Sposobplatnosci $Sposobplatnosci
 */
class SposobyplatnosciController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Sposobplatnosci->recursive = 0;
		$this->set('sposobyplatnosci', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Sposobplatnosci->exists($id)) {
			throw new NotFoundException(__('Invalid sposobplatnosci'));
		}
		$options = array('conditions' => array('Sposobplatnosci.' . $this->Sposobplatnosci->primaryKey => $id));
		$this->set('sposobplatnosci', $this->Sposobplatnosci->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Sposobplatnosci->create();
			if ($this->Sposobplatnosci->save($this->request->data)) {
				$this->Session->setFlash(__('The sposobplatnosci has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sposobplatnosci could not be saved. Please, try again.'));
			}
		}
		// $parentSposobPlatnoscis = $this->Sposobplatnosci->ParentSposobPlatnosci->find('list');
		$this->set(compact('parentSposobPlatnoscis'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Sposobplatnosci->exists($id)) {
			throw new NotFoundException(__('Invalid sposobplatnosci'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Sposobplatnosci->save($this->request->data)) {
				$this->Session->setFlash(__('The sposobplatnosci has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sposobplatnosci could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Sposobplatnosci.' . $this->Sposobplatnosci->primaryKey => $id));
			$this->request->data = $this->Sposobplatnosci->find('first', $options);
		}
		// $parentSposobPlatnoscis = $this->Sposobplatnosci->ParentSposobPlatnosci->find('list');
		$this->set(compact('parentSposobPlatnoscis'));
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
		$this->Sposobplatnosci->id = $id;
		if (!$this->Sposobplatnosci->exists()) {
			throw new NotFoundException(__('Invalid sposobplatnosci'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Sposobplatnosci->delete()) {
			$this->Session->setFlash(__('Sposobplatnosci deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Sposobplatnosci was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
