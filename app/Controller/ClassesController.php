<?php
App::uses('AppController', 'Controller');

class ClassesController extends AppController {

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
		$this->Class->recursive = 0;
		$this->set('classes', $this->Paginator->paginate());
	}
}