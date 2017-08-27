<?php
App::uses('AppModel', 'Model');
/**
 * PdcaMeasurement Model
 *
 * @property Pdca $Pdca
 * @property Item $Item
 */
class PdcaMeasurement extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'pdca_measurement';

/**
 * Primary key field
 *
 * @var string
 */
	//public $primaryKey = 'gas_type';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Pdca' => array(
			'className' => 'Pdca',
			'foreignKey' => 'pdca_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Item' => array(
			'className' => 'Item',
			'foreignKey' => 'item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    public function savePdcaMesurement($aData=array())
    {
        
        if(!empty($aData))
        {            
            if(isset($aData['id'])){
                $this->set('id', $aData['id']);
            }
            
            if(isset($aData['pdca_id'])){
                $this->set('pdca_id', $aData['pdca_id']);
            }
            
            if(isset($aData['type'])){
                $this->set('type', $aData['type']);
            }
            
            if(isset($aData['measurement_type'])){
                $this->set('measurement_type', $aData['measurement_type']);
            }
            
            if(isset($aData['date_before'])){
                $this->set('date_before', $aData['date_before']);
            }
            
            if(isset($aData['value_before'])){
                $this->set('value_before', $aData['value_before']);
            }
            
            if(isset($aData['date_after'])){
                $this->set('date_after', $aData['date_after']);
            }
            
            if(isset($aData['value_after'])){
                $this->set('value_after', $aData['value_after']);
            }
            
            if(isset($aData['gas_type'])){
                $this->set('gas_type', $aData['gas_type']);
            }
            
            if(isset($aData['item_id'])){
                $this->set('item_id', $aData['item_id']);
            }   
            if(isset($aData['waste_type'])){
                $this->set('waste_type', $aData['waste_type']);
            }   
            if($this->save())
            {
                return true;
            }
            else {
                return false;
            }
        }else{
            return false;
        }
        
        
    }
}
