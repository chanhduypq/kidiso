<?php
App::uses('AppModel', 'Model');
/**
 * SchoolAdmin Model
 *
 * @property School $School
 */
class SchoolAdmin extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'school_admin';

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
		'School' => array(
			'className' => 'School',
			'foreignKey' => 'school_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
