<?php
App::uses('AppController', 'Controller');
/**
 * SchoolAdmins Controller
 *
 * @property SchoolAdmin $SchoolAdmin
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SchoolAdminsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'RequestHandler');
	public $helpers = array('Js' => array('Jquery'), 'Paginator');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$userId = $this->Session->read('id');
		$schoolAdmin = $this->SchoolAdmin->find('first',array('conditions' => array('SchoolAdmin.id' => $userId)));
		$schoolId = $schoolAdmin['SchoolAdmin']['school_id'];
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->loadModel('Pupil');
		$userId = $this->Session->read('id');
		$schoolAdmin = $this->SchoolAdmin->find('first',array('conditions' => array('SchoolAdmin.id' => $userId)));
		$schoolId = $schoolAdmin['SchoolAdmin']['school_id'];
		// debug($schoolId);
		$this->Paginator->settings = array('limit' => LIMIT_ITEM, 'order' => array('Pupil.id' => 'desc'), 'conditions' => array('Classes.school_id' => $schoolId));
		$this->set('pupils', $this->Paginator->paginate('Pupil'));
		$this->Session->write('page_flag', 'pupil');
	}

	public function classes()
	{
		$this->loadModel('Classes');
		$userId = $this->Session->read('id');
		$schoolAdmin = $this->SchoolAdmin->find('first',array('conditions' => array('SchoolAdmin.id' => $userId)));
		$schoolId = $schoolAdmin['SchoolAdmin']['school_id'];
		$this->Paginator->settings = array('limit' => LIMIT_ITEM, 'recursive' => '2', 'order' => array('Classes.id' => 'asc'), 'conditions' => array('Classes.school_id' => $schoolId));
		$this->set('classes', $this->Paginator->paginate('Classes'));
		$this->Session->write('add_class_flag', '0');
		$this->Session->write('page_flag', 'class');
	}
	public function instructor()
	{
		$this->loadModel('Instructor');
		$userId = $this->Session->read('id');
		$schoolAdmin = $this->SchoolAdmin->find('first',array('conditions' => array('SchoolAdmin.id' => $userId)));
		$schoolId = $schoolAdmin['SchoolAdmin']['school_id'];
		$this->Paginator->settings = array('limit' => LIMIT_ITEM, 'order' => array('Instructor.id' => 'desc'), 'conditions' => array('Instructor.school_id' => $schoolId));
		$this->set('instructors', $this->Paginator->paginate('Instructor'));
		$this->Session->write('add_instructor_flag', '0');
		$this->Session->write('page_flag', 'instructor');
	}
/**
     * add method
     *
     * @return void
     */
    public function add_pupil() {
    	$this->autoRender = false;
    	$this->loadModel('Pupil');
    	// debug($this->request->data);
        if ($this->request->is('post')) {
            $this->Pupil->create();
            $this->request->data['Pupil']['pupil_password'] = md5($this->request->data['Pupil']['pupil_password']);
            if ($this->Pupil->save($this->request->data)) {
                $this->Session->setFlash(__('The pupil has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The pupil could not be saved. Please, try again.'));
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
    public function edit_pupil($id = null) {
    	$this->autoRender = false;
    	$this->loadModel('Pupil');
        if (!$this->Pupil->exists($id)) {
            throw new NotFoundException(__('Invalid pupil'));
        }
        if ($this->request->is(array('post', 'put'))) {
        	$id = $this->request->data['Pupil']['id'];
			$getUserPassword = $this->Pupil->find('first', array('conditions' => array('Pupil.id' => $id), 'fields'=>array('Pupil.pupil_password')));
			$getPassword = $getUserPassword['Pupil']['pupil_password'];
			if ($this->request->data['Pupil']['pupil_password'] != $getPassword) {
				$this->request->data['Pupil']['pupil_password'] = md5($this->request->data['Pupil']['pupil_password']);
			}
            if ($this->Pupil->save($this->request->data)) {
                $this->Session->setFlash(__('The pupil has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The pupil could not be saved. Please, try again.'));
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
    public function delete_pupil($id = null) {
    	$this->loadModel('Pupil');
        $this->Pupil->id = $id;
        if (!$this->Pupil->exists()) {
            throw new NotFoundException(__('Invalid pupil'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Pupil->delete()) {
            $this->Session->setFlash(__('The pupil has been deleted.'));
        } else {
            $this->Session->setFlash(__('The pupil could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

/**
     * add class method
     *
     * @return void
     */
    public function add_class() {
    	$this->autoRender = false;
    	$this->loadModel('Classes');
    	// debug($this->request->data);
        if ($this->request->is('post')) {
            $this->Classes->create();
            if ($this->Classes->save($this->request->data)) {
                $this->Session->setFlash(__('The class has been saved.'));
                // return $this->redirect(array('action' => 'index'));
                $this->Session->write('add_class_flag', '1');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The class could not be saved. Please, try again.'));
            }
        }
    }

/**
     * edit class method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit_class($id = null) {
    	$this->autoRender = false;
    	$this->loadModel('Classes');
        if (!$this->Classes->exists($id)) {
            throw new NotFoundException(__('Invalid class'));
        }
        if ($this->request->is(array('post', 'put'))) {
        	$id = $this->request->data['Classes']['id'];
            if ($this->Classes->save($this->request->data)) {
                $this->Session->setFlash(__('The class has been saved.'));
                $this->Session->write('add_class_flag', '1');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The class could not be saved. Please, try again.'));
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
    public function delete_class($id = null) {
    	$this->loadModel('Classes');
        $this->Classes->id = $id;
        if (!$this->Classes->exists()) {
            throw new NotFoundException(__('Invalid class'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Classes->delete()) {
        	$this->Session->write('add_class_flag', '1');
            $this->Session->setFlash(__('The class has been deleted.'));
        } else {
            $this->Session->setFlash(__('The class could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

/**
 * add instructor method
 *
 * @return void
 */
	public function add_instructor() {
		$this->loadModel('Instructor');
		if ($this->request->is('post')) {
			$this->Instructor->create();
			$this->request->data['Instructor']['instructor_password'] = md5($this->request->data['Instructor']['instructor_password']);
			if ($this->Instructor->save($this->request->data)) {
				$this->Session->write('add_instructor_flag', '1');
				$this->Session->setFlash(__('The instructor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instructor could not be saved. Please, try again.'));
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
	public function edit_instructor($id = null) {
		$this->loadModel('Instructor');
		if (!$this->Instructor->exists($id)) {
			throw new NotFoundException(__('Invalid instructor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$password = $this->request->data['Instructor']['instructor_password'];
			$getPassword = $this->Instructor->find('first', array('conditions' => array('Instructor.id' => $id)));
			$getPassword = $getPassword['Instructor']['instructor_password'];
			if ($this->request->data['Instructor']['instructor_password'] != $getPassword) {
				$this->request->data['Instructor']['instructor_password'] = md5($this->request->data['Instructor']['instructor_password']);
			}
			if ($this->Instructor->save($this->request->data)) {
				$this->Session->write('add_instructor_flag', '1');
				$this->Session->setFlash(__('The instructor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instructor could not be saved. Please, try again.'));
			}
		}
	}

/**
 * delete instructor method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete_instructor($id = null) {
		$this->loadModel('Instructor');
		$this->Instructor->id = $id;
		if (!$this->Instructor->exists()) {
			throw new NotFoundException(__('Invalid instructor'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Instructor->delete()) {
			$this->Session->write('add_instructor_flag', '1');
			$this->Session->setFlash(__('The instructor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The instructor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * edit pupil form method
 */
	public function add_pupil_form()
	{
		$this->loadModel('Pupil');
		$this->set('form_action', 'add_pupil');
		$sex_array = array(1 => 'Male', 0 => 'Female');
		$this->set('sex_array', $sex_array);
		$userId = $this->Session->read('id');
		$schoolAdmin = $this->SchoolAdmin->find('first',array('conditions' => array('SchoolAdmin.id' => $userId)));
		$schoolId = $schoolAdmin['SchoolAdmin']['school_id'];
		$this->set('classes', $this->Pupil->Classes->find('list', array('conditions' => array('Classes.school_id' => $schoolId))));
		// $this->set('schools', $this->Pupil->Classes->School->find('list'));
		// $this->set('districts', $this->Pupil->Classes->School->District->find('list'));
		$this->render('add_pupil_form');
	}


/**
 * edit pupil form method
 */
	public function edit_pupil_form()
	{
		$this->loadModel('Pupil');
		$this->loadModel('Classes');
		$this->loadModel('School');
		$this->loadModel('District');
		$this->Pupil->recursive = 2;
		$id = $this->request->data['id'];
		$pupil = $this->Pupil->find('first', array('conditions' => array('Pupil.id' => $id)));
		$this->request->data = $pupil;
		$this->set('form_action', 'edit_pupil');
		$sex_array = array(1 => 'Male', 0 => 'Female');
		$this->set('sex_array', $sex_array);
		// $this->set('classes', $this->Classes->find('list'));
		// $this->set('schools', $this->School->find('list'));
		// $this->set('districts', $this->District->find('list'));
		$userId = $this->Session->read('id');
		$schoolAdmin = $this->SchoolAdmin->find('first',array('conditions' => array('SchoolAdmin.id' => $userId)));
		$schoolId = $schoolAdmin['SchoolAdmin']['school_id'];
		$this->set('classes', $this->Pupil->Classes->find('list', array('conditions' => array('Classes.school_id' => $schoolId))));
		// $this->set('classes', $this->Pupil->Classes->find('list'));
		// $this->set('schools', $this->Pupil->Classes->School->find('list'));
		// $this->set('districts', $this->Pupil->Classes->School->District->find('list'));
		$this->render('pupil_form');
	}

/**
 * edit class form method
 */
	public function edit_class_form()
	{
		$this->loadModel('Classes');
		$this->loadModel('Instructor');
		// $this->Classes->recursive = 2;
		$this->set('form_action', 'edit_class');
		$id = $this->request->data['id'];
		$userId = $this->Session->read('id');
		$schoolAdmin = $this->SchoolAdmin->find('first',array('conditions' => array('SchoolAdmin.id' => $userId)));
		$schoolId = $schoolAdmin['SchoolAdmin']['school_id'];
		$this->request->data = $this->Classes->find('first', array('conditions' => array('Classes.id' => $id)));
		// $this->set('schools', $this->Classes->School->find('list'));
		$this->set('instructors', $this->Classes->Instructor->find('list', array('conditions' => array('Instructor.school_id' => $schoolId))));
		// $this->set('districts', $this->Classes->School->District->find('list'));
	}

/**
 * edit instructor form method
 */
	public function edit_instructor_form()
	{
		$this->loadModel('Instructor');
		$this->set('form_action', 'edit_instructor');
		$id = $this->request->data['id'];
		$sex_array = array(1 => 'Male', 0 => 'Female');
		$this->set('sex_array', $sex_array);
		$this->request->data = $this->Instructor->find('first', array('conditions' => array('Instructor.id' => $id)));
		// $this->set('schools', $this->Instructor->School->find('list'));
		// $this->set('districts', $this->Instructor->School->District->find('list'));
	}

/**
 * add class form method
 */
	public function add_class_form()
	{
		$this->loadModel('Classes');
		$this->loadModel('Instructor');
		$this->set('form_action', 'add_class');
		$this->set('classes', $this->Classes->find('list'));
		// $this->set('schools', $this->Classes->School->find('list'));
		// $this->set('districts', $this->Classes->School->District->find('list'));
		$schoolId = $this->Session->read('school_id');
		$this->set('schoolId', $schoolId);
		$userId = $this->Session->read('id');
		$schoolAdmin = $this->SchoolAdmin->find('first',array('conditions' => array('SchoolAdmin.id' => $userId)));
		$schoolId = $schoolAdmin['SchoolAdmin']['school_id'];
		$this->Instructor->recursive = -1;
		$instructors = $this->Instructor->find('list', array('conditions' => array('Instructor.school_id' => $schoolId)));
		$this->set('instructors', $instructors);
		$this->render('add_class_form');
	}

/**
 * add teacher form method
 */
	public function add_teacher_form()
	{
		$this->loadModel('Instructor');
		$this->set('form_action', 'add_instructor');
		$sex_array = array(1 => 'Male', 0 => 'Female');
		$this->set('sex_array', $sex_array);
		$schoolId = $this->Session->read('school_id');
		$this->set('schoolId', $schoolId);
		// $this->set('classes', $this->Classes->find('list'));
		// $this->set('schools', $this->Instructor->School->find('list'));
		// $this->set('districts', $this->Instructor->School->District->find('list'));
		// $this->render('add_class_form');
	}

/**
 * get school by district id method
 */
	public function get_school()
	{
		$this->loadModel('School');
		$this->School->recursive = -1;
		$this->autoRender = false;
		$districtId = $this->request->data('districtId');
		$schools = $this->School->find('list', array('conditions' => array('School.district_id' => $districtId)));
		echo json_encode($schools);
	}

/**
 * get class by school id method
 */
	public function get_class()
	{
		$this->loadModel('Classes');
		$this->Classes->recursive = -1;
		$this->autoRender = false;
		$schoolId = $this->request->data('schoolId');
		$classes = $this->Classes->find('list', array('conditions' => array('Classes.school_id' => $schoolId)));
		echo json_encode($classes);
	}

/**
 * get class by school id method
 */
	public function get_teacher()
	{
		$this->loadModel('Instructor');
		$this->Instructor->recursive = -1;
		$this->autoRender = false;
		$schoolId = $this->request->data('schoolId');
		$instructors = $this->Instructor->find('list', array('conditions' => array('Instructor.school_id' => $schoolId)));
		echo json_encode($instructors);
	}

/**
 * check pupil username method
 */
	public function check_pupil_username()
	{
		$this->autoRender = false;
		$this->loadModel('Pupil');
		$pupil_username = trim($this->request->data['pupil_username']);
		if ($this->RequestHandler->isAjax()) {
			$query = $this->Pupil->find('first', array('conditions' => array('Pupil.pupil_username' => $pupil_username)));
			if (!empty($query)) {
				echo 'false';
			}
			else {
				echo 'true';
			}
		}

	}

/**
 * check class name exists
 */
	public function check_class_name()
	{
		$this->autoRender = false;
		$this->loadModel('Classes');
		$schoolId = $this->Session->read('school_id');
		$classId = trim($this->request->data['classId']);
		if ($this->RequestHandler->isAjax()) {
			$query = $this->Classes->find('first', array('conditions' => array('Classes.class_name' => $classId, 'Classes.school_id' => $schoolId)));
			// var_dump($this->Classes->getDataSource()->getLog(false, false));
			if (!empty($query)) {
				echo 'false';
			}
			else {
				echo 'true';
			}
		}
	}

/**
 * check instructor username exists
 */
	public function check_instructor_username()
	{
		$this->autoRender = false;
		$this->loadModel('Instructor');
		$instructor_username = trim($this->request->data['instructor_username']);
		if ($this->RequestHandler->isAjax()) {
			$query = $this->Instructor->find('first', array('conditions' => array('Instructor.instructor_username' => $instructor_username)));
			if (!empty($query)) {
				echo 'false';
			}
			else {
				echo 'true';
			}
		}
	}

/**
 * check instructor email exists
 */
	public function check_instructor_email()
	{
		$this->autoRender = false;
		$this->loadModel('Instructor');
		$email = trim($this->request->data['email']);
		if ($this->RequestHandler->isAjax()) {
			$query = $this->Instructor->find('first', array('conditions' => array('Instructor.email' => $email)));
			if (!empty($query)) {
				echo 'false';
			}
			else {
				echo 'true';
			}
		}
	}

/**
 * search method
 */
	public function search()
	{
		$this->loadModel('Classes');
		$this->loadModel('Instructor');
		$this->loadModel('Pupil');
		$userId = $this->Session->read('id');
		$schoolAdmin = $this->SchoolAdmin->find('first',array('conditions' => array('SchoolAdmin.id' => $userId)));
		$schoolId = $schoolAdmin['SchoolAdmin']['school_id'];
		if ($this->RequestHandler->isAjax()) {
			$key_word = isset($this->params->query['key_word'])?$this->params->query['key_word']:'';
			$page_flag = $this->Session->read('page_flag');
			$conditions = array();
			if ($page_flag == 'pupil') {
				$conditions = array('OR' => array('Pupil.pupil_username LIKE' => "%$key_word%", 'Pupil.name LIKE' => "%$key_word%", 'Classes.class_name' => "$key_word"), 'Classes.school_id' => $schoolId);
				$this->Paginator->settings = array('limit' => LIMIT_ITEM, 'order' => array('Pupil.id' => 'desc'), 'conditions' => $conditions);
				$pupils = $this->Paginator->paginate('Pupil');
				$this->set('pupils', $pupils);
				$this->render('index');
			} else if ($page_flag == 'class') {
				$this->Classes->recursive = 2;
				$conditions = array('OR' => array('Classes.class_name LIKE' => "%$key_word%", 'Classes.description LIKE' => "%$key_word%", 'School.name LIKE' => "%$key_word%", 'District.city_name LIKE' => "%$key_word%", 'Instructor.name LIKE' => "%$key_word%"), 'Classes.school_id' => $schoolId);
				$this->Paginator->settings = array(
					'joins' => array(
						array(
							'table' => 'district',
							'alias' => 'District',
							'type' => 'left',
							'conditions' => array('School.district_id = District.id')
						)
					),
					'limit' => LIMIT_ITEM,
					'order' => array('Classes.id' => 'asc'),
					'conditions' => $conditions);
				// debug($this->Classes->getDataSource()->getLog(false, false));
				$this->set('classes', $this->Paginator->paginate('Classes'));
				$this->render('classes');
			} else if($page_flag == 'instructor') {
				$conditions = array('OR' => array('Instructor.instructor_username LIKE' => "%$key_word%", 'Instructor.name LIKE' => "%$key_word%", 'Instructor.description LIKE' => "%$key_word%", 'Instructor.email LIKE' => "%$key_word%", 'School.name LIKE' => "%$key_word%"), 'Instructor.school_id' => $schoolId);
				$this->Paginator->settings = array('limit' => LIMIT_ITEM, 'order' => array('Instructor.id' => 'desc'), 'conditions' => $conditions);
				$this->set('instructors', $this->Paginator->paginate('Instructor'));
				$this->render('instructor');
			}
		}
	}
}
