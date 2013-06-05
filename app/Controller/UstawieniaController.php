<?php
App::uses('AppController', 'Controller');
/**
 * Ustawienia Controller
 *
 * @property Ustawienie $Ustawienie
 */
class UstawieniaController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if ($this->request->is('post') || $this->request->is('put')) {
			pr($this->request->data['Ustawienie']);
			
			if ($this->Ustawienie->saveAll($this->request->data['Ustawienie'])) {
				$this->Session->setFlash('Ustawienia zostały zapisane.', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Ustawienia nie mogły zostać zapisane. Spróbuj ponownie.', 'error');
			}
			
			
		}
		
		$this->Ustawienie->recursive = 0;
		
		$ustawienia = $this->Ustawienie->find('all');
		
		// pr($ustawienia);
		
		$ust = array();
		if( !empty($ustawienia) ){
			foreach( $ustawienia as $ustawienie ){
				$ust[$ustawienie['Ustawienie']['id']] = $ustawienie['Ustawienie'];
			}
		}
		
		$this->set('ustawienia', $ust);
	}

}