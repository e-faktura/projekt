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
		
		if( $this->request->is('ajax') ){
			$this->Produkt->recursive = -1;
			$options = array_merge($this->Produkt->options, array( 'conditions' => array('Produkt.nazwa LIKE ' => '%'. $this->request->query['term'] .'%' ) ));
			$produkty = $this->Produkt->find('list', $options);
			
			$prod = array();
			foreach( $produkty as $id => $produkt ){
				$prod[] = array('label' => $produkt, 'value' => $produkt, 'id' => $id );
			}
			
			$this->set('produkty', $prod);
			$this->set('_serialize', 'produkty' );
		} else{
			$this->Produkt->recursive = 0;
			$this->paginate = array_merge($this->paginate, $this->Produkt->options);
			$this->set('produkty', $this->paginate());
		}
	}

	public function ajax_view( $id = null ){
		if( $this->request->is('ajax') ){
			$this->Produkt->recursive = -1;
			$this->Produkt->id = $id;
			if ($this->Produkt->exists()) {
				
				$options = array_merge($this->Produkt->options, array( 'conditions' => array('Produkt.' . $this->Produkt->primaryKey => $id)));
				$this->set('produkt', $this->Produkt->find('first', $options));
				$this->set('_serialize', 'produkt' );
			}
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function nowy() {
		if ($this->request->is('post')) {
			
			$this->Produkt->create();
			
			if ($this->Produkt->save($this->request->data)) {
				if($this->Produkt->saveField('parent_id', $this->Produkt->id)){
					$this->Session->setFlash('Produkt został dodany', 'success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Produkt nie mógł zostać dodany. Spróbuj ponownie.', 'error');
				}
			} else {
				$this->Session->setFlash('Produkt nie mógł zostać dodany. Spróbuj ponownie.', 'error');
			}
		}
				
		$options = array_merge($this->Produkt->Vat->options, array( 'order' => 'Vat.id ASC' ));
		$vat = $this->Produkt->Vat->find('list', $options);
		
		$this->Produkt->Vat->recursive = 0;
		$options = array_merge($this->Produkt->Vat->options, array(
			'fields' => array('Vat.wartosc')
		));
		$vat_json = json_encode($this->Produkt->Vat->find('list', $options));
		
		$this->set(compact('vat', 'vat_json'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edycja($id = null) {
		if (!$this->Produkt->exists($id)) {
			$this->Session->setFlash('Taki produkt nie istnieje.', 'error');
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
				$this->Session->setFlash('Dane produktu zostały zachowane.', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Dane produktu nie mogły zostać zachowane. Spróbuj ponownie.', 'error');
			}
			
		} else {
			$options = array('conditions' => array('Produkt.' . $this->Produkt->primaryKey => $id));
			$this->request->data = $this->Produkt->find('first', $options);
		}
		
		$vat = $this->Produkt->Vat->find('list');
		
		$this->Produkt->Vat->recursive = 0;
		$options = array_merge($this->Produkt->Vat->options, array(
			'fields' => array('Vat.wartosc')
		));
		$vat_json = json_encode($this->Produkt->Vat->find('list', $options));
		
		$this->set(compact('vat', 'vat_json'));
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
		$this->Produkt->id = $id;
		if (!$this->Produkt->exists()) {
			$this->Session->setFlash('Taki produkt nie istnieje.', 'error');
			$this->redirect(array('action' => 'index'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		$produkt = $this->Produkt->findById($id);
		
		if ( $this->Produkt->updateAll( array('Produkt.deleted' => true), array('Produkt.parent_id' => $produkt['Produkt']['parent_id']) )) {
			$this->Session->setFlash('Produkt został usunięty.', 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Produkt nie został usunięty.', 'error');
		$this->redirect(array('action' => 'index'));
	}
}
