<?php
App::uses('AppController', 'Controller');

/**
 * Uzytkownicy Controller
 *
 * @property Uzytkownik $Uzytkownik
 */
class UzytkownicyController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Uzytkownik->recursive = 0;
		$this->set('uzytkownicy', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Uzytkownik->exists($id)) {
			throw new NotFoundException(__('Invalid uzytkownik'));
		}
		$options = array('conditions' => array('Uzytkownik.' . $this->Uzytkownik->primaryKey => $id));
		$this->set('uzytkownik', $this->Uzytkownik->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Uzytkownik->create();
			if ($this->Uzytkownik->save($this->request->data)) {
				$this->Session->setFlash('Użytkownik został dodany.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Użytkownik nie mógł zostać dodany. Spróbuj ponownie.');
			}
		}
		$role = $this->Uzytkownik->Rola->find('list');
		$this->set(compact('role'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Uzytkownik->exists($id)) {
			$this->Session->setFlash('Taki użytkownik nie istnieje.');
			$this->redirect(array('action' => 'index'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Uzytkownik->save($this->request->data)) {
				$this->Session->setFlash('Użytkownik został zapisany.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Użytkownik nie mógł zostać zachowany. Spróbuj ponownie.');
			}
		} else {
			$options = array('conditions' => array('Uzytkownik.' . $this->Uzytkownik->primaryKey => $id));
			$this->request->data = $this->Uzytkownik->find('first', $options);
		}
		$role = $this->Uzytkownik->Rola->find('list');
		$this->set(compact('role'));
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
		$this->Uzytkownik->id = $id;
		if (!$this->Uzytkownik->exists()) {
			$this->Session->setFlash('Taki użytkownik nie istnieje.');
			$this->redirect(array('action' => 'index'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Uzytkownik->delete()) {
			$this->Session->setFlash('Użytkownik został usunięty.');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Użytkownik nie został usunięty.');
		$this->redirect(array('action' => 'index'));
	}
	
	public function login() {

	}
	
}
