<?php
App::uses('AppController', 'Controller');
/**
 * Sposobyplatnosci Controller
 *
 * @property Sposobplatnosci $Sposobplatnosci
 */
class SposobyplatnosciController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Sposobplatnosci->recursive = 0;
		$this->paginate = array_merge($this->paginate, $this->Sposobplatnosci->options);
		$this->set('sposobyplatnosci', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Sposobplatnosci->create();
			if ($this->Sposobplatnosci->save($this->request->data)) {
				if($this->Sposobplatnosci->saveField('parent_id', $this->Sposobplatnosci->id)){
					$this->Session->setFlash('Sposób płatności został dodany', 'success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Sposób płatności nie mógł zostać dodany. Spróbuj ponownie.', 'error');
				}
			}
		}
		// $parentSposobPlatnoscis = $this->Sposobplatnosci->ParentSposobPlatnosci->find('list');
		$this->set(compact('parentSposobPlatnoscis'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Sposobplatnosci->exists($id)) {
			$this->Session->setFlash('Taki sposób płatności nie istnieje.', 'error');
			$this->redirect(array('action' => 'index'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$sposobplatnosci = $this->Sposobplatnosci->findById($id);
			$parent_id = $sposobplatnosci['Sposobplatnosci']['parent_id'];
			
			if( !empty($sposobplatnosci['Faktura']) ){
				unset($this->request->data['Sposobplatnosci']['id']);
				$this->request->data['Sposobplatnosci']['parent_id'] = $parent_id;
			}
			
			if ($this->Sposobplatnosci->save($this->request->data)) {
				$this->Session->setFlash('Sposób płatności został zapisany.', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Sposób płatności nie mógł zostać zapisany. Spróbuj ponownie.', 'error');
			}
		} else {
			$options = array('conditions' => array('Sposobplatnosci.' . $this->Sposobplatnosci->primaryKey => $id));
			$this->request->data = $this->Sposobplatnosci->find('first', $options);
		}
		// $parentSposobPlatnoscis = $this->Sposobplatnosci->ParentSposobPlatnosci->find('list');
		$this->set(compact('parentSposobPlatnoscis'));
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
		$this->Sposobplatnosci->id = $id;
		if (!$this->Sposobplatnosci->exists()) {
			$this->Session->setFlash('Taki sposób płatności nie istnieje.', 'error');
			$this->redirect(array('action' => 'index'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		$sposobplatnosci = $this->Sposobplatnosci->findById($id);
		
		if ( $this->Sposobplatnosci->updateAll( array('Sposobplatnosci.deleted' => true), array('Sposobplatnosci.parent_id' => $sposobplatnosci['Sposobplatnosci']['parent_id']) )) {
			$this->Session->setFlash('Sposób płatności został usunięty', 'success');
			$this->redirect(array('action' => 'index'));
		}
		
		$this->Session->setFlash('Sposób płatności nie został usunięty', 'error');
		$this->redirect(array('action' => 'index'));
	}
}
