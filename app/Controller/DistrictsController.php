<?php
App::uses('AppController', 'Controller');
/**
 * Districts Controller
 *
 * @property District $District
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DistrictsController extends AppController {

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
		$this->District->recursive = 0;
		$this->set('districts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->District->exists($id)) {
			throw new NotFoundException(__('Invalid district'));
		}
		$options = array('conditions' => array('District.' . $this->District->primaryKey => $id));
		$this->set('district', $this->District->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->District->create();
			if ($this->District->save($this->request->data)) {
				$this->Session->setFlash(__('The district has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The district could not be saved. Please, try again.'));
			}
		}
		$countries = $this->District->Country->find('list');
		$this->set(compact('countries'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->District->exists($id)) {
			throw new NotFoundException(__('Invalid district'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->District->save($this->request->data)) {
				$this->Session->setFlash(__('The district has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The district could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('District.' . $this->District->primaryKey => $id));
			$this->request->data = $this->District->find('first', $options);
		}
		$countries = $this->District->Country->find('list');
		$this->set(compact('countries'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->District->id = $id;
		if (!$this->District->exists()) {
			throw new NotFoundException(__('Invalid district'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->District->delete()) {
			$this->Session->setFlash(__('The district has been deleted.'));
		} else {
			$this->Session->setFlash(__('The district could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
