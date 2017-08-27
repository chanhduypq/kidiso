<?php
App::uses('AppController', 'Controller');
/**
 * SubAdmins Controller
 *
 * @property SubAdmin $SubAdmin
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SubAdminsController extends AppController {

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
		$this->loadModel('SchoolAdmin');
		$this->SchoolAdmin->recursive = -1;
		$this->Paginator->settings = array(
				'fields' => array(
					'School.name',
					'School.id',
					'District.city_name',
					'SchoolAdmin.id',
					'SchoolAdmin.school_admin_username',
					'SchoolAdmin.school_admin_name',
					'SchoolAdmin.school_admin_email'
				),
				'joins' => array(
					array(
						'table' => 'school',
						'alias' => 'School',
						'type' => 'inner',
						'conditions' => array('School.id = SchoolAdmin.school_id')
					),
					array(
						'table' => 'district',
						'alias' => 'District',
						'type' => 'inner',
						'conditions' => array('District.id = School.district_id')
					)
				),
				'limit' => LIMIT_ITEM,
				'order' => array(
					'SchoolAdmin.id' => 'desc'
				)
			);
			$schoolAdmins = $this->Paginator->paginate('SchoolAdmin');
			$this->set('schoolAdmins', $schoolAdmins);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SubAdmin->exists($id)) {
			throw new NotFoundException(__('Invalid sub admin'));
		}
		$options = array('conditions' => array('SubAdmin.' . $this->SubAdmin->primaryKey => $id));
		$this->set('subAdmin', $this->SubAdmin->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->autoRender = false;
		$this->loadModel('SchoolAdmin');
		if ($this->request->is('post')) {
			$this->request->data['SchoolAdmin']['school_admin_password'] = md5($this->request->data['SchoolAdmin']['school_admin_password']);
			$this->SchoolAdmin->create();
			if ($this->SchoolAdmin->save($this->request->data)) {
				$this->Session->setFlash(__('The school admin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The school admin could not be saved. Please, try again.'));
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
		// debug($this->request->data);
		if ($this->request->is(array('post', 'put'))) {
			$id = $this->request->data['SubAdmin']['id'];
			$getUserPassword = $this->SubAdmin->find('first', array('conditions' => array('SubAdmin.id' => $id), 'fields'=>array('SubAdmin.sub_admin_password')));
			$getPassword = $getUserPassword['SubAdmin']['sub_admin_password'];
			if ($this->request->data['SubAdmin']['sub_admin_password'] != $getPassword) {
				$this->request->data['SubAdmin']['sub_admin_password'] = md5($this->request->data['SubAdmin']['sub_admin_password']);
			}
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
		return $this->redirect(array('action' => 'index'));
	}

/**
 * add_school method
 *
 * @return void
 */
	public function add_school() {
		$this->loadModel('School');
		$this->autoRender = false;
		if ($this->request->is('post')) {
			$this->School->create();
			if ($this->School->save($this->request->data)) {
				$this->Session->setFlash(__('The school has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The school could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit school method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit_school($id = null) {
		$this->loadModel('School');
		$this->autoRender = false;
		if (!$this->School->exists($id)) {
			throw new NotFoundException(__('Invalid school'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->School->save($this->request->data)) {
				$this->Session->setFlash(__('The school has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The school could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('School.' . $this->School->primaryKey => $id));
			$this->request->data = $this->School->find('first', $options);
		}
		$districts = $this->School->District->find('list');
		$this->set(compact('districts'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit_school_admin($id = null) {
		$this->loadModel('SchoolAdmin');
		if (!$this->SchoolAdmin->exists($id)) {
			throw new NotFoundException(__('Invalid school admin'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SchoolAdmin->save($this->request->data)) {
				$this->Session->setFlash(__('The school admin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The school admin could not be saved. Please, try again.'));
			}
		}
	}


/**
 * delete school admin method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete_school_admin($id = null) {
		$this->loadModel('SchoolAdmin');
		$this->SchoolAdmin->id = $id;
		if (!$this->SchoolAdmin->exists()) {
			throw new NotFoundException(__('Invalid school admin'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SchoolAdmin->delete()) {
			$this->Session->setFlash(__('The school admin has been deleted.'));
		} else {
			$this->Session->setFlash(__('The school admin could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * add school form action
 *
 */
	public function add_school_form()
	{
		$this->loadModel('District');
		$this->set('District', $this->District->find('list'));
		
		$form_action = 'add_school';
		$this->set('form_action', $form_action);
		$this->request->data['School']['district_id'] = '';
		$this->render('add_school');
	}


/**
 * display profile method
 * 
 */
	public function display_profile()
	{
		// $this->autoRender = false;
		$subAdmin = $this->SubAdmin->findById($this->Session->read('id'));
		$this->set('subAdmin', $subAdmin);
		// debug($subAdmin);
	}

/**
 * load form edit method
 */
	public function load_form_edit()
	{
		$subAdmin = $this->SubAdmin->findById($this->Session->read('id'));
		$this->set('subAdmin', $subAdmin);
	}

/**
 * search school admin method
 */
	public function search()
	{
		$this->loadModel('SchoolAdmin');
		$this->SchoolAdmin->recursive = -1;
		if ($this->RequestHandler->isAjax()) {
			$keyword = isset($this->params->query['keyword'])?$this->params->query['keyword']:'';
			$conditions = array();
			$this->Paginator->settings = array(
				'fields' => array(
					'School.name',
					'School.id',
					'District.city_name',
					'SchoolAdmin.id',
					'SchoolAdmin.school_admin_username',
					'SchoolAdmin.school_admin_name',
					'SchoolAdmin.school_admin_email'
				),
				'joins' => array(
					array(
						'table' => 'school',
						'alias' => 'School',
						'type' => 'inner',
						'conditions' => array('School.id = SchoolAdmin.school_id')
					),
					array(
						'table' => 'district',
						'alias' => 'District',
						'type' => 'inner',
						'conditions' => array('District.id = School.district_id')
					)
				),
				'limit' => LIMIT_ITEM,
				'order' => array(
					'SchoolAdmin.id' => 'desc'
				),
				'conditions' => array('OR' => array(
					'SchoolAdmin.school_admin_username LIKE' => "%$keyword%",
					'SchoolAdmin.school_admin_name LIKE' => "%$keyword%",
					'School.name LIKE' => "%$keyword%",
					'District.city_name LIKE' => "%$keyword%"
					))
			);
			$schoolAdmins = $this->Paginator->paginate('SchoolAdmin');
			$this->set('schoolAdmins', $schoolAdmins);
			$this->render('index');
		}
	}

/**
 * add an user method
 */

	public function add_an_user()
	{
		$form_action = 'add';
		$this->set('form_action', $form_action);

		$this->loadModel('School');
		$schools = $this->School->find('list');
		// debug($schools);
		$this->set('schools', $schools);
		$this->request->data['SchoolAdmin']['school_admin_password'] = '';
	}

/**
 * load form edit school admin method
 */

	public function load_edit_school_admin($id)
	{
		$form_action = 'edit_school_admin';
		$this->set('form_action', $form_action);
		$this->loadModel('SchoolAdmin');
		$this->loadModel('School');
		// $this->SchoolAdmin->recursive = -1;
		if ($this->RequestHandler->isAjax()) {
			$schoolAdmin = $this->SchoolAdmin->find('first', array('conditions' => array('SchoolAdmin.id' => $id)));
			$this->request->data = $schoolAdmin;
			$schools = $this->School->find('list');
			$this->set('schools', $schools);
			$this->render('add_an_user');
		}
	}

/**
 * view school method
 */
	public function view_school()
	{
		$this->loadModel('School');
		$this->School->recursive = 2;
		$id = $this->request->data['id'];
		$school = $this->School->find('first', array('conditions' => array('School.id' => $id)));
		$this->set('school', $school);

	}

/**
 * load edit school method
 */
	public function load_edit_school()
	{
		$this->loadModel('School');
		$this->loadModel('District');
		$form_action = 'edit_school';
		$this->set('form_action', $form_action);
		$id = $this->request->data['id'];
		$this->request->data = $this->School->findById($id);
		$districts = $this->District->find('list');
		$this->set('District', $districts);
		$this->render('add_school');
	}

/**
 * check username method
 */

	public function check_username()
	{
		$this->loadModel('SchoolAdmin');
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {
			$username = trim($this->request->data['username']);
			$query = $this->SchoolAdmin->find('first', array('conditions' => array('SchoolAdmin.school_admin_username' => $username)));
			if (!empty($query)) {
				echo 'false';
			}
			else {
				echo 'true';
			}
		}
	}

/**
 * check email available method
 * 
 */

	public function check_email()
	{
		$this->loadModel('SchoolAdmin');
		$this->autoRender =  false;
		if ($this->RequestHandler->isAjax()) {
			$email = trim($this->request->data['email']);
			$query = $this->SchoolAdmin->find('first', array('conditions' => array('SchoolAdmin.school_admin_email' => $email)));
			if (!empty($query)) {
				echo 'false';
			}
			else {
				echo 'true';
			}
		}
	}
}
