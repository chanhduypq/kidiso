<?php

App::uses('AppController', 'Controller');

/**
 * Pupils Controller
 *
 * @property Pupil $Pupil
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PupilsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $action = $this->action;
        if (
                in_array($action, $this->front_action_array)
        ) {
            $this->layout = "front";
        } else {
            $this->layout = "admin";
        }
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');
    private $front_action_array = array(
        "pupil",
        "pupil4",
        "pupil5",
        "pupil6",
        "pupil8",
        "pupil10",
        "pupil11",
        "pupil12",
        "pupil13",
        "pupil14",
        "pupil15",
        "pupil16",
        "pupil17",
        "pupil18",
        "pupil20",
        "pupil21",
        "pupil22",
        "pupil23",
        "pupil24",
        "pupil25",
        "pupil26",
        "pupil27",
        "pupil28",
        "pupil30",
        "pupil31",
        "pupil32",
        "pupil33",
        "pupil34",
        "pupil35",
        "pupil36",
        "pupil37",
        "pupil38",
        "pupil40",
        "pupil41",
        "pupil42",
        "pupil43",
        "pupil44",
        "pupil45",
        "pupil46",
        "pupil47",
    );

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Pupil->recursive = 0;
        $this->set('pupils', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Pupil->exists($id)) {
            throw new NotFoundException(__('Invalid pupil'));
        }
        $options = array('conditions' => array('Pupil.' . $this->Pupil->primaryKey => $id));
        $this->set('pupil', $this->Pupil->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Pupil->create();
            if ($this->Pupil->save($this->request->data)) {
                $this->Session->setFlash(__('The pupil has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The pupil could not be saved. Please, try again.'));
            }
        }
        $classes = $this->Pupil->Classes->find('list');
        $this->set(compact('classes'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Pupil->exists($id)) {
            throw new NotFoundException(__('Invalid pupil'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Pupil->save($this->request->data)) {
                $this->Session->setFlash(__('The pupil has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The pupil could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Pupil.' . $this->Pupil->primaryKey => $id));
            $this->request->data = $this->Pupil->find('first', $options);
        }
        $classes = $this->Pupil->Classes->find('list');
        $this->set(compact('classes'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
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

    public function pupil4() {
        
    }

    public function pupil5() {
        
    }

    public function pupil6() {
        
    }

    public function pupil11() {
        $pupil_id = $this->Session->read('id');
        $pdca_id = "";
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $item_id_array = $data['item_id'];
            $pdca_measurement_id_array = $data['pdca_measurement_id'];
            $before_value_array = $data['before_value'];
            $pdca_id = $data['pdca_id'];

            if (is_array($item_id_array) && count($item_id_array) > 0) {
                $this->loadModel('PdcaMeasurement');
                for ($i = 0, $n = count($item_id_array); $i < $n; $i++) {
                    $row = array(
                        'id' => $pdca_measurement_id_array[$i],
                        'pdca_id' => $pdca_id,
                        'type' => 1,
                        'measurement_type' => 2,
                        'item_id' => $item_id_array[$i],
                        'value_before' => $before_value_array[$i],
                    );
                    $this->PdcaMeasurement->savePdcaMesurement($row);
                }
            }
        }
        if ($pdca_id == "") {
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
        }
        $items = $this->Pupil->get_all_items_date($pdca_id, $item_type = 1);

        $this->set(compact('items'));
        $this->set(compact('pdca_id'));
    }

    public function pupil8() {
        
    }

    public function pupil12() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $item_id_array = $data['item_id'];
            $pdca_measurement_id_array = $data['pdca_measurement_id'];
            $before_value_array = $data['before_value'];
            $before_date_array = $data['before_date'];
            $pdca_id = $data['pdca_id'];

            if (is_array($item_id_array) && count($item_id_array) > 0) {
                $this->loadModel('PdcaMeasurement');
                for ($i = 0, $n = count($item_id_array); $i < $n; $i++) {
                    if (trim($before_date_array[$i]) != "") {
                        $temp = explode("/", $before_date_array[$i]);
                        $date = $temp[2] . '-' . $temp[1] . '-' . $temp[0] . ' 01:01:01';
                        $row = array(
                            'id' => $pdca_measurement_id_array[$i],
                            'pdca_id' => $pdca_id,
                            'type' => 1,
                            'measurement_type' => 1,
                            'item_id' => $item_id_array[$i],
                            'date_before' => $date,
                            'value_before' => ((trim($before_value_array[$i]) == "") ? 0 : $before_value_array[$i])
                        );
                        $this->PdcaMeasurement->savePdcaMesurement($row);
                    }
                }
            }
        }
    }

    public function pupil13() {
        $pupil_id = $this->Session->read('id');
        $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");        
        $pdca_id = $row[0]['pdca']['id'];
        $row = $this->Pupil->query("select plan_content from pdca_comment where pdca_id=$pdca_id and type=1");
        if(is_array($row)&&count($row)>0){
            $plan_content = $row[0]['pdca_comment']['plan_content'];
        }
        else{
            $plan_content = '';
        }
        $items = $this->Pupil->get_all_items_date($pdca_id, $item_type = 1);
        $this->set(compact('items'));
        $this->set(compact('pdca_id'));
        $this->set(compact('plan_content'));
    }

    public function pupil14() {
        $pupil_id = $this->Session->read('id');
        $pdca_id = "";
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $plan_content = $data['plan_content'];
            $item_id_array = $data['item_id'];
            $pdca_measurement_id_array = $data['pdca_measurement_id'];
            $after_value_array = $data['after_value'];
            $after_date_array = $data['after_date'];
            $pdca_id = $data['pdca_id'];

            if (is_array($item_id_array) && count($item_id_array) > 0) {
                $this->loadModel('PdcaMeasurement');
                for ($i = 0, $n = count($item_id_array); $i < $n; $i++) {
                    if (trim($after_date_array[$i]) != "") {
                        $temp = explode("/", $after_date_array[$i]);
                        $date = $temp[2] . '-' . $temp[1] . '-' . $temp[0] . ' 01:01:01';
                        $row = array(
                            'id' => $pdca_measurement_id_array[$i],
                            'pdca_id' => $pdca_id,
                            'type' => 1,
                            'measurement_type' => 1,
                            'item_id' => $item_id_array[$i],
                            'date_after' => $date,
                            'value_after' => ((trim($after_value_array[$i]) == "") ? 0 : $after_value_array[$i])
                        );
                        $this->PdcaMeasurement->savePdcaMesurement($row);
                    }                    
                }
            }
            if ($plan_content != "") {
                if ($pdca_id == "") {
                    $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
                    $pdca_id = $row[0]['pdca']['id'];
                }
                $this->loadModel('PdcaComment');
                $row = $this->Pupil->query("select id from pdca_comment where pdca_id=$pdca_id");
                if(is_array($row)&&count($row)>0){
                    $id=$row[0]['pdca_comment']['id'];
                }
                else{
                    $id='';
                }
                $this->PdcaComment->set('id', $id);
                $this->PdcaComment->set('pdca_id', $pdca_id);
                $this->PdcaComment->set('plan_content', $plan_content);
                $this->PdcaComment->set('type', 1);
                $this->PdcaComment->save();
            }
        }
        if ($pdca_id == "") {
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
        }
        $items = $this->Pupil->get_all_items_123($pdca_id, $item_type = 1);
        $this->set(compact('items'));
        $this->set(compact('pdca_id'));
    }

    public function pupil15() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $item_id_array = $data['item_id'];
            $pdca_measurement_id_array = $data['pdca_measurement_id'];
            $after_value_array = $data['after_value'];
            $pdca_id = $data['pdca_id'];            
            if (is_array($item_id_array) && count($item_id_array) > 0) {
                $this->loadModel('PdcaMeasurement');
                for ($i = 0, $n = count($item_id_array); $i < $n; $i++) {
                    $row = array(
                        'id' => $pdca_measurement_id_array[$i],
                        'pdca_id' => $pdca_id,
                        'type' => 1,
                        'measurement_type' => 2,
                        'item_id' => $item_id_array[$i],
                        'value_after' => $after_value_array[$i]
                    );                    
                    $this->PdcaMeasurement->savePdcaMesurement($row);
                }
            }           
        }
        if (!isset($pdca_id)) {
            $pupil_id = $this->Session->read('id');
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
        }
        $row=$this->Pupil->query("select sum(value_before) as sum from pdca_measurement where pdca_id=$pdca_id and type=1 and measurement_type=2");
        $row=$row[0];
        $before_value_sum_measurement_type2=$row[0]['sum'];
        $row=$this->Pupil->query("select sum(value_after) as sum from pdca_measurement where pdca_id=$pdca_id and type=1 and measurement_type=2");
        $row=$row[0];
        $after_value_sum_measurement_type2=$row[0]['sum'];
        $items=$this->Pupil->query("select value_before from pdca_measurement where pdca_id=$pdca_id and type=1 and measurement_type=1 order by pdca_measurement.id limit 0,7");
        $before_value_sum_measurement_type1=0;
        $before_value_array=array();        
        if(is_array($items)&&count($items)>0){
            foreach ($items as $item){
                $before_value_array[]=$item['pdca_measurement']['value_before'];
                $before_value_sum_measurement_type1+=$item['pdca_measurement']['value_before'];
            }            
        }
        $items=$this->Pupil->query("select value_after from pdca_measurement where pdca_id=$pdca_id and type=1 and measurement_type=1 order by pdca_measurement.id limit 0,7");
        $after_value_sum_measurement_type1=0;
        $after_value_array=array();
        if(is_array($items)&&count($items)>0){
            foreach ($items as $item){
                $after_value_array[]=$item['pdca_measurement']['value_after'];
                $after_value_sum_measurement_type1+=$item['pdca_measurement']['value_after'];
            }            
        }
        $row=$this->Pupil->query("select family_member_no from pupil where id=".$this->Session->read('id'));
        $row=$row[0];
        $family_member_no=$row['pupil']['family_member_no'];
        if($family_member_no==''){
            $family_member_no=1;
        }
        $this->set(compact('before_value_sum_measurement_type2'));
        $this->set(compact('after_value_sum_measurement_type2'));
        $this->set(compact('before_value_sum_measurement_type1'));
        $this->set(compact('after_value_sum_measurement_type1'));
        $this->set(compact('before_value_array'));
        $this->set(compact('after_value_array'));        
        $this->set(compact('family_member_no'));        
    }

    public function pupil16() {
        $pupil_id = $this->Session->read('id');        
        $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");        
        
        $pdca_id = $row[0]['pdca']['id'];        
        $row = $this->Pupil->query("select pupil_achieve,pupil_improve,pupil_comment from pdca_comment where pdca_id=$pdca_id and type=1");        
        if(is_array($row)&&count($row)>0){
            $pupil_achieve = $row[0]['pdca_comment']['pupil_achieve'];
            $pupil_improve = $row[0]['pdca_comment']['pupil_improve'];
            $pupil_comment = $row[0]['pdca_comment']['pupil_comment'];   
        }
        else{
            $pupil_achieve = '';
            $pupil_improve = '';
            $pupil_comment = '';   
        }        
        $this->set(compact('pupil_achieve'));
        $this->set(compact('pupil_improve'));        
        $this->set(compact('pupil_comment'));        
    }

    public function pupil17() {
        if ($this->request->is('post')) {
            $pupil_id = $this->Session->read('id');
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
            $data = $this->request->data;
            $pupil_achieve = $data['pupil_achieve'];
            $pupil_improve = $data['pupil_improve'];
            $pupil_comment = $data['pupil_comment'];          
            $this->loadModel('PdcaComment');
            $row = $this->Pupil->query("select id from pdca_comment where pdca_id=$pdca_id");
            if(is_array($row)&&count($row)>0){
                $id=$row[0]['pdca_comment']['id'];
            }
            else{
                $id='';
            }
            $this->PdcaComment->set('id', $id);
            $this->PdcaComment->set('pdca_id', $pdca_id);
            $this->PdcaComment->set('pupil_achieve', $pupil_achieve);
            $this->PdcaComment->set('pupil_improve', $pupil_improve);
            $this->PdcaComment->set('pupil_comment', $pupil_comment);
            $this->PdcaComment->set('type', 1);
            $this->PdcaComment->save();            
            
            
        }
        $pupil_id = $this->Session->read('id');
        $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");        
        $pdca_id = $row[0]['pdca']['id'];
        $row = $this->Pupil->query("select family_comment from pdca_comment where pdca_id=$pdca_id and type=1");
        if(is_array($row)&&count($row)>0){
            $family_comment = $row[0]['pdca_comment']['family_comment'];
        }
        else{
            $family_comment = '';
        }        
        $this->set(compact('family_comment'));        
    }

    public function pupil18() {
        if ($this->request->is('post')) {
            $pupil_id = $this->Session->read('id');
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
            $data = $this->request->data;
            $family_comment = $data['family_comment'];             
            $this->loadModel('PdcaComment');
            $row = $this->Pupil->query("select id from pdca_comment where pdca_id=$pdca_id");
            if(is_array($row)&&count($row)>0){
                $id=$row[0]['pdca_comment']['id'];
            }
            else{
                $id='';
            }
            $this->PdcaComment->set('id', $id);
            $this->PdcaComment->set('pdca_id', $pdca_id);
            $this->PdcaComment->set('family_comment', $family_comment);  
            $this->PdcaComment->set('type', 1);
            $this->PdcaComment->save();    
        }
    }

    public function pupil() {
        
    }

    public function pupil10() {
        $pupil_id = $this->Session->read('id');
        $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
        $pdca_id = $row[0]['pdca']['id'];
        $items = $this->Pupil->get_all_items_123($pdca_id, $item_type = 1);
        $this->set(compact('items'));
        $this->set(compact('pdca_id'));
    }

    public function pupil20() {
        $pupil_id = $this->Session->read('id');
        $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
        $pdca_id = $row[0]['pdca']['id'];
        $items = $this->Pupil->get_all_items_123($pdca_id, $item_type = 2);
        $this->set(compact('items'));
        $this->set(compact('pdca_id'));
    }

    public function pupil21() {
        $pupil_id = $this->Session->read('id');
        $pdca_id = "";
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $item_id_array = $data['item_id'];
            $pdca_measurement_id_array = $data['pdca_measurement_id'];
            $before_value_array = $data['before_value'];
            $pdca_id = $data['pdca_id'];

            if (is_array($item_id_array) && count($item_id_array) > 0) {
                $this->loadModel('PdcaMeasurement');
                for ($i = 0, $n = count($item_id_array); $i < $n; $i++) {
                    $row = array(
                        'id' => $pdca_measurement_id_array[$i],
                        'pdca_id' => $pdca_id,
                        'type' => 2,
                        'measurement_type' => 2,
                        'item_id' => $item_id_array[$i],
                        'value_before' => $before_value_array[$i],
                    );
                    $this->PdcaMeasurement->savePdcaMesurement($row);
                }
            }
        }
        if ($pdca_id == "") {
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
        }
        $items = $this->Pupil->get_all_items_date($pdca_id, $item_type = 2);
        
        $this->set(compact('items'));
        $this->set(compact('pdca_id'));
    }

    public function pupil22() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $item_id_array = $data['item_id'];
            $pdca_measurement_id_array = $data['pdca_measurement_id'];
            $before_value_array = $data['before_value'];
            $before_date_array = $data['before_date'];
            $pdca_id = $data['pdca_id'];

            if (is_array($item_id_array) && count($item_id_array) > 0) {
                $this->loadModel('PdcaMeasurement');
                for ($i = 0, $n = count($item_id_array); $i < $n; $i++) {
                    if (trim($before_date_array[$i]) != "") {
                        $temp = explode("/", $before_date_array[$i]);
                        $date = $temp[2] . '-' . $temp[1] . '-' . $temp[0] . ' 01:01:01';
                        $row = array(
                            'id' => $pdca_measurement_id_array[$i],
                            'pdca_id' => $pdca_id,
                            'type' => 2,
                            'measurement_type' => 1,
                            'item_id' => $item_id_array[$i],
                            'date_before' => $date,
                            'value_before' => ((trim($before_value_array[$i]) == "") ? 0 : $before_value_array[$i])
                        );
                        $this->PdcaMeasurement->savePdcaMesurement($row);
                    }
                }
            }
        }
    }

    public function pupil23() {
        $pupil_id = $this->Session->read('id');
        $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");        
        $pdca_id = $row[0]['pdca']['id'];
        $row = $this->Pupil->query("select plan_content from pdca_comment where pdca_id=$pdca_id and type=2");
        if(is_array($row)&&count($row)>0){
            $plan_content = $row[0]['pdca_comment']['plan_content'];
        }
        else{
            $plan_content = '';
        }
        $items = $this->Pupil->get_all_items_date($pdca_id, $item_type = 2);
        $this->set(compact('items'));
        $this->set(compact('pdca_id'));
        $this->set(compact('plan_content'));
    }

    public function pupil24() {
        $pupil_id = $this->Session->read('id');
        $pdca_id = "";
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $plan_content = $data['plan_content'];
            $item_id_array = $data['item_id'];
            $pdca_measurement_id_array = $data['pdca_measurement_id'];
            $after_value_array = $data['after_value'];
            $after_date_array = $data['after_date'];
            $pdca_id = $data['pdca_id'];

            if (is_array($item_id_array) && count($item_id_array) > 0) {
                $this->loadModel('PdcaMeasurement');
                for ($i = 0, $n = count($item_id_array); $i < $n; $i++) {
                    if (trim($after_date_array[$i]) != "") {
                        $temp = explode("/", $after_date_array[$i]);
                        $date = $temp[2] . '-' . $temp[1] . '-' . $temp[0] . ' 01:01:01';
                        $row = array(
                            'id' => $pdca_measurement_id_array[$i],
                            'pdca_id' => $pdca_id,
                            'type' => 2,
                            'measurement_type' => 1,
                            'item_id' => $item_id_array[$i],
                            'date_after' => $date,
                            'value_after' => ((trim($after_value_array[$i]) == "") ? 0 : $after_value_array[$i])
                        );
                        $this->PdcaMeasurement->savePdcaMesurement($row);
                    }                    
                }
            }
            if ($plan_content != "") {
                if ($pdca_id == "") {
                    $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
                    $pdca_id = $row[0]['pdca']['id'];
                }
                $this->loadModel('PdcaComment');
                $row = $this->Pupil->query("select id from pdca_comment where pdca_id=$pdca_id");
                if(is_array($row)&&count($row)>0){
                    $id=$row[0]['pdca_comment']['id'];
                }
                else{
                    $id='';
                }
                $this->PdcaComment->set('id', $id);
                $this->PdcaComment->set('pdca_id', $pdca_id);
                $this->PdcaComment->set('plan_content', $plan_content);
                $this->PdcaComment->set('type', 2);
                $this->PdcaComment->save();
            }
        }
        if ($pdca_id == "") {
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
        }
        $items = $this->Pupil->get_all_items_123($pdca_id, $item_type = 2);
        $this->set(compact('items'));
        $this->set(compact('pdca_id'));        
    }

    public function pupil25() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $item_id_array = $data['item_id'];
            $pdca_measurement_id_array = $data['pdca_measurement_id'];
            $after_value_array = $data['after_value'];
            $pdca_id = $data['pdca_id'];            
            if (is_array($item_id_array) && count($item_id_array) > 0) {
                $this->loadModel('PdcaMeasurement');
                for ($i = 0, $n = count($item_id_array); $i < $n; $i++) {
                    $row = array(
                        'id' => $pdca_measurement_id_array[$i],
                        'pdca_id' => $pdca_id,
                        'type' => 2,
                        'measurement_type' => 2,
                        'item_id' => $item_id_array[$i],
                        'value_after' => $after_value_array[$i]
                    );                    
                    $this->PdcaMeasurement->savePdcaMesurement($row);
                }
            }           
        }
    }

    public function pupil26() {
        $pupil_id = $this->Session->read('id');        
        $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");        
        
        $pdca_id = $row[0]['pdca']['id'];        
        $row = $this->Pupil->query("select pupil_achieve,pupil_improve,pupil_comment from pdca_comment where pdca_id=$pdca_id and type=2");        
        if(is_array($row)&&count($row)>0){
            $pupil_achieve = $row[0]['pdca_comment']['pupil_achieve'];
            $pupil_improve = $row[0]['pdca_comment']['pupil_improve'];
            $pupil_comment = $row[0]['pdca_comment']['pupil_comment'];   
        }
        else{
            $pupil_achieve = '';
            $pupil_improve = '';
            $pupil_comment = '';   
        }        
        $this->set(compact('pupil_achieve'));
        $this->set(compact('pupil_improve'));        
        $this->set(compact('pupil_comment'));       
    }

    public function pupil27() {
        if ($this->request->is('post')) {
            $pupil_id = $this->Session->read('id');
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
            $data = $this->request->data;
            $pupil_achieve = $data['pupil_achieve'];
            $pupil_improve = $data['pupil_improve'];
            $pupil_comment = $data['pupil_comment'];          
            $this->loadModel('PdcaComment');
            $this->PdcaComment->set('id', $pdca_id);
            $this->PdcaComment->set('pdca_id', $pdca_id);
            $this->PdcaComment->set('pupil_achieve', $pupil_achieve);
            $this->PdcaComment->set('pupil_improve', $pupil_improve);
            $this->PdcaComment->set('pupil_comment', $pupil_comment);
            $this->PdcaComment->set('type', 2);
            $this->PdcaComment->save();            
            
            
        }
        $pupil_id = $this->Session->read('id');
        $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");        
        $pdca_id = $row[0]['pdca']['id'];
        $row = $this->Pupil->query("select family_comment from pdca_comment where pdca_id=$pdca_id and type=2");
        if(is_array($row)&&count($row)>0){
            $family_comment = $row[0]['pdca_comment']['family_comment'];
        }
        else{
            $family_comment = '';
        }        
        $this->set(compact('family_comment'));
    }

    public function pupil28() {
        if ($this->request->is('post')) {
            $pupil_id = $this->Session->read('id');
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
            $data = $this->request->data;
            $family_comment = $data['family_comment'];             
            $this->loadModel('PdcaComment');
            $this->PdcaComment->set('id', $pdca_id);
            $this->PdcaComment->set('pdca_id', $pdca_id);
            $this->PdcaComment->set('family_comment', $family_comment);  
            $this->PdcaComment->set('type', 2);
            $this->PdcaComment->save();    
        }
    }

    public function pupil30() {
        $pupil_id = $this->Session->read('id');
        $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
        $pdca_id = $row[0]['pdca']['id'];
        $items = $this->Pupil->get_all_items_123($pdca_id, $item_type = 3);
        $this->set(compact('items'));
        $this->set(compact('pdca_id'));
    }

    public function pupil31() {
        $pupil_id = $this->Session->read('id');
        $pdca_id = "";
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $item_id_array = $data['item_id'];
            $pdca_measurement_id_array = $data['pdca_measurement_id'];
            $before_value_array = $data['before_value'];
            $pdca_id = $data['pdca_id'];

            if (is_array($item_id_array) && count($item_id_array) > 0) {
                $this->loadModel('PdcaMeasurement');
                for ($i = 0, $n = count($item_id_array); $i < $n; $i++) {
                    $row = array(
                        'id' => $pdca_measurement_id_array[$i],
                        'pdca_id' => $pdca_id,
                        'type' => 3,
                        'measurement_type' => 2,
                        'item_id' => $item_id_array[$i],
                        'value_before' => $before_value_array[$i],
                    );
                    $this->PdcaMeasurement->savePdcaMesurement($row);
                }
            }
        }
        if ($pdca_id == "") {
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
        }
        $items = $this->Pupil->get_all_items_date($pdca_id, $item_type = 3);
        
        $this->set(compact('items'));
        $this->set(compact('pdca_id'));
    }

    public function pupil32() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $item_id_array = $data['item_id'];
            $pdca_measurement_id_array = $data['pdca_measurement_id'];
            $before_value_array = $data['before_value'];
            $before_date_array = $data['before_date'];
            $pdca_id = $data['pdca_id'];

            if (is_array($item_id_array) && count($item_id_array) > 0) {
                $this->loadModel('PdcaMeasurement');
                for ($i = 0, $n = count($item_id_array); $i < $n; $i++) {
                    if (trim($before_date_array[$i]) != "") {
                        $temp = explode("/", $before_date_array[$i]);
                        $date = $temp[2] . '-' . $temp[1] . '-' . $temp[0] . ' 01:01:01';
                        $row = array(
                            'id' => $pdca_measurement_id_array[$i],
                            'pdca_id' => $pdca_id,
                            'type' => 3,
                            'measurement_type' => 1,
                            'item_id' => $item_id_array[$i],
                            'date_before' => $date,
                            'value_before' => ((trim($before_value_array[$i]) == "") ? 0 : $before_value_array[$i])
                        );
                        $this->PdcaMeasurement->savePdcaMesurement($row);
                    }
                }
            }
        }
    }

    public function pupil33() {
        
    }

    public function pupil34() {
        
    }

    public function pupil35() {
        
    }

    public function pupil36() {
        $pupil_id = $this->Session->read('id');        
        $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");        
        
        $pdca_id = $row[0]['pdca']['id'];        
        $row = $this->Pupil->query("select pupil_achieve,pupil_improve,pupil_comment from pdca_comment where pdca_id=$pdca_id and type=3");        
        if(is_array($row)&&count($row)>0){
            $pupil_achieve = $row[0]['pdca_comment']['pupil_achieve'];
            $pupil_improve = $row[0]['pdca_comment']['pupil_improve'];
            $pupil_comment = $row[0]['pdca_comment']['pupil_comment'];   
        }
        else{
            $pupil_achieve = '';
            $pupil_improve = '';
            $pupil_comment = '';   
        }        
        $this->set(compact('pupil_achieve'));
        $this->set(compact('pupil_improve'));        
        $this->set(compact('pupil_comment'));    
        
    }

    public function pupil37() {
        if ($this->request->is('post')) {
            $pupil_id = $this->Session->read('id');
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
            $data = $this->request->data;
            $pupil_achieve = $data['pupil_achieve'];
            $pupil_improve = $data['pupil_improve'];
            $pupil_comment = $data['pupil_comment'];          
            $this->loadModel('PdcaComment');
            $this->PdcaComment->set('id', $pdca_id);
            $this->PdcaComment->set('pdca_id', $pdca_id);
            $this->PdcaComment->set('pupil_achieve', $pupil_achieve);
            $this->PdcaComment->set('pupil_improve', $pupil_improve);
            $this->PdcaComment->set('pupil_comment', $pupil_comment);
            $this->PdcaComment->set('type', 3);
            $this->PdcaComment->save();            
            
            
        }
        $pupil_id = $this->Session->read('id');
        $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");        
        $pdca_id = $row[0]['pdca']['id'];
        $row = $this->Pupil->query("select family_comment from pdca_comment where pdca_id=$pdca_id and type=3");
        if(is_array($row)&&count($row)>0){
            $family_comment = $row[0]['pdca_comment']['family_comment'];
        }
        else{
            $family_comment = '';
        }        
        $this->set(compact('family_comment'));   
    }

    public function pupil38() {
        if ($this->request->is('post')) {
            $pupil_id = $this->Session->read('id');
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
            $data = $this->request->data;
            $family_comment = $data['family_comment'];             
            $this->loadModel('PdcaComment');
            $this->PdcaComment->set('id', $pdca_id);
            $this->PdcaComment->set('pdca_id', $pdca_id);
            $this->PdcaComment->set('family_comment', $family_comment);  
            $this->PdcaComment->set('type', 3);
            $this->PdcaComment->save();    
        }
    }

    public function pupil40() {
        $pupil_id = $this->Session->read('id');
        $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
        $pdca_id = $row[0]['pdca']['id'];
        $items = $this->Pupil->get_all_items_123($pdca_id, $item_type = 4);
        $this->set(compact('items'));
        $this->set(compact('pdca_id'));
    }

    public function pupil41() {
        $pupil_id = $this->Session->read('id');
        $pdca_id = "";
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $item_id_array = $data['item_id'];
            $pdca_measurement_id_array = $data['pdca_measurement_id'];
            $before_value_array = $data['before_value'];
            $pdca_id = $data['pdca_id'];

            if (is_array($item_id_array) && count($item_id_array) > 0) {
                $this->loadModel('PdcaMeasurement');
                for ($i = 0, $n = count($item_id_array); $i < $n; $i++) {
                    $row = array(
                        'id' => $pdca_measurement_id_array[$i],
                        'pdca_id' => $pdca_id,
                        'type' => 4,
                        'measurement_type' => 2,
                        'item_id' => $item_id_array[$i],
                        'value_before' => $before_value_array[$i],
                    );
                    $this->PdcaMeasurement->savePdcaMesurement($row);
                }
            }
        }
        if ($pdca_id == "") {
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
        }
        $items = $this->Pupil->get_all_items_date($pdca_id, $item_type = 4);
        
        $this->set(compact('items'));
        $this->set(compact('pdca_id'));
    }

    public function pupil42() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $item_id_array = $data['item_id'];
            $pdca_measurement_id_array = $data['pdca_measurement_id'];
            $before_value_array = $data['value'];
            $before_date_array = $data['before_date'];
            $pdca_id = $data['pdca_id'];
            $waste_type = $data['waste_type'];
            if (is_array($item_id_array) && count($item_id_array) > 0) {
                $this->loadModel('PdcaMeasurement');
                for ($i = 0, $n = count($item_id_array); $i < $n; $i++) {
                    if (trim($before_date_array[$i]) != "") {                        
                        $temp = explode("/", $before_date_array[$i]);
                        $date = $temp[2] . '-' . $temp[1] . '-' . $temp[0] . ' 01:01:01';
                        $row = array(
                            'id' => $pdca_measurement_id_array[$i],
                            'pdca_id' => $pdca_id,
                            'type' => 4,
                            'measurement_type' => 1,
                            'item_id' => $item_id_array[$i],
                            'date_before' => $date,
                            'waste_type' => $waste_type,
                            'value_before' => ((trim($before_value_array[$i]) == "") ? 0 : $before_value_array[$i])
                        );
                        $this->PdcaMeasurement->savePdcaMesurement($row);
                    }
                }
            }
        }
    }

    public function pupil43() {
        $pupil_id = $this->Session->read('id');
        $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");        
        $pdca_id = $row[0]['pdca']['id'];
        $row = $this->Pupil->query("select plan_content from pdca_comment where pdca_id=$pdca_id and type=4");
        if(is_array($row)&&count($row)>0){
            $plan_content = $row[0]['pdca_comment']['plan_content'];
        }
        else{
            $plan_content = '';
        }
        $items = $this->Pupil->get_all_items_date($pdca_id, $item_type = 1);
        $this->set(compact('items'));
        $this->set(compact('pdca_id'));
        $this->set(compact('plan_content'));
    }

    public function pupil44() {
        $pupil_id = $this->Session->read('id');
        $pdca_id = "";
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $plan_content = $data['plan_content'];
            $item_id_array = $data['item_id'];
            $pdca_measurement_id_array = $data['pdca_measurement_id'];
            $after_value_array = $data['value'];
            $after_date_array = $data['after_date'];
            $pdca_id = $data['pdca_id'];
            $waste_type = $data['waste_type'];
            if (is_array($item_id_array) && count($item_id_array) > 0) {
                $this->loadModel('PdcaMeasurement');
                for ($i = 0, $n = count($item_id_array); $i < $n; $i++) {
                    if (trim($after_date_array[$i]) != "") {
                        $temp = explode("/", $after_date_array[$i]);
                        $date = $temp[2] . '-' . $temp[1] . '-' . $temp[0] . ' 01:01:01';
                        $row = array(
                            'id' => $pdca_measurement_id_array[$i],
                            'pdca_id' => $pdca_id,
                            'type' => 4,
                            'measurement_type' => 1,
                            'item_id' => $item_id_array[$i],
                            'date_after' => $date,
                            'waste_type' => $waste_type,
                            'value_after' => ((trim($after_value_array[$i]) == "") ? 0 : $after_value_array[$i])
                        );
                        $this->PdcaMeasurement->savePdcaMesurement($row);
                    }                    
                }
            }
            if ($plan_content != "") {
                if ($pdca_id == "") {
                    $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
                    $pdca_id = $row[0]['pdca']['id'];
                }
                $this->loadModel('PdcaComment');
                $row = $this->Pupil->query("select id from pdca_comment where pdca_id=$pdca_id");
                if(is_array($row)&&count($row)>0){
                    $id=$row[0]['pdca_comment']['id'];
                }
                else{
                    $id='';
                }
                $this->PdcaComment->set('id', $id);
                $this->PdcaComment->set('pdca_id', $pdca_id);
                $this->PdcaComment->set('plan_content', $plan_content);
                $this->PdcaComment->set('type', 4);
                $this->PdcaComment->save();
            }
        }
        if ($pdca_id == "") {
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
        }
        $items = $this->Pupil->get_all_items_123($pdca_id, $item_type = 4);
        $this->set(compact('items'));
        $this->set(compact('pdca_id'));
    }

    public function pupil45() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $item_id_array = $data['item_id'];
            $pdca_measurement_id_array = $data['pdca_measurement_id'];
            $after_value_array = $data['after_value'];
            $pdca_id = $data['pdca_id'];            
            if (is_array($item_id_array) && count($item_id_array) > 0) {
                $this->loadModel('PdcaMeasurement');
                for ($i = 0, $n = count($item_id_array); $i < $n; $i++) {
                    $row = array(
                        'id' => $pdca_measurement_id_array[$i],
                        'pdca_id' => $pdca_id,
                        'type' => 4,
                        'measurement_type' => 2,
                        'item_id' => $item_id_array[$i],
                        'value_after' => $after_value_array[$i]
                    );                    
                    $this->PdcaMeasurement->savePdcaMesurement($row);
                }
            }           
        }
        if (!isset($pdca_id)) {
            $pupil_id = $this->Session->read('id');
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
        }
        $row=$this->Pupil->query("select sum(value_before) as sum from pdca_measurement where pdca_id=$pdca_id and type=4 and measurement_type=2");
        $row=$row[0];
        $before_value_sum_measurement_type2=$row[0]['sum'];
        $row=$this->Pupil->query("select sum(value_after) as sum from pdca_measurement where pdca_id=$pdca_id and type=4 and measurement_type=2");
        $row=$row[0];
        $after_value_sum_measurement_type2=$row[0]['sum'];
        $items=$this->Pupil->query("select value_before from pdca_measurement where pdca_id=$pdca_id and type=4 and measurement_type=1 order by pdca_measurement.id limit 0,7");
        $before_value_sum_measurement_type1=0;
        $before_value_array=array();        
        if(is_array($items)&&count($items)>0){
            foreach ($items as $item){
                $before_value_array[]=$item['pdca_measurement']['value_before'];
                $before_value_sum_measurement_type1+=$item['pdca_measurement']['value_before'];
            }            
        }
        $items=$this->Pupil->query("select value_after from pdca_measurement where pdca_id=$pdca_id and type=4 and measurement_type=1 order by pdca_measurement.id limit 0,7");
        $after_value_sum_measurement_type1=0;
        $after_value_array=array();
        if(is_array($items)&&count($items)>0){
            foreach ($items as $item){
                $after_value_array[]=$item['pdca_measurement']['value_after'];
                $after_value_sum_measurement_type1+=$item['pdca_measurement']['value_after'];
            }            
        }
        $row=$this->Pupil->query("select family_member_no from pupil where id=".$this->Session->read('id'));
        $row=$row[0];
        $family_member_no=$row['pupil']['family_member_no'];
        if($family_member_no==''){
            $family_member_no=1;
        }
        $this->set(compact('before_value_sum_measurement_type2'));
        $this->set(compact('after_value_sum_measurement_type2'));
        $this->set(compact('before_value_sum_measurement_type1'));
        $this->set(compact('after_value_sum_measurement_type1'));
        $this->set(compact('before_value_array'));
        $this->set(compact('after_value_array'));        
        $this->set(compact('family_member_no'));  
    }

    public function pupil46() {
        $pupil_id = $this->Session->read('id');        
        $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");        
        
        $pdca_id = $row[0]['pdca']['id'];        
        $row = $this->Pupil->query("select pupil_achieve,pupil_improve,pupil_comment from pdca_comment where pdca_id=$pdca_id and type=4");        
        if(is_array($row)&&count($row)>0){
            $pupil_achieve = $row[0]['pdca_comment']['pupil_achieve'];
            $pupil_improve = $row[0]['pdca_comment']['pupil_improve'];
            $pupil_comment = $row[0]['pdca_comment']['pupil_comment'];   
        }
        else{
            $pupil_achieve = '';
            $pupil_improve = '';
            $pupil_comment = '';   
        }        
        $this->set(compact('pupil_achieve'));
        $this->set(compact('pupil_improve'));        
        $this->set(compact('pupil_comment'));    
    }

    public function pupil47() {
        if ($this->request->is('post')) {
            $pupil_id = $this->Session->read('id');
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
            $data = $this->request->data;
            $pupil_achieve = $data['pupil_achieve'];
            $pupil_improve = $data['pupil_improve'];
            $pupil_comment = $data['pupil_comment'];          
            $this->loadModel('PdcaComment');
            $this->PdcaComment->set('id', $pdca_id);
            $this->PdcaComment->set('pdca_id', $pdca_id);
            $this->PdcaComment->set('pupil_achieve', $pupil_achieve);
            $this->PdcaComment->set('pupil_improve', $pupil_improve);
            $this->PdcaComment->set('pupil_comment', $pupil_comment);
            $this->PdcaComment->set('type', 4);
            $this->PdcaComment->save();            
            
            
        }
        $pupil_id = $this->Session->read('id');
        $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");        
        $pdca_id = $row[0]['pdca']['id'];
        $row = $this->Pupil->query("select family_comment from pdca_comment where pdca_id=$pdca_id and type=4");
        if(is_array($row)&&count($row)>0){
            $family_comment = $row[0]['pdca_comment']['family_comment'];
        }
        else{
            $family_comment = '';
        }        
        $this->set(compact('family_comment'));   
    }
    public function pupil48(){
        if ($this->request->is('post')) {
            $pupil_id = $this->Session->read('id');
            $row = $this->Pupil->query("select id from pdca where pupil_id=$pupil_id");
            $pdca_id = $row[0]['pdca']['id'];
            $data = $this->request->data;
            $family_comment = $data['family_comment'];             
            $this->loadModel('PdcaComment');
            $this->PdcaComment->set('id', $pdca_id);
            $this->PdcaComment->set('pdca_id', $pdca_id);
            $this->PdcaComment->set('family_comment', $family_comment);  
            $this->PdcaComment->set('type', 4);
            if($this->PdcaComment->save()) {
                $this->redirect(array('controller' => 'pupils', 'action' =>'pupil'));
            }   
        }
    }

}