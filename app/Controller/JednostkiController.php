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
		$this->paginate = array_merge($this->paginate, $this->Jednostka->options);
		$this->set('jednostki', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function nowa() {
		if ($this->request->is('post')) {
			$this->Jednostka->create();
			if ($this->Jednostka->save($this->request->data)) {
				if($this->Jednostka->saveField('parent_id', $this->Jednostka->id)){
					$this->Session->setFlash('Jednostka miary została dodana', 'success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Jednostka miary nie mogła zostać dodana. Spróbuj ponownie.', 'error');
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
		if (!$this->Jednostka->exists($id)) {
			$this->Session->setFlash('Taka jednostka miary nie istnieje.', 'error');
			$this->redirect(array('action' => 'index'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$jednostka = $this->Jednostka->findById($id);
			$parent_id = $jednostka['Jednostka']['parent_id'];
			
			if( !empty($jednostka['Faktura']) ){
				unset($this->request->data['Jednostka']['id']);
				$this->request->data['Jednostka']['parent_id'] = $parent_id;
			}
			
			if ($this->Jednostka->save($this->request->data)) {
				$this->Session->setFlash('Jednostka miary została zapisana.', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Jednostka miary nie mogła zostać zapisana. Spróbuj ponownie.', 'error');
			}
		} else {
			$options = array('conditions' => array('Jednostka.' . $this->Jednostka->primaryKey => $id));
			$this->request->data = $this->Jednostka->find('first', $options);
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
		$this->Jednostka->id = $id;
		if (!$this->Jednostka->exists()) {
			$this->Session->setFlash('Taka jednostka miary nie istnieje.', 'error');
			$this->redirect(array('action' => 'index'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		$jednostka = $this->Jednostka->findById($id);
		
		if ( $this->Jednostka->updateAll( array('Jednostka.deleted' => true), array('Jednostka.parent_id' => $jednostka['Jednostka']['parent_id']) )) {
			$this->Session->setFlash('Jednostka miary została usunięta', 'success');
			$this->redirect(array('action' => 'index'));
		}
		
		$this->Session->setFlash('Jednostka miary nie została usunięta', 'error');
		$this->redirect(array('action' => 'index'));
	}
}
