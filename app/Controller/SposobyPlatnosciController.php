<?php
App::uses('AppController', 'Controller');
/**
 * Sposobyplatnosci Controller
 *
 * @property SposobPlatnosci $SposobPlatnosci
 */
class SposobyPlatnosciController extends AppController {
	
	public $uses = array('SposobPlatnosci');
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SposobPlatnosci->recursive = 0;
		$this->paginate = array_merge($this->paginate, $this->SposobPlatnosci->options);
		$this->set('sposobyplatnosci', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function nowy() {
		if ($this->request->is('post')) {
			$this->SposobPlatnosci->create();
			if ($this->SposobPlatnosci->save($this->request->data)) {
				if($this->SposobPlatnosci->saveField('parent_id', $this->SposobPlatnosci->id)){
					$this->Session->setFlash('Sposób płatności został dodany', 'success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Sposób płatności nie mógł zostać dodany. Spróbuj ponownie.', 'error');
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
		if (!$this->SposobPlatnosci->exists($id)) {
			$this->Session->setFlash('Taki sposób płatności nie istnieje.', 'error');
			$this->redirect(array('action' => 'index'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$sposobplatnosci = $this->SposobPlatnosci->findById($id);
			$parent_id = $sposobplatnosci['SposobPlatnosci']['parent_id'];
			
			if( !empty($sposobplatnosci['Faktura']) ){
				unset($this->request->data['SposobPlatnosci']['id']);
				$this->request->data['SposobPlatnosci']['parent_id'] = $parent_id;
			}
			
			if ($this->SposobPlatnosci->save($this->request->data)) {
				$this->Session->setFlash('Sposób płatności został zapisany.', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Sposób płatności nie mógł zostać zapisany. Spróbuj ponownie.', 'error');
			}
		} else {
			$options = array('conditions' => array('SposobPlatnosci.' . $this->SposobPlatnosci->primaryKey => $id));
			$this->request->data = $this->SposobPlatnosci->find('first', $options);
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
		$this->SposobPlatnosci->id = $id;
		if (!$this->SposobPlatnosci->exists()) {
			$this->Session->setFlash('Taki sposób płatności nie istnieje.', 'error');
			$this->redirect(array('action' => 'index'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		$sposobplatnosci = $this->SposobPlatnosci->findById($id);
		
		if ( $this->SposobPlatnosci->updateAll( array('SposobPlatnosci.deleted' => true), array('SposobPlatnosci.parent_id' => $sposobplatnosci['SposobPlatnosci']['parent_id']) )) {
			$this->Session->setFlash('Sposób płatności został usunięty', 'success');
			$this->redirect(array('action' => 'index'));
		}
		
		$this->Session->setFlash('Sposób płatności nie został usunięty', 'error');
		$this->redirect(array('action' => 'index'));
	}
}
