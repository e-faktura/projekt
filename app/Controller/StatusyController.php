<?php
App::uses('AppController', 'Controller');
/**
 * Statusy Controller
 *
 * @property Status $Status
 */
class StatusyController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Status->recursive = 0;
		$this->paginate = array_merge($this->paginate, $this->Status->options);
		$this->set('statusy', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function nowy() {
		if ($this->request->is('post')) {
			
			$this->Status->create();
			
			if ($this->Status->save($this->request->data)) {
				if($this->Status->saveField('parent_id', $this->Status->id)){
					$this->Session->setFlash('Status został dodany', 'success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Status nie mógł zostać dodany. Spróbuj ponownie.', 'error');
				}
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
	public function edycja($id = null) {
		if (!$this->Status->exists($id)) {
			$this->Session->setFlash('Taki status nie istnieje.', 'error');
			$this->redirect(array('action' => 'index'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$status = $this->Status->findById($id);
			$parent_id = $status['Status']['parent_id'];
			
			if( !empty($status['Faktura']) ){
				unset($this->request->data['Status']['id']);
				$this->request->data['Status']['parent_id'] = $parent_id;
			}
			
			
			if ($this->Status->save($this->request->data)) {
				$this->Session->setFlash('Status został zapisany', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Status nie mógł zostać zapisany. Spróbuj ponownie.', 'error');
			}
		} else {
			$options = array('conditions' => array('Status.' . $this->Status->primaryKey => $id));
			$this->request->data = $this->Status->find('first', $options);
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
	public function usuniecie($id = null) {
		$this->Status->id = $id;
		if (!$this->Status->exists()) {
			$this->Session->setFlash('Taki status nie istnieje.', 'error');
			$this->redirect(array('action' => 'index'));
		}
		
		$this->request->onlyAllow('post', 'delete');
		
		$status = $this->Status->findById($id);
		
		if ( $this->Status->updateAll( array('Status.deleted' => true), array('Status.parent_id' => $status['Status']['parent_id']) )) {
			$this->Session->setFlash('Status został usunięty', 'success');
			$this->redirect(array('action' => 'index'));
		}
		
		$this->Session->setFlash('Status nie został usunięty', 'error');
		$this->redirect(array('action' => 'index'));
	}
}
