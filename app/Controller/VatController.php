<?php
App::uses('AppController', 'Controller');
/**
 * Vat Controller
 *
 * @property Vat $Vat
 */
class VatController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Vat->recursive = 0;
		$this->paginate = array_merge($this->paginate, $this->Vat->options);
		$this->set('vat', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function nowa() {
		if ($this->request->is('post')) {
			$this->Vat->create();
			if ($this->Vat->save($this->request->data)) {
				if($this->Vat->saveField('parent_id', $this->Vat->id)){
					$this->Session->setFlash('Stawka VAT została dodana', 'success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Stawka VAT nie mógła zostać dodana. Spróbuj ponownie.', 'error');
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
		if (!$this->Vat->exists($id)) {
			$this->Session->setFlash('Taka stawka VAT nie istnieje.', 'error');
			$this->redirect(array('action' => 'index'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$vat = $this->Vat->findById($id);
			$parent_id = $vat['Vat']['parent_id'];
			
			if( !empty($vat['Faktura']) ){
				unset($this->request->data['Vat']['id']);
				$this->request->data['Vat']['parent_id'] = $parent_id;
			}
			
			if ($this->Vat->save($this->request->data)) {
				$this->Session->setFlash('Stawka VAT została zapisana', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Stawka VAT nie mógła zostać zapisana. Spróbuj ponownie.', 'error');
			}
		} else {
			$options = array('conditions' => array('Vat.' . $this->Vat->primaryKey => $id));
			$this->request->data = $this->Vat->find('first', $options);
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
		$this->Vat->id = $id;
		if (!$this->Vat->exists()) {
			$this->Session->setFlash('Taka stawka VAT nie istnieje.', 'error');
			$this->redirect(array('action' => 'index'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		$vat = $this->Vat->findById($id);
		
		if ( $this->Vat->updateAll( array('Vat.deleted' => true), array('Vat.parent_id' => $vat['Vat']['parent_id']) )) {
			$this->Session->setFlash('Stawka VAT została usunięta', 'success');
			$this->redirect(array('action' => 'index'));
		}
				
		$this->Session->setFlash('Stawka VAT nie została usunięta', 'error');
		$this->redirect(array('action' => 'index'));
	}
}
