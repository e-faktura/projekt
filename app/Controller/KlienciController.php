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
		$this->paginate = array_merge($this->paginate, $this->Klient->options);
		$this->set('klienci', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function nowy() {
		if ($this->request->is('post')) {
			
			$this->Klient->create();
						
			if ($this->Klient->save($this->request->data)) {
				if($this->Klient->saveField('parent_id', $this->Klient->id)){
					$this->Session->setFlash('Klient został dodany', 'success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Klient nie mógł zostać dodany. Spróbuj ponownie.', 'error');
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
		if (!$this->Klient->exists($id)) {
			$this->Session->setFlash('Taki klient nie istnieje.', 'error');
			$this->redirect(array('action' => 'index'));
		}
		
		if ( $this->request->is('post') || $this->request->is('put') ) {
			
			$klient = $this->Klient->findById($id);
			$parent_id = $klient['Klient']['parent_id'];
			
			if( !empty($klient['Faktura']) ){
				unset($this->request->data['Klient']['id']);
				$this->request->data['Klient']['parent_id'] = $parent_id;
			}
			
			if ($this->Klient->save($this->request->data)) {
				$this->Session->setFlash('Dane klienta zostały zachowane.', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Dane klienta nie mogły zostać zachowane. Spróbuj ponownie.', 'error');
			}
		} else {
			$options = array('conditions' => array('Klient.' . $this->Klient->primaryKey => $id));
			$this->request->data = $this->Klient->find('first', $options);
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
		$this->Klient->id = $id;
		if (!$this->Klient->exists()) {
			$this->Session->setFlash('Taki klient nie istnieje.', 'error');
			$this->redirect(array('action' => 'index'));
		}
		
		$this->request->onlyAllow('post', 'delete');
		
		$klient = $this->Klient->findById($id);
		
		if ( $this->Klient->updateAll( array('Klient.deleted' => true), array('Klient.parent_id' => $klient['Klient']['parent_id']) )) {
			$this->Session->setFlash('Klient został usunięty', 'success');
			$this->redirect(array('action' => 'index'));
		}
		
		$this->Session->setFlash('Klient nie został usunięty', 'error');
		$this->redirect(array('action' => 'index'));
	}
}
