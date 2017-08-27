<?php
App::uses('AppController', 'Controller');

class ErrorsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = false;
	}
}