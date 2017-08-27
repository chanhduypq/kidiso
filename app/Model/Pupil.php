<?php
App::uses('AppModel', 'Model');
/**
 * Pupil Model
 *
 * @property Pdca $Pdca
 * @property Class $Class
 */
class Pupil extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'pupil';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Pdca' => array(
			'className' => 'Pdca',
			'foreignKey' => 'pupil_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
      'dependent' => true,
		)
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Classes' => array(
			'className' => 'Classes',
			'foreignKey' => 'classes_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        public function get_all_items_123($pdca_id,$item_type){
            return $this->query("select pdca_measurement.id,item.id,item.item_name,pdca_measurement.value_before,pdca_measurement.value_after from item 
                                                left join 
                                                pdca_measurement
                                                on pdca_measurement.item_id=item.id and pdca_id='$pdca_id' and pdca_measurement.measurement_type=2
                                                where item.type=$item_type");   
        }
        public function get_all_items_date($pdca_id,$item_type){            
            $rows=$this->query("select pdca_measurement.id,pdca_measurement.value_before,pdca_measurement.date_before,pdca_measurement.value_after,pdca_measurement.date_after,pdca_measurement.waste_type from pdca_measurement                                          
                                                where type=$item_type and pdca_id='$pdca_id' and pdca_measurement.measurement_type=1");               
            if(!is_array($rows)||count($rows)==0){
                if($item_type==1){
                    for($i=0;$i<NUMBER_OF_DATE_IN_TAB1;$i++){
                        $rows[]=array('pdca_measurement'=>array(
                                                      'id'=>'',
                                                      'value_before'=>'',
                                                      'date_before'=>'',
                                                      'value_after'=>'',
                                                      'date_after'=>'',
                                                      'waste_type'=>''                                                      
                                                      )
                        );
                    }                    
                }
                else if($item_type==2){
                    for($i=0;$i<NUMBER_OF_DATE_IN_TAB2;$i++){
                        $rows[]=array('pdca_measurement'=>array(
                                                      'id'=>'',
                                                      'value_before'=>'',
                                                      'date_before'=>'',
                                                      'value_after'=>'',
                                                      'date_after'=>'',
                                                      'waste_type'=>''                                                      
                                                      )
                        );
                    }                    
                }
                else if($item_type==3){
                    for($i=0;$i<NUMBER_OF_DATE_IN_TAB3;$i++){
                        $rows[]=array('pdca_measurement'=>array(
                                                      'id'=>'',
                                                      'value_before'=>'',
                                                      'date_before'=>'',
                                                      'value_after'=>'',
                                                      'date_after'=>'',
                                                      'waste_type'=>''                                                      
                                                      )
                        );
                    }                    
                }
                else if($item_type==4){
                    for($i=0;$i<NUMBER_OF_DATE_IN_TAB4;$i++){
                        $rows[]=array('pdca_measurement'=>array(
                                                      'id'=>'',
                                                      'value_before'=>'',
                                                      'date_before'=>'',
                                                      'value_after'=>'',
                                                      'date_after'=>'',
                                                      'waste_type'=>''                                                      
                                                      )
                        );
                    }                    
                }
            }
            return $rows;
        }
        
}
