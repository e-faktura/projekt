<?php
App::uses('AppController', 'Controller');
/**
 * Faktury Controller
 *
 * @property Faktura $Faktura
 */
class FakturyController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Faktura->recursive = 0;
		$this->set('faktury', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Faktura->exists($id)) {
			throw new NotFoundException(__('Invalid faktura'));
		}
		$options = array('conditions' => array('Faktura.' . $this->Faktura->primaryKey => $id), 'recursive' => 2);
		$this->set('faktura', $this->Faktura->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Faktura->create();
			if ($this->Faktura->save($this->request->data)) {
				$this->Session->setFlash(__('The faktura has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The faktura could not be saved. Please, try again.'));
			}
		}
				
		$ost_fakt = $this->Faktura->find('first', array(
			'order' => array('Faktura.'. $this->Faktura->primaryKey => 'desc')
		));
		
		if( !empty($ost_fakt) ){
			list($n,$m,$y) = explode('/',$ost_fakt['Faktura']['numer']);
			
			if( $m != date('m') ) $numer = 1;
			else $numer = ((int)$n) + 1;
			
			$numer = $numer.'/'.date('m').'/'.date('Y');
			
		} else {
			$numer = '1/'.date('m').'/'.date('Y');
		}
		
		$this->loadModel('Produkt');
		$produkty = $this->Produkt->find('list');
		
		$this->loadModel('Jednostka');
		$jednostki = $this->Jednostka->find('list');
		
		$this->loadModel('Vat');
		$vat = $this->Vat->find('list');
		
		
		// $parentFakturas = $this->Faktura->ParentFaktura->find('list');
		$typy = $this->Faktura->Typ->find('list');
		$statusy = $this->Faktura->Status->find('list');
		$klienci = $this->Faktura->Klient->find('list', $this->Faktura->Klient->options);
		
		// pr($klienci);
		
		$sposobyPlatnosci = $this->Faktura->SposobPlatnosci->find('list');
		$this->set(compact('parentFakturas', 'typy', 'statusy', 'klienci', 'sposobyPlatnosci', 'numer', 'produkty', 'jednostki', 'vat'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Faktura->exists($id)) {
			throw new NotFoundException(__('Invalid faktura'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Faktura->save($this->request->data)) {
				$this->Session->setFlash(__('The faktura has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The faktura could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Faktura.' . $this->Faktura->primaryKey => $id));
			$this->request->data = $this->Faktura->find('first', $options);
		}
		// $parentFakturas = $this->Faktura->ParentFaktura->find('list');
		$typy = $this->Faktura->Typ->find('list');
		$statusy = $this->Faktura->Status->find('list');
		$klienci = $this->Faktura->Klient->find('list');
		$sposobyPlatnosci = $this->Faktura->SposobPlatnosci->find('list');
		$this->set(compact('parentFakturas', 'typy', 'statusy', 'klienci', 'sposobyPlatnosci'));
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
		$this->Faktura->id = $id;
		if (!$this->Faktura->exists()) {
			throw new NotFoundException(__('Invalid faktura'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Faktura->delete()) {
			$this->Session->setFlash(__('Faktura deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Faktura was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
