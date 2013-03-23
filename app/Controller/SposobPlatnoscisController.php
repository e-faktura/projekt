<?php
App::uses('AppController', 'Controller');
/**
 * SposobPlatnoscis Controller
 *
 * @property SposobPlatnosci $SposobPlatnosci
 */
class SposobPlatnoscisController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SposobPlatnosci->recursive = 0;
		$this->set('sposobPlatnoscis', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SposobPlatnosci->exists($id)) {
			throw new NotFoundException(__('Invalid sposob platnosci'));
		}
		$options = array('conditions' => array('SposobPlatnosci.' . $this->SposobPlatnosci->primaryKey => $id));
		$this->set('sposobPlatnosci', $this->SposobPlatnosci->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SposobPlatnosci->create();
			if ($this->SposobPlatnosci->save($this->request->data)) {
				$this->Session->setFlash(__('The sposob platnosci has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sposob platnosci could not be saved. Please, try again.'));
			}
		}
		$parentSposobPlatnoscis = $this->SposobPlatnosci->ParentSposobPlatnosci->find('list');
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
		if (!$this->SposobPlatnosci->exists($id)) {
			throw new NotFoundException(__('Invalid sposob platnosci'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SposobPlatnosci->save($this->request->data)) {
				$this->Session->setFlash(__('The sposob platnosci has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sposob platnosci could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SposobPlatnosci.' . $this->SposobPlatnosci->primaryKey => $id));
			$this->request->data = $this->SposobPlatnosci->find('first', $options);
		}
		$parentSposobPlatnoscis = $this->SposobPlatnosci->ParentSposobPlatnosci->find('list');
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
		$this->SposobPlatnosci->id = $id;
		if (!$this->SposobPlatnosci->exists()) {
			throw new NotFoundException(__('Invalid sposob platnosci'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SposobPlatnosci->delete()) {
			$this->Session->setFlash(__('Sposob platnosci deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Sposob platnosci was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
