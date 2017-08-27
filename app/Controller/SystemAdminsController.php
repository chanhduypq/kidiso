<?php
App::uses('AppController', 'Controller');
/**
 * SystemAdmins Controller
 *
 * @property SystemAdmin $SystemAdmin
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SystemAdminsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'RequestHandler');
	public $helpers = array('Js' => array('Jquery'), 'Paginator');

	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->loadModel('SubAdmin');
		$this->SubAdmin->recursive = 2;
		$this->Paginator->settings = array('limit' => LIMIT_ITEM, 'order' => array(
            'SubAdmin.id' => 'desc'
        ));
		$subAdmins = $this->Paginator->paginate('SubAdmin');
		$this->set('subAdmins', $subAdmins);
		
		// Load City
		$this->loadModel('District');
		$this->District->recursive = -1;
		$this->set('districts', $this->District->find('list'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SystemAdmin->exists($id)) {
			throw new NotFoundException(__('Invalid system admin'));
		}
		$options = array('conditions' => array('SystemAdmin.' . $this->SystemAdmin->primaryKey => $id));
		$this->set('systemAdmin', $this->SystemAdmin->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->autoRender = false;
		$this->loadModel('SubAdmin');
		if ($this->request->is('post')) {
			$this->SubAdmin->create();
			$this->request->data['SubAdmin']['district_id'] = $this->request->data['SubAdmin']['District'];
			$this->request->data['SubAdmin']['sub_admin_password'] = md5($this->request->data['SubAdmin']['sub_admin_password']);
			if ($this->SubAdmin->save($this->request->data)) {
				$this->Session->setFlash(__('The sub admin has been saved.'));
				return $this->redirect(array('controller' => 'system_admins','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sub admin could not be saved. Please, try again.'));
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
	public function edit($id = null) {
		$this->autoRender = false;
		$this->loadModel('SubAdmin');
		$id = $this->request->data['SubAdmin']['id'];
		$getUserPassword = $this->SubAdmin->find('first', array('conditions' => array('SubAdmin.id' => $id), 'fields'=>array('SubAdmin.sub_admin_password')));
		$getPassword = $getUserPassword['SubAdmin']['sub_admin_password'];
		if ($this->request->data['SubAdmin']['sub_admin_password'] != $getPassword) {
			$this->request->data['SubAdmin']['sub_admin_password'] = md5($this->request->data['SubAdmin']['sub_admin_password']);
		}
		// var_dump($getPassword);
		$this->request->data['SubAdmin']['district_id'] = $this->request->data['SubAdmin']['District'];
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SubAdmin->save($this->request->data)) {
				$this->Session->setFlash(__('The sub admin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sub admin could not be saved. Please, try again.'));
			}
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->loadModel('SubAdmin');
		$this->SubAdmin->id = $id;
		if (!$this->SubAdmin->exists()) {
			throw new NotFoundException(__('Invalid sub admin'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SubAdmin->delete()) {
			$this->Session->setFlash(__('The sub admin has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sub admin could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller' => 'system_admins', 'action' => 'index'));
	}

/*
 * check sub admin email available
 */
	public function check_email()
	{
		$this->loadModel('SubAdmin');
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			$email = trim($this->request->data['email']);
			$conditions = array('SubAdmin.sub_admin_email' => $email);
			$query = $this->SubAdmin->find('first', array('conditions' => $conditions));
			if (!empty($query)) {
				return 1;
			}
		}
	}

/*
 * check sub admin username available
 */
	public function check_username()
	{
		$this->loadModel('SubAdmin');
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			$username = trim($this->request->data['username']);
			$conditions = array('SubAdmin.sub_admin_username' => $username);
			$query = $this->SubAdmin->find('first', array('conditions' => $conditions));
			if (!empty($query)) {
				echo 'false';
			}
			else {
				echo 'true';
			}
		}
	}

/*
 * get data for form edit
 */
	public function load_data_edit($id)
	{
		$this->loadModel('SubAdmin');
		$this->loadModel('District');
		// $this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			$options = array('conditions' => array('SubAdmin.id' => $id));
			$subAdmin = $this->SubAdmin->find('first', $options);
			$this->set('subAdmin', $subAdmin);
			// return $subAdmin;
			// 
			// Load City
			
			// $this->District->recursive = -1;
			$this->set('District', $this->District->find('list'));
		}
	}

/*
 * get add form
 */
	public function load_data_add()
	{
		$this->loadModel('District');
		$this->District->recursive = -1;
		$this->set('districts', $this->District->find('list'));
	}

	///////////////////////////////
	// search data by input data //
	///////////////////////////////
	public function search()
	{
		$this->loadModel('SubAdmin');
		$this->SubAdmin->recursive = 2;
		if ($this->RequestHandler->isAjax()) {
			$searchInput = isset($this->params->query['dataSearch'])?$this->params->query['dataSearch']:'';
			$conditions = array();
			if (!empty($searchInput)) {
				$conditions = array('OR' => array(
								'SubAdmin.sub_admin_username LIKE' => "%$searchInput%",
								'SubAdmin.sub_admin_email LIKE' => "%$searchInput%",
								'District.city_name' => "$searchInput"
								)
							);
			}
			$this->Paginator->settings = array(
				'limit' => LIMIT_ITEM,
				'order' => array(
	            	'SubAdmin.id' => 'desc'
	        	),
	        	'conditions' => $conditions);
			$subAdmins = $this->Paginator->paginate('SubAdmin');
			$this->set('subAdmins', $subAdmins);
			$this->render('index');
		}
		
	}
}
