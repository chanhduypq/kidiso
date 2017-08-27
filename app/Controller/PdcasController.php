<?php
App::uses('AppController', 'Controller');
/**
 * Pdcas Controller
 *
 * @property Pdca $Pdca
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PdcasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Pdca->recursive = 0;
		$this->set('pdcas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pdca->exists($id)) {
			throw new NotFoundException(__('Invalid pdca'));
		}
		$options = array('conditions' => array('Pdca.' . $this->Pdca->primaryKey => $id));
		$this->set('pdca', $this->Pdca->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pdca->create();
			if ($this->Pdca->save($this->request->data)) {
				$this->Session->setFlash(__('The pdca has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pdca could not be saved. Please, try again.'));
			}
		}
		$pupils = $this->Pdca->Pupil->find('list');
		$this->set(compact('pupils'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pdca->exists($id)) {
			throw new NotFoundException(__('Invalid pdca'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pdca->save($this->request->data)) {
				$this->Session->setFlash(__('The pdca has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pdca could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Pdca.' . $this->Pdca->primaryKey => $id));
			$this->request->data = $this->Pdca->find('first', $options);
		}
		$pupils = $this->Pdca->Pupil->find('list');
		$this->set(compact('pupils'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pdca->id = $id;
		if (!$this->Pdca->exists()) {
			throw new NotFoundException(__('Invalid pdca'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Pdca->delete()) {
			$this->Session->setFlash(__('The pdca has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pdca could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
