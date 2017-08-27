<?php
App::uses('AppModel', 'Model');
/**
 * SubAdmin Model
 *
 * @property District $District
 */
class SubAdmin extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'sub_admin';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'District' => array(
			'className' => 'District',
			'foreignKey' => 'district_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
