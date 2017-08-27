<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {
     public $components = array('Cookie','Session');   

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    
/*	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}*/
    public function beforeFilter()
    {
       parent::beforeFilter();
       $this->Cookie->type('rijndael');
    }
    public function index()
    {
       $this->layout="admin";
       $this->layout="front";
    }
    public function login($id = 0)
    {
        $title_for_layout="";
        $this->layout=false;
        $username='';
        $password='';
        $role ='';
        $remember= 0;
        if($id==0)
        {
            $this->redirect('/admin');
        } 
        if($this->request->is('POST'))
        {
            $username= $this->request->data['user_name'];
            $password= $this->request->data['password'];
            $role= $this->request->data['role'];
            
            
            switch($role)
            {
                case 1: $this->loadModel('SystemAdmin') ;
                        $system_admin = $this->SystemAdmin->find('first',array('conditions'=>array('SystemAdmin.system_username'=>$username,'SystemAdmin.system_password'=>md5($password))));
                        if(!empty($system_admin))
                        {
                            $this->Session->write('username',$username);
                            $this->Session->write('password',$password);
                            $this->Session->write('role',$role);
                            $this->Session->write('id',$system_admin['SystemAdmin']['id']);
                            $this->autoLogin();
                            $this->redirect("/System_Admins/");
                        }
                        else{
                            $this->Session->setFlash(LOGIN_ERROR);
                            $this->redirect('/admin');
                        }  
                                    break;
                case 2: 
                        $this->loadModel('SubAdmin') ;
                        $sub_admin = $this->SubAdmin->find('first',array('conditions'=>array('OR'=>array('SubAdmin.sub_admin_email'=>$username,'SubAdmin.sub_admin_username'=>$username),'SubAdmin.sub_admin_password'=>md5($password))));
                        if(!empty($sub_admin))
                        {
                            $this->Session->write('username',$username);
                            $this->Session->write('password',$password);
                            $this->Session->write('role',$role);
                            $this->Session->write('id',$sub_admin['SubAdmin']['id']);
                            $this->autoLogin();
                            $this->redirect("/Sub_Admins/");
                        }
                        else{
                            $this->Session->setFlash(LOGIN_ERROR);
                            $this->redirect('/admin');
                        } 
                        break;
                case 3: $this->loadModel('SchoolAdmin') ;
                        $school_admin = $this->SchoolAdmin->find('first',array('conditions'=>array('OR'=>array('SchoolAdmin.school_admin_email'=>$username,'SchoolAdmin.school_admin_username'=>$username),'SchoolAdmin.school_admin_password'=>md5($password))));
                        if(!empty($school_admin))
                        {
                            $this->Session->write('username',$username);
                            $this->Session->write('password',$password);
                            $this->Session->write('role',$role);
                            $this->Session->write('id',$school_admin['SchoolAdmin']['id']);
                            $this->Session->write('school_id',$school_admin['SchoolAdmin']['school_id']);
                            $this->autoLogin();
                            $this->redirect("/School_Admins/");
                        }
                        else{
                            $this->Session->setFlash(LOGIN_ERROR);
                            $this->redirect('/school');
                        } 
                        break;
                
                case 4: $this->loadModel('Instructor') ;
                        $teacher = $this->Instructor->find('first',array('conditions'=>array('Instructor.instructor_username'=>$username,'Instructor.instructor_password'=>md5($password))));
                        if(!empty($teacher))
                        {
                            $this->Session->write('username',$username);
                            $this->Session->write('password',$password);
                            $this->Session->write('role',$role);
                            $this->Session->write('id',$teacher['Instructor']['id']);
                            $this->Session->write('teacher_name',$teacher['Instructor']['name']);
                            $this->Session->write('school_id',$teacher['Instructor']['school_id']);
                            $this->autoLogin();
                            $this->redirect("/Instructors/");
                        }
                        else{
                            $this->Session->setFlash(LOGIN_ERROR);
                            $this->redirect('/teacher');
                        } 
                        break;
                case 5: $this->loadModel('Pupil');
                        $pupil = $this->Pupil->find('first',array('conditions'=>array('Pupil.pupil_username'=>$username,'Pupil.pupil_password'=>md5($password))));
                        if(!empty($pupil))
                        {
                            $this->Session->write('username',$username);
                            $this->Session->write('password',$password);
                            $this->Session->write('role',$role);
                            $this->Session->write('id',$pupil['Pupil']['id']);
                            $this->autoLogin();
                            $this->redirect("/pupils/pupil");
                        }
                        else{
                            $this->Session->setFlash(LOGIN_ERROR);
                            $this->redirect('/pupil');
                        } 
                        break;        
            }
        }
        if($this->Cookie->check('autologin'))
        {
            $data = $this->Cookie->read('autologin');
            if(!empty($data))
            {
                $username = $data['user_name'];
                $password = $data['password'];
                $role= $data['role'];
                $remember = 1;
            }
            
        } 
        $this->set(compact('title_for_layout','username','password','role','remember','id'));
    }
    public function logout()
    {
        $role = $this->Session->read('role');
        $this->Session->destroy();
        switch($role)
        {
            case 1: $this->redirect("/admin");break;
            case 3: $this->redirect("/school");break;
            case 4: $this->redirect("/teacher");break;
            case 5: $this->redirect("/pupil");break;
            default: $this->redirect("/admin");
        }
        
    }
    protected function autoLogin() {
        if (!$this->request->data('remember_me')) {
            $this->Cookie->delete('autologin');
            return false;
        }
        $data = array(
            'user_name' => $this->request->data['user_name'],
            'password' => $this->request->data['password'],
            'role'     => $this->request->data['role']
        );
        $this->Cookie->write('autologin', $data, true, '+2 week');
        return true;
    }
}
