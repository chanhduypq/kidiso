<?php
App::uses('AppModel', 'Model');
/**
 * Class Model
 *
 * @property School $School
 * @property Instructor $Instructor
 * @property Pupil $Pupil
 */
class Classes extends AppModel {

	public $useTable = 'classes';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $displayField = 'class_name';
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
		),
		'Instructor' => array(
			'className' => 'Instructor',
			'foreignKey' => 'instructor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Pupil' => array(
			'className' => 'Pupil',
			'foreignKey' => 'classes_id',
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
