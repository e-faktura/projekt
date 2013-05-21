<?php
App::uses('AppController', 'Controller');

/**
 * Uzytkownicy Controller
 *
 * @property Uzytkownik $Uzytkownik
 */
class UzytkownicyController extends AppController {


	public function login() {
		 if ($this->request->is('post')) {
			  if ($this->Auth->login()) {
					$this->Session->setFlash('Zalogowano');
					$this->redirect($this->Auth->redirect());
			  } else {
					$this->Session->setFlash('Login lub hasło jest nieprawidłowe. Spróbuj jeszcze raz.');
			  }
		 }
	}
	
	public function logout() {
		$this->Session->setFlash('Wylogowano');
		$this->redirect($this->Auth->logout());
	}

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



	public function initDb() {
		$rola = $this->Uzytkownik->Rola;
	 //Allow admins to everything
		$rola->id = 1;
		$this->Acl->allow($rola, 'controllers');

	 //allow managers to posts and widgets
		$rola->id = 2;
		$this->Acl->deny($rola, 'controllers');
		$this->Acl->allow($rola, 'controllers/Faktury');
		$this->Acl->allow($rola, 'controllers/Klienci');
		$this->Acl->allow($rola, 'controllers/Produkty');

	 //allow users to only add and edit on posts and widgets
		// $rola->id = 3;
		// $this->Acl->deny($rola, 'controllers');
		// $this->Acl->allow($rola, 'controllers/Posts/add');
		// $this->Acl->allow($rola, 'controllers/Posts/edit');
		// $this->Acl->allow($rola, 'controllers/Widgets/add');
		// $this->Acl->allow($rola, 'controllers/Widgets/edit');
	 //we add an exit to avoid an ugly "missing views" error message
		echo "all done";
		exit;
	}
	
}
