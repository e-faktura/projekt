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
	public function view($id = null, $engine = 'dompdf') {
		// if (!$this->Faktura->exists($id)) {
		// 	throw new NotFoundException(__('Invalid faktura'));
		// }
		// $this->Faktura->recursive = 1;
		// $options = array('conditions' => array('Faktura.' . $this->Faktura->primaryKey => $id));
		// $this->set('faktura', $this->Faktura->find('first', $options));
		
		
		
		
		
		$this->loadModel('Ustawienie');
		$this->Ustawienie->recursive = 0;
		$sprzedawca = $this->Ustawienie->find('first', array('conditions' => array('Ustawienie.' . $this->Ustawienie->primaryKey => 1)));
		
		$this->Faktura->recursive = 2;
		$options = array('conditions' => array('Faktura.' . $this->Faktura->primaryKey => $id));
		$this->set('faktura', $this->Faktura->find('first', $options));
		$this->set('sprzedawca', $sprzedawca);
		
		
		
		
		if( !isset($this->request->params['ext']) ){
			$this->layout = 'empty';
			$this->render('/Faktury/pdf/view');
		} else {
			if( $engine == 'dompdf' ){
				$this->layout = 'dompdf';
				$this->render('/Faktury/pdf/view');
			}
			else if( $engine == 'mpdf'){
				$this->layout = 'mpdf';
				$this->render('/Faktury/pdf/view');
			}
		}
		
		
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Faktura->create();
			
			pr($this->request->data);
			$errors = array();
			
			$pozycje = $this->request->data['Faktura']['Pozycja'];
			unset($this->request->data['Faktura']['Pozycja']);
			
			// pr($this->request->data);
			
			if ($this->Faktura->save($this->request->data)) {
				$faktura_id = $this->Faktura->id;
				
				
				
				// pr($pozycje);
				// lecimy przez wszysktkie pozycje na fakturze
				foreach( $pozycje as $pozycja ){
					// pr($pozycja);
					
					if( !empty($pozycja['Produkt']['nazwa']) ){
					
						$pozycja['faktura_id'] = $faktura_id;
						
						//sprawdzamy czy produkt był z bazy czy wpisany z palca
						if( !empty($pozycja['Produkt']['id']) ){
							//produkt z bazy - pobieramy jego aktualne dane
							$produkt = $this->Faktura->Pozycja->Produkt->findById($pozycja['Produkt']['id']);
							// pr($produkt);
							
							//sprawdzamy czy dane produktu nie zostały zmienione na fakturze
							if( $pozycja['Produkt']['nazwa'] != $produkt['Produkt']['nazwa'] ||
								 $pozycja['Produkt']['cena_netto'] != $produkt['Produkt']['cena_netto'] ||
								 $pozycja['Produkt']['vat_id'] != $produkt['Produkt']['vat_id'] ){
								//dane produktu zostały zmienione na fakturze - sprawdzamy czy można zedytować ten produkt czy trzeba dodać nowy
								
								if( !empty($produkt['Pozycja']) ){
									//produkt już był dodany do jakiejś faktury - trzeba utworzyć nowy
									unset($pozycja['Produkt']['id']);
								}
								
								if($this->Faktura->Pozycja->Produkt->save(array('Produkt'=> $pozycja['Produkt']))){
									$errors[] = 'Produkt nie mógł zostać zapisany.';
									$pozycja['produkt_id'] = $this->Faktura->Pozycja->Produkt->id;
								}
							} else {
								//dane produktu nie zostały zmienione na fakturze - ustawiamy tylko id
								$pozycja['produkt_id'] = $produkt['Produkt']['id'];
							}
							
						}
						else{
							//produkt nowy - wpisany na fakturze - trzeba dodać
							unset($pozycja['Produkt']['parent_id']);
							if ($this->Faktura->Pozycja->Produkt->save( array('Produkt'=> $pozycja['Produkt']) )) {
								if($this->Faktura->Pozycja->Produkt->saveField('parent_id', $this->Faktura->Pozycja->Produkt->id)){
									$pozycja['produkt_id'] = $this->Faktura->Pozycja->Produkt->id;
								
								} else {
									$errors[] = 'Produkt nie mógł zostać dodany. Spróbuj ponownie.';
								}
							} else {
								$errors[] = 'Produkt nie mógł zostać dodany. Spróbuj ponownie.';
							}
						}
						
						
						unset($pozycja['Produkt']);
						$this->Faktura->Pozycja->create();
						if ($this->Faktura->Pozycja->save( array('Pozycja' => $pozycja) )){
							
						} else {
							$error[] = 'The pozycja could not be saved. Please, try again.';
						}
					
					}
				}
				
				
				// $this->Session->setFlash(__('The faktura has been saved'));
				// $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Faktura nie mogła zostać zapisana. Spróbuj ponownie.');
			}
			
			
			
			
			
			
			
			
			
			foreach( $errors as $error ){
				$this->Session->setFlash($error);
			}
			// if ($this->Faktura->save($this->request->data)) {
			// 	$this->Session->setFlash(__('The faktura has been saved'));
			// 	$this->redirect(array('action' => 'index'));
			// } else {
			// 	$this->Session->setFlash(__('The faktura could not be saved. Please, try again.'));
			// }
			
			
			
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
		$jednostki = $this->Jednostka->find('list', $this->Jednostka->options);
		$jednostki_json = json_encode($jednostki);
		
		$this->loadModel('Vat');
		$this->Vat->recursive = -1;
		$vat = $this->Vat->find('all', array_merge($this->Vat->options, array('order' => array('Vat.wartosc'=>'DESC'))));
		$vaty = array();
		foreach( $vat as $v){
			$vaty['wartosci'][$v['Vat']['id']] = $v['Vat']['wartosc'];
			$vaty['nazwy'][$v['Vat']['id']] = $v['Vat']['nazwa'];
		}
		$vat_json = json_encode($vaty);
		
		// $parentFakturas = $this->Faktura->ParentFaktura->find('list');
		$typy = $this->Faktura->Typ->find('list');
		$statusy = $this->Faktura->Status->find('list');
		$klienci = $this->Faktura->Klient->find('list', $this->Faktura->Klient->options);
		
		// pr($klienci);
		
		$sposobyPlatnosci = $this->Faktura->SposobPlatnosci->find('list');
		$this->set(compact('parentFakturas', 'typy', 'statusy', 'klienci', 'sposobyPlatnosci', 'numer', 'produkty', 'jednostki', 'vat', 'vat_json', 'jednostki_json'));
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
