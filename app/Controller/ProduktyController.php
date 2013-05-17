<?php
App::uses('AppController', 'Controller');
/**
 * Produkty Controller
 *
 * @property Produkt $Produkt
 */
class ProduktyController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Produkt->recursive = 0;
		$this->paginate = array_merge($this->paginate, $this->Produkt->options);
		$this->set('produkty', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Produkt->exists($id)) {
			throw new NotFoundException(__('Invalid produkt'));
		}
		$options = array('conditions' => array('Produkt.' . $this->Produkt->primaryKey => $id));
		$this->set('produkt', $this->Produkt->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$this->Produkt->create();
			
			if ($this->Produkt->save($this->request->data)) {
				if($this->Produkt->saveField('parent_id', $this->Produkt->id)){
					$this->Session->setFlash('Produkt został dodany');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Produkt nie mógł zostać dodany. Spróbuj ponownie.');
				}
			} else {
				$this->Session->setFlash('Produkt nie mógł zostać dodany. Spróbuj ponownie.');
			}
		}
		// $parentProdukts = $this->Produkt->ParentProdukt->find('list');
		
		$options = array_merge($this->Produkt->Vat->options, array( 'order' => 'Vat.id ASC' ));
		$vat = $this->Produkt->Vat->find('list', $options);
		
		$this->Produkt->Vat->recursive = 0;
		$options = array_merge($this->Produkt->Vat->options, array(
			'fields' => array('Vat.wartosc')
		));
		$vat_json = json_encode($this->Produkt->Vat->find('list', $options));
		
		$this->set(compact('parentProdukts', 'vat', 'vat_json'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Produkt->exists($id)) {
			$this->Session->setFlash('Taki produkt nie istnieje.');
			$this->redirect(array('action' => 'index'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$produkt = $this->Produkt->findById($id);
			$parent_id = $produkt['Produkt']['parent_id'];
			
			if( !empty($produkt['Pozycja']) ){
				unset($this->request->data['Produkt']['id']);
				$this->request->data['Produkt']['parent_id'] = $parent_id;
			}
						
			if ($this->Produkt->save($this->request->data)) {
				$this->Session->setFlash('Dane produktu zostały zachowane.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Dane produktu nie mogły zostać zachowane. Spróbuj ponownie.');
			}
			
		} else {
			$options = array('conditions' => array('Produkt.' . $this->Produkt->primaryKey => $id));
			$this->request->data = $this->Produkt->find('first', $options);
		}
		// $parentProdukts = $this->Produkt->ParentProdukt->find('list');
		$vat = $this->Produkt->Vat->find('list');
		
		$this->Produkt->Vat->recursive = 0;
		$options = array_merge($this->Produkt->Vat->options, array(
			'fields' => array('Vat.wartosc')
		));
		$vat_json = json_encode($this->Produkt->Vat->find('list', $options));
		
		$this->set(compact('parentProdukts', 'vat', 'vat_json'));
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
		$this->Produkt->id = $id;
		if (!$this->Produkt->exists()) {
			$this->Session->setFlash('Taki produkt nie istnieje.');
			$this->redirect(array('action' => 'index'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		$produkt = $this->Produkt->findById($id);
		
		if ( $this->Produkt->updateAll( array('Produkt.deleted' => true), array('Produkt.parent_id' => $produkt['Produkt']['parent_id']) )) {
			$this->Session->setFlash('Produkt został usunięty.');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Produkt nie został usunięty.');
		$this->redirect(array('action' => 'index'));
	}
}
