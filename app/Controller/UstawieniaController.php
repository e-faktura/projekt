<?php
App::uses('AppController', 'Controller');
/**
 * Ustawienia Controller
 *
 * @property Ustawienie $Ustawienie
 */
class UstawieniaController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if ($this->request->is('post') || $this->request->is('put')) {
			pr($this->request->data['Ustawienie']);
			
			if ($this->Ustawienie->saveAll($this->request->data['Ustawienie'])) {
				$this->Session->setFlash('Ustawienia zostały zapisane.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Ustawienia nie mogły zostać zapisane. Spróbuj ponownie.');
			}
			
			
		}
		
		$this->Ustawienie->recursive = 0;
		
		$ustawienia = $this->Ustawienie->find('all');
		
		// pr($ustawienia);
		
		$ust = array();
		if( !empty($ustawienia) ){
			foreach( $ustawienia as $ustawienie ){
				$ust[$ustawienie['Ustawienie']['id']] = $ustawienie['Ustawienie'];
			}
		}
		
		$this->set('ustawienia', $ust);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ustawienie->exists($id)) {
			throw new NotFoundException(__('Invalid ustawienie'));
		}
		$options = array('conditions' => array('Ustawienie.' . $this->Ustawienie->primaryKey => $id));
		$this->set('ustawienie', $this->Ustawienie->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ustawienie->create();
			if ($this->Ustawienie->save($this->request->data)) {
				$this->Session->setFlash(__('The ustawienie has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ustawienie could not be saved. Please, try again.'));
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
		if (!$this->Ustawienie->exists($id)) {
			throw new NotFoundException(__('Invalid ustawienie'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ustawienie->save($this->request->data)) {
				$this->Session->setFlash(__('The ustawienie has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ustawienie could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ustawienie.' . $this->Ustawienie->primaryKey => $id));
			$this->request->data = $this->Ustawienie->find('first', $options);
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
		$this->Ustawienie->id = $id;
		if (!$this->Ustawienie->exists()) {
			throw new NotFoundException(__('Invalid ustawienie'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ustawienie->delete()) {
			$this->Session->setFlash(__('Ustawienie deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ustawienie was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
