<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    public function beforeFilter()
    {
    	$this->layout = "admin";
        $controller = strtolower($this->params['controller']);
        $action     = $this->action;
        if(!$this->Session->check('id') && $action !="login")
        {
            
            $this->redirect("/Pages/login");
        }
        else{
            $username= $this->Session->read('username');
            $user_id=$this->Session->read('id');
            $role = $this->Session->read('role');
            $this->set(compact('username','user_id','role'));
        }
        /**
         * acl
         */
        $allowController = array('pages', 'errors');
        if (!in_array($controller, $allowController)) {
            switch ($role) {
                case '1':
                    if ($controller != 'system_admins') {
                        $this->Session->setFlash(__(PERMISSION_ERROR));
                        return $this->redirect(array('controller' => 'errors', 'action' => 'index'));
                    }
                    break;
                case '2':
                    if ($controller != 'sub_admins') {
                        $this->Session->setFlash(__(PERMISSION_ERROR));
                        return $this->redirect(array('controller' => 'errors', 'action' => 'index'));
                    }
                    break;
                case '3':
                    if ($controller != 'school_admins') {
                        $this->Session->setFlash(__(PERMISSION_ERROR));
                        return $this->redirect(array('controller' => 'errors', 'action' => 'index'));
                    }
                    break;
                case '4':
                    if ($controller != 'instructors') {
                        $this->Session->setFlash(__(PERMISSION_ERROR));
                        return $this->redirect(array('controller' => 'errors', 'action' => 'index'));
                    }
                    break;
                case '5':
                    if ($controller != 'pupils') {
                        $this->Session->setFlash(__(PERMISSION_ERROR));
                        return $this->redirect(array('controller' => 'errors', 'action' => 'index'));
                    }
                    break;
            }
        }
        
    }

    public function appError($error) {
        $this->redirect("/Errors/index");
    }

}
