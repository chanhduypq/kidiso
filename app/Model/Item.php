<?php
App::uses('AppModel', 'Model');
/**
 * Item Model
 *
 * @property PdcaMeasurement $PdcaMeasurement
 */
class Item extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'item';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'PdcaMeasurement' => array(
			'className' => 'PdcaMeasurement',
			'foreignKey' => 'item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
