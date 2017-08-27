<?php
App::uses('AppController', 'Controller');
/**
 * Evaluates Controller
 *
 * @property Evaluate $Evaluate
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
App::import('Vendor', 'php-excel-reader/excel_reader2');

class EvaluatesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $Components	= array('Paginator', 'Session');
	public $helper		= array('Xls');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Evaluate->recursive = 0;
		$this->set('evaluates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Evaluate->exists($id)) {
			throw new NotFoundException(__('Invalid evaluate'));
		}
		$options = array('conditions' => array('Evaluate.' . $this->Evaluate->primaryKey => $id));
		$this->set('evaluate', $this->Evaluate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Evaluate->create();
			if ($this->Evaluate->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluate has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluate could not be saved. Please, try again.'));
			}
		}
		$pdcas = $this->Evaluate->Pdca->find('list');
		$this->set(compact('pdcas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Evaluate->exists($id)) {
			throw new NotFoundException(__('Invalid evaluate'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Evaluate->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluate has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluate could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Evaluate.' . $this->Evaluate->primaryKey => $id));
			$this->request->data = $this->Evaluate->find('first', $options);
		}
		$pdcas = $this->Evaluate->Pdca->find('list');
		$this->set(compact('pdcas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Evaluate->id = $id;
		if (!$this->Evaluate->exists()) {
			throw new NotFoundException(__('Invalid evaluate'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Evaluate->delete()) {
			$this->Session->setFlash(__('The evaluate has been deleted.'));
		} else {
			$this->Session->setFlash(__('The evaluate could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	//duc.vov 
	public function test(){
		$data = new Spreadsheet_Excel_Reader('test.xls', true);
		$data->style(1,2);
	}
	public function output(){

	}
	public function input(){
		$data = new Spreadsheet_Excel_Reader('test.xls', true);
    	$temp = $data->dumptoarray();
    	debug($temp);
	}
	public function show(){
		//$data = new Spreadsheet_Excel_Reader('test.xls', true);
		$data = new Spreadsheet_Excel_Reader("test.xls",true,"UTF-16");
    	$this->set('data', $data);
	}
}
