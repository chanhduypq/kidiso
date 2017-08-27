<?php
App::uses('AppController', 'Controller');
/**
 * Instructors Controller
 *
 * @property Instructor $Instructor
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class InstructorsController extends AppController {

    

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
	    $user_id= $this->Session->read('id');
        $role = $this->Session->read('role');
        $this->loadModel('Classes');
        $this->Classes->recursive=-1;
        $classe=$this->Classes->find('first',array('conditions'=>array('Classes.instructor_id'=>$user_id)));
        $condition = array();
        $keyword='';
        $num_done =0;
        $numpupil=0;
        $pupils=array();
        if($this->request->is('GET') && isset($this->request->query['keyword']))
        {
            $keyword = $this->request->query['keyword'];
            $condition[]=array('Pupil.name LIKE'=>"%$keyword%");
        }	
        if(!empty($classe))
        {
            $classeId = $classe['Classes']['id'];
            $condition[]=array('Pupil.classes_id'=>$classeId);
            $this->Instructor->recursive = 0;
            $this->loadModel('Pupil');
            $this->Paginator->settings=array(
                                            'conditions'=>$condition,
                                            'limit'=>LIMIT_ITEM,
                                        );
    		$pupils= $this->Paginator->paginate('Pupil');
            $this->Pupil->Behaviors->attach('Containable');
            $num_done = $this->Pupil->find('count',
                                            array('contain'=>array('Pdca'),
                                            'conditions'=>array('Pupil.classes_id'=>$classeId,'Pdca.evalue_flag'=>1)
                                            )
                                            );
            $numpupil = count($pupils);
                                         
        }
        $teacherName= $this->Session->read('teacher_name');
        $this->set(compact('classe','pupils','keyword','teacherName','num_done','numpupil'));
 	}
    public function evalueElectric()
    {
    	$this->layout=false;
        if ($this->RequestHandler->isAjax()) {
            $pdca_id= $this->request->data['pdca_id'];
            $this->loadModel('Pdca');
            $this->Pdca->Behaviors->attach('Containable');
            $pdca=$this->Pdca->find('first',array(
                                            'contain'=>array('Pupil',
                                                            'PdcaMeasurement'=>array('conditions'=>array('PdcaMeasurement.type'=>1))
                                                            ),
                                            'conditions'=>array('Pdca.id'=>$pdca_id),'recursive'=>1));
      
           
            $totalMeasurementBefore=0;
            $totalMeasurementAfter = 0;
            $totalAnysicBefore=0;
            $totalAnysicAfter=0;
            $numberAnysic=0;
            $numberMeasurement= 0;
            
            if(!empty($pdca))
            {
                
                foreach($pdca['PdcaMeasurement'] as $k=>$v)
                {
                       if($v['measurement_type']==1)
                        {
                            if(!empty($v['date_before'])|| !empty($v['date_after']))
                            {
                                $numberMeasurement++;
                                $totalMeasurementBefore += $v['value_before'];
                                $totalMeasurementAfter += $v['value_after'];
                            }
                        }
                        else{
                            $numberAnysic++;
                            $totalAnysicBefore += $v['value_before'];
                            $totalAnysicAfter += $v['value_after'];
                        }
                    
                }
            }
            $pupilName=$pdca['Pupil']['name'];
            $dateEValue = date('Y/m/d');
            $avgCostDayBefore = FunctionCommon::avg_day($totalMeasurementBefore,$numberMeasurement);
            $avgCostDayAfter = FunctionCommon::avg_day($totalMeasurementAfter,$numberMeasurement);
            $avgCostDayPersonBefore = FunctionCommon::avg_day_person($totalMeasurementBefore,$numberMeasurement,$pdca['Pupil']['family_member_no']);
            $avgCostDayPersonAfter = FunctionCommon::avg_day_person($totalMeasurementAfter,$numberMeasurement,$pdca['Pupil']['family_member_no']);
            $avgAFaminlyDay = $avgCostDayPersonAfter- $avgCostDayPersonBefore;
            $this->set(compact('totalMeasurementBefore','totalMeasurementAfter','totalAnysicBefore','totalAnysicAfter','numberMeasurement','numberAnysic','avgCostDayBefore','avgCostDayAfter','avgCostDayPersonBefore','avgCostDayPersonAfter','avgAFaminlyDay','pupilName','pdca_id'));
            //call a model 
            $this->loadModel('Evaluate');
            $evalue = $this->Evaluate->find('first',array('conditions'=>array('Evaluate.pdca_id'=>$pdca_id,'Evaluate.type'=>1)));
            $this->set(compact('evalue'));   
        }
        
    }
    public function evalueGas()
    {
        $this->layout=false;
         if ($this->RequestHandler->isAjax()) {
            $pdca_id= $this->request->data['pdca_id'];
            $this->loadModel('Pdca');
            $this->Pdca->Behaviors->attach('Containable');
            $pdca=$this->Pdca->find('first',array(
                                            'contain'=>array('Pupil',
                                                            'PdcaMeasurement'=>array('conditions'=>array('PdcaMeasurement.type'=>2))
                                                            ),
                                            'conditions'=>array('Pdca.id'=>$pdca_id),'recursive'=>1));
    
            $totalMeasurementBefore=0;
            $totalMeasurementAfter = 0;
            $totalAnysicBefore=0;
            $totalAnysicAfter=0;
            $numberAnysic=0;
            $numberMeasurement= 0;
            if(!empty($pdca))
            {
                
                foreach($pdca['PdcaMeasurement'] as $k=>$v)
                {
                        if($v['measurement_type']==1)
                        {
                            if(!empty($v['date_before'])|| !empty($v['date_after']))
                            {
                                $numberMeasurement++;
                                $totalMeasurementBefore += $v['value_before'];
                                $totalMeasurementAfter += $v['value_after'];
                            }   
                        }
                        else{
                            $numberAnysic++;
                            $totalAnysicBefore += $v['value_before'];
                            $totalAnysicAfter += $v['value_after'];
                        }
                    
                }
            }
            $pupilName=$pdca['Pupil']['name'];
            $dateEValue = date('Y/m/d');
            $avgCostDayBefore = FunctionCommon::avg_day($totalMeasurementBefore,$numberMeasurement);
            $avgCostDayAfter = FunctionCommon::avg_day($totalMeasurementAfter,$numberMeasurement);
            $avgCostDayPersonBefore = FunctionCommon::avg_day_person($totalMeasurementBefore,$numberMeasurement,$pdca['Pupil']['family_member_no']);
            $avgCostDayPersonAfter = FunctionCommon::avg_day_person($totalMeasurementAfter,$numberMeasurement,$pdca['Pupil']['family_member_no']);
            $avgAFaminlyDay = $avgCostDayPersonAfter- $avgCostDayPersonBefore;
            $this->set(compact('totalMeasurementBefore','totalMeasurementAfter','totalAnysicBefore','totalAnysicAfter','numberMeasurement','numberAnysic','avgCostDayBefore','avgCostDayAfter','avgCostDayPersonBefore','avgCostDayPersonAfter','avgAFaminlyDay','pupilName','pdca_id'));
            //call a model 
            $this->loadModel('Evaluate');
            $evalue = $this->Evaluate->find('first',array('conditions'=>array('Evaluate.pdca_id'=>$pdca_id,'Evaluate.type'=>2)));
            $this->set(compact('evalue')); 
            } 
        
    }
    public function evalueAqua()
    {
        $this->layout=false;
         if ($this->RequestHandler->isAjax()) {
            $pdca_id= $this->request->data['pdca_id'];
            $this->loadModel('Pdca');
            $this->Pdca->Behaviors->attach('Containable');
            $pdca=$this->Pdca->find('first',array(
                                            'contain'=>array('Pupil',
                                                            'PdcaMeasurement'=>array('conditions'=>array('PdcaMeasurement.type'=>3))
                                                            ),
                                            'conditions'=>array('Pdca.id'=>$pdca_id),'recursive'=>1));
    
            $totalMeasurementBefore=0;
            $totalMeasurementAfter = 0;
            $totalAnysicBefore=0;
            $totalAnysicAfter=0;
            $numberAnysic=0;
            $numberMeasurement= 0;
            if(!empty($pdca))
            {
                
                foreach($pdca['PdcaMeasurement'] as $k=>$v)
                {
                        if($v['measurement_type']==1)
                        {
                            if(!empty($v['date_before'])|| !empty($v['date_after']))
                            {
                                $numberMeasurement++;
                                $totalMeasurementBefore += $v['value_before'];
                                $totalMeasurementAfter += $v['value_after'];
                            } 
                        }
                        else{
                            $numberAnysic++;
                            $totalAnysicBefore += $v['value_before'];
                            $totalAnysicAfter += $v['value_after'];
                        }
                    
                }
            }
            $pupilName=$pdca['Pupil']['name'];
            $dateEValue = date('Y/m/d');
            $avgCostDayBefore = FunctionCommon::avg_day($totalMeasurementBefore,$numberMeasurement);
            $avgCostDayAfter = FunctionCommon::avg_day($totalMeasurementAfter,$numberMeasurement);
            $avgCostDayPersonBefore = FunctionCommon::avg_day_person($totalMeasurementBefore,$numberMeasurement,$pdca['Pupil']['family_member_no']);
            $avgCostDayPersonAfter = FunctionCommon::avg_day_person($totalMeasurementAfter,$numberMeasurement,$pdca['Pupil']['family_member_no']);
            $avgAFaminlyDay = $avgCostDayPersonAfter- $avgCostDayPersonBefore;
            $this->set(compact('totalMeasurementBefore','totalMeasurementAfter','totalAnysicBefore','totalAnysicAfter','numberMeasurement','numberAnysic','avgCostDayBefore','avgCostDayAfter','avgCostDayPersonBefore','avgCostDayPersonAfter','avgAFaminlyDay','pupilName','pdca_id'));
            $this->loadModel('Evaluate');
            $evalue = $this->Evaluate->find('first',array('conditions'=>array('Evaluate.pdca_id'=>$pdca_id,'Evaluate.type'=>3)));
            $this->set(compact('evalue')); 
            } 
        
    }
    public function evalueResidous()
    {
         $this->layout=false;
         if ($this->RequestHandler->isAjax()) {
            $pdca_id= $this->request->data['pdca_id'];
            $this->loadModel('Pdca');
            $this->Pdca->Behaviors->attach('Containable');
            $pdca=$this->Pdca->find('first',array(
                                            'contain'=>array('Pupil',
                                                            'PdcaMeasurement'=>array('conditions'=>array('PdcaMeasurement.type'=>4))
                                                            ),
                                            'conditions'=>array('Pdca.id'=>$pdca_id),'recursive'=>1));
            $totalMeasurementBefore=0;
            $totalMeasurementAfter = 0;
            $totalAnysicBefore=0;
            $totalAnysicAfter=0;
            $numberAnysic=0;
            $numberMeasurement= 0;
            if(!empty($pdca))
            {
                
                foreach($pdca['PdcaMeasurement'] as $k=>$v)
                {
                        if($v['measurement_type']==1)
                        {
                            if(!empty($v['date_before'])|| !empty($v['date_after']))
                            {
                                $numberMeasurement++;
                                $totalMeasurementBefore += $v['value_before'];
                                $totalMeasurementAfter += $v['value_after'];
                            } 
                        }
                        else{
                            $numberAnysic++;
                            $totalAnysicBefore += $v['value_before'];
                            $totalAnysicAfter += $v['value_after'];
                        }
                    
                }
            }
            $pupilName=$pdca['Pupil']['name'];
            $dateEValue = date('Y/m/d');
            $avgCostDayBefore = FunctionCommon::avg_day($totalMeasurementBefore,$numberMeasurement);
            $avgCostDayAfter = FunctionCommon::avg_day($totalMeasurementAfter,$numberMeasurement);
            $avgCostDayPersonBefore = FunctionCommon::avg_day_person($totalMeasurementBefore,$numberMeasurement,$pdca['Pupil']['family_member_no']);
            $avgCostDayPersonAfter = FunctionCommon::avg_day_person($totalMeasurementAfter,$numberMeasurement,$pdca['Pupil']['family_member_no']);
            $avgAFaminlyDay = $avgCostDayPersonAfter- $avgCostDayPersonBefore;
            $this->set(compact('totalMeasurementBefore','totalMeasurementAfter','totalAnysicBefore','totalAnysicAfter','numberMeasurement','numberAnysic','avgCostDayBefore','avgCostDayAfter','avgCostDayPersonBefore','avgCostDayPersonAfter','avgAFaminlyDay','pupilName','pdca_id'));
            $this->loadModel('Evaluate');
            $evalue = $this->Evaluate->find('first',array('conditions'=>array('Evaluate.pdca_id'=>$pdca_id,'Evaluate.type'=>4)));
            $this->set(compact('evalue')); 
            } 
    }
    public function calElectric()
    {
        if($this->request->is('POST'))
        {
           $result1=$result2=$result3=$result4=true; 
           if(isset($this->request->data['Electricid']))
           {
               $electric=$this->request->data['Electricid'];
               $evaluate_date = date("Y-m-d H:i:s");
               $pdca_id = $electric['pdca_id'];
               $id=$electric['id'];
               $evaluate_situation_before=$electric['recognite_before'];
               $evaluate_situation_after = $electric['recognite_after'];
               $evaluate_plan = $electric['plan'];
               $evaluate_compare_result = $electric['compare_result'];
               $evaluate_result = $electric['recognite_after'];
               $meter_accessability = $electric['accessible'];
               $is_data_recorded = $electric['data_collect'];
               $data_record_mode = $electric['data_record_mode'];
               $data_analysis_mode = $electric['data_analysis_mode'];
               $comment = $electric['comment'];
               $is_data_reliable =$electric['is_data_reliable']; 
               $type=1;
               $result = $this->saveEvalue($id,$type,$pdca_id,$evaluate_date,$evaluate_situation_before,$evaluate_situation_after,$evaluate_plan,$evaluate_compare_result,$evaluate_result,$meter_accessability,$is_data_recorded,$data_record_mode,$data_analysis_mode,$comment,$is_data_reliable);
     
           }
            /* save gas evaluation */
           if(isset($this->request->data['Gas']))
           {
                $gas = $this->request->data['Gas'];
               $evaluate_date = date("Y-m-d H:i:s");
               $pdca_id = $gas['pdca_id'];
               $id=$gas['id'];
               $evaluate_situation_before=$gas['recognite_before'];
               $evaluate_situation_after = $gas['recognite_after'];
               $evaluate_plan = $gas['plan'];
               $evaluate_compare_result = $gas['compare_result'];
               $evaluate_result = $gas['recognite_after'];
               $meter_accessability = $gas['accessible'];
               $is_data_recorded = $gas['data_collect'];
               $data_record_mode = $gas['data_record_mode'];
               $data_analysis_mode = $gas['data_analysis_mode'];
               $comment = $gas['comment'];
               $is_data_reliable =$gas['is_data_reliable']; 
               $type=2; 
               $result2 = $this->saveEvalue($id,$type,$pdca_id,$evaluate_date,$evaluate_situation_before,$evaluate_situation_after,$evaluate_plan,$evaluate_compare_result,$evaluate_result,$meter_accessability,$is_data_recorded,$data_record_mode,$data_analysis_mode,$comment,$is_data_reliable);
         
           }
           /* save aqua evaluation */
           if(isset($this->request->data['Aqua']))
           {
               $aqua = $this->request->data['Aqua'];
               $evaluate_date = date("Y-m-d H:i:s");
               $pdca_id = $aqua['pdca_id'];
               $id=$aqua['id'];
               $evaluate_situation_before=$aqua['recognite_before'];
               $evaluate_situation_after = $aqua['recognite_after'];
               $evaluate_plan = $aqua['plan'];
               $evaluate_compare_result = $aqua['compare_result'];
               $evaluate_result = $aqua['recognite_after'];
               $meter_accessability = $aqua['accessible'];
               $is_data_recorded = $aqua['data_collect'];
               $data_record_mode = $aqua['data_record_mode'];
               $data_analysis_mode = $aqua['data_analysis_mode'];
               $comment = $aqua['comment'];
               $is_data_reliable =$aqua['is_data_reliable']; 
               $type=3; 
               $result3 = $this->saveEvalue($id,$type,$pdca_id,$evaluate_date,$evaluate_situation_before,$evaluate_situation_after,$evaluate_plan,$evaluate_compare_result,$evaluate_result,$meter_accessability,$is_data_recorded,$data_record_mode,$data_analysis_mode,$comment,$is_data_reliable);
         
           }
           if(isset($this->request->data['Residous']))
           {
               $residous = $this->request->data['Residous'];
               $evaluate_date = date("Y-m-d H:i:s");
               $pdca_id = $residous['pdca_id'];
               $id=$residous['id'];
               $evaluate_situation_before=$residous['recognite_before'];
               $evaluate_situation_after = $residous['recognite_after'];
               $evaluate_plan = $residous['plan'];
               $evaluate_compare_result = $residous['compare_result'];
               $evaluate_result = $residous['recognite_after'];
               $meter_accessability = $residous['accessible'];
               $is_data_recorded = $residous['data_collect'];
               $data_record_mode = $residous['data_record_mode'];
               $data_analysis_mode = $residous['data_analysis_mode'];
               $comment = $residous['comment'];
               $is_data_reliable =$residous['is_data_reliable']; 
               $type=4; 
               $result3 = $this->saveEvalue($id,$type,$pdca_id,$evaluate_date,$evaluate_situation_before,$evaluate_situation_after,$evaluate_plan,$evaluate_compare_result,$evaluate_result,$meter_accessability,$is_data_recorded,$data_record_mode,$data_analysis_mode,$comment,$is_data_reliable);
        
           }
           if($result && $result2 && $result3 && $result1)
           {
                $this->Session->setFlash(SUCCESSFULL_EVALUATION);
                $this->loadModel('Pdca');
                $this->Pdca->query("UPDATE pdca SET pdca.evalue_flag=1 WHERE pdca.id=$pdca_id");
    
           }
           else{
                $this->Session->setFlash(ERROR_EVALUATION);
                      }
           
           $this->redirect("/Instructors/index");
        }
        
       
    }
    public function saveEvalue($id,$type,$pdca_id,$evaluate_date,$evaluate_situation_before,$evaluate_situation_after,$evaluate_plan,$evaluate_compare_result,$evaluate_result,$meter_accessability,$is_data_recorded,$data_record_mode,$data_analysis_mode,$comment,$is_data_reliable)
    {
           $this->loadModel('Evaluate');
           $this->Evaluate->set('id',$id);
           $this->Evaluate->set('type',$type);
           $this->Evaluate->set('pdca_id',$pdca_id);
           $this->Evaluate->set('evaluate_date',$evaluate_date);
           $this->Evaluate->set('evaluate_situation_before',$evaluate_situation_before);
           $this->Evaluate->set('evaluate_situation_after',$evaluate_situation_after);
           $this->Evaluate->set('evaluate_plan',$evaluate_plan);
           $this->Evaluate->set('evaluate_compare_result',$evaluate_compare_result);
           $this->Evaluate->set('evaluate_result',$evaluate_result);
           $this->Evaluate->set('meter_accessability',$meter_accessability);
           $this->Evaluate->set('is_data_recorded',0);
           $this->Evaluate->set('data_record_mode',$data_record_mode);
           $this->Evaluate->set('data_analysis_mode',$data_analysis_mode);
           $this->Evaluate->set('comment',$comment);
           $this->Evaluate->set('is_data_reliable',$is_data_reliable);
           if($this->Evaluate->save())
           {
                return true;
           }
           else{
                return false;
           }
    }
    public function evalueManager()
    {
        $this->layout=false;
        $this->autoRender=false;
        $rel='';
        if ($this->RequestHandler->isAjax()) {
            $before=$this->request->data['recognite_before'];
            $after=$this->request->data['recognite_after'];
            $plan=$this->request->data['plan'];
            $compare_ressut=$this->request->data['compare_result'];
            $result=$this->request->data['result'];
            $rel = FunctionCommon::evalue_management($before,$after,$plan,$compare_ressut,$result);
            
        }
        echo $rel;exit;
    }
    public function fraceData()
    {
        $this->layout=false;
        $this->autoRender=false;
        $rel='';
        if ($this->RequestHandler->isAjax()) {
            $type = $this->request->data['type'];
            $accessible=$this->request->data['accessible'];
            $data_collect=$this->request->data['data_collect'];
            $avg_day_before=$this->request->data['avg_day_before'];
            $avg_day_after=$this->request->data['avg_day_after'];
            $diference_day=$this->request->data['diference_day'];
            switch($type)
            {
                case 1:  $rel = FunctionCommon::fraceDataElectric($accessible,$data_collect,$avg_day_before,$avg_day_after,$diference_day);break;
                case 2:  $rel = FunctionCommon::fraceDataGas($accessible,$data_collect,$avg_day_before,$avg_day_after,$diference_day);break;
                case 3:  $rel = FunctionCommon::fraceDataAqua($accessible,$data_collect,$avg_day_before,$avg_day_after,$diference_day);break;
                case 4:  $rel = FunctionCommon::fraceDataResidous($accessible,$data_collect,$avg_day_before,$avg_day_after,$diference_day);break;
            }
            
        }
        echo $rel;exit;
    }
    /*
    `Detail pdca electricid
    */
    public function pdcaElectric()
    {
        $this->layout=false;
        $analysic = array();
        $mesurement = array();
        $pdca_id='';
        if ($this->RequestHandler->isAjax()) {
            $pdca_id= $this->request->data['pdca_id'];
            $this->loadModel('Pdca');
            $this->Pdca->Behaviors->attach('Containable');
            $pdca=$this->Pdca->find('first',array(
                                            'contain'=>array(
                                                            'PdcaMeasurement'=>array('Item',
                                                            'conditions'=>array('PdcaMeasurement.type'=>1))
                                                            ),
                                            'conditions'=>array('Pdca.id'=>$pdca_id),'recursive'=>2));
            if($pdca)
            {
                foreach($pdca['PdcaMeasurement'] as $k=>$v)
                {
                    if($v['measurement_type']==2)
                    {
                        $analysic[] = array('item_name'=>$v['Item']['item_name'],'value_before'=>$v['value_before'],'value_after'=>$v['value_after']); 
                    }
                    else{
                        if(!empty($v['date_before'])|| !empty($v['date_after']))
                        {
                              $mesurement[]= array('date_before'=>$v['date_before'],'date_after'=>$v['date_after'],'value_before'=>$v['value_before'],'value_after'=>$v['value_after']);
           
                        } 
                    }
                }
            }
         }
         $this->set(compact('analysic','mesurement','pdca_id'));
    }
    /*
    `Detail pdca gas
    */
    public function pdcaGas()
    {
        $this->layout=false;
        $analysic = array();
        $mesurement = array();
        $pdca_id='';
        if ($this->RequestHandler->isAjax()) {
            $pdca_id= $this->request->data['pdca_id'];
            $this->loadModel('Pdca');
            $this->Pdca->Behaviors->attach('Containable');
            $pdca=$this->Pdca->find('first',array(
                                            'contain'=>array(
                                                            'PdcaMeasurement'=>array('Item',
                                                            'conditions'=>array('PdcaMeasurement.type'=>2))
                                                            ),
                                            'conditions'=>array('Pdca.id'=>$pdca_id),'recursive'=>2));
        
            if($pdca)
            {
                foreach($pdca['PdcaMeasurement'] as $k=>$v)
                {
                    if($v['measurement_type']==2)
                    {
                        $analysic[] = array('item_name'=>$v['Item']['item_name'],'value_before'=>$v['value_before'],'value_after'=>$v['value_after']); 
                    }
                    else{
                        if(!empty($v['date_before'])|| !empty($v['date_after']))
                        {
                              $mesurement[]= array('date_before'=>$v['date_before'],'date_after'=>$v['date_after'],'value_before'=>$v['value_before'],'value_after'=>$v['value_after']);
           
                        }       
                    }
                }
            }
         }
         $this->set(compact('analysic','mesurement','pdca_id'));
    }
    /*
    Detail pdca gas
    */
    public function pdcaAqua()
    {
        $this->layout=false;
        $analysic = array();
        $mesurement = array();
        $pdca_id='';
        if ($this->RequestHandler->isAjax()) {
            $pdca_id= $this->request->data['pdca_id'];
            $this->loadModel('Pdca');
            $this->Pdca->Behaviors->attach('Containable');
            $pdca=$this->Pdca->find('first',array(
                                            'contain'=>array(
                                                            'PdcaMeasurement'=>array('Item',
                                                            'conditions'=>array('PdcaMeasurement.type'=>3))
                                                            ),
                                            'conditions'=>array('Pdca.id'=>$pdca_id),'recursive'=>2));
        
            if($pdca)
            {
                foreach($pdca['PdcaMeasurement'] as $k=>$v)
                {
                    if($v['measurement_type']==2)
                    {
                        $analysic[] = array('item_name'=>$v['Item']['item_name'],'value_before'=>$v['value_before'],'value_after'=>$v['value_after']); 
                    }
                    else{
                        if(!empty($v['date_before'])|| !empty($v['date_after']))
                        {
                              $mesurement[]= array('date_before'=>$v['date_before'],'date_after'=>$v['date_after'],'value_before'=>$v['value_before'],'value_after'=>$v['value_after']);
           
                        }       
                    }
                }
            }
         }
         $this->set(compact('analysic','mesurement','pdca_id'));
    }
     /*
    Detail pdca residous
    */
    public function pdcaResidous()
    {
        $this->layout=false;
        $analysic = array();
        $mesurement = array();
        $pdca_id='';
        if ($this->RequestHandler->isAjax()) {
            $pdca_id= $this->request->data['pdca_id'];
            $this->loadModel('Pdca');
            $this->Pdca->Behaviors->attach('Containable');
            $pdca=$this->Pdca->find('first',array(
                                            'contain'=>array(
                                                            'PdcaMeasurement'=>array('Item',
                                                            'conditions'=>array('PdcaMeasurement.type'=>3))
                                                            ),
                                            'conditions'=>array('Pdca.id'=>$pdca_id),'recursive'=>2));
        
            if($pdca)
            {
                foreach($pdca['PdcaMeasurement'] as $k=>$v)
                {
                    if($v['measurement_type']==2)
                    {
                        $analysic[] = array('item_name'=>$v['Item']['item_name'],'value_before'=>$v['value_before'],'value_after'=>$v['value_after']); 
                    }
                    else{
                        if(!empty($v['date_before'])|| !empty($v['date_after']))
                        {
                              $mesurement[]= array('date_before'=>$v['date_before'],'date_after'=>$v['date_after'],'value_before'=>$v['value_before'],'value_after'=>$v['value_after']);
           
                        }       
                    }
                }
            }
         }
         $this->set(compact('analysic','mesurement','pdca_id'));
    }


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Instructor->exists($id)) {
			throw new NotFoundException(__('Invalid instructor'));
		}
		$options = array('conditions' => array('Instructor.' . $this->Instructor->primaryKey => $id));
		$this->set('instructor', $this->Instructor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Instructor->create();
			if ($this->Instructor->save($this->request->data)) {
				$this->Session->setFlash(__('The instructor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instructor could not be saved. Please, try again.'));
			}
		}
		$schools = $this->Instructor->School->find('list');
		$this->set(compact('schools'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Instructor->exists($id)) {
			throw new NotFoundException(__('Invalid instructor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Instructor->save($this->request->data)) {
				$this->Session->setFlash(__('The instructor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instructor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Instructor.' . $this->Instructor->primaryKey => $id));
			$this->request->data = $this->Instructor->find('first', $options);
		}
		$schools = $this->Instructor->School->find('list');
		$this->set(compact('schools'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Instructor->id = $id;
		if (!$this->Instructor->exists()) {
			throw new NotFoundException(__('Invalid instructor'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Instructor->delete()) {
			$this->Session->setFlash(__('The instructor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The instructor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
