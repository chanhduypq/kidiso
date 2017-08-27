<?php
App::uses('AppModel', 'Model');
/**
 * Pdca Model
 *
 * @property Pupil $Pupil
 * @property Evaluate $Evaluate
 */
class Pdca extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'pdca';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Pupil' => array(
			'className' => 'Pupil',
			'foreignKey' => 'pupil_id',
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
		'Evaluate' => array(
			'className' => 'Evaluate',
			'foreignKey' => 'pdca_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
        'PdcaMeasurement' => array(
			'className' => 'PdcaMeasurement',
			'foreignKey' => 'pdca_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
        'PdcaComment' => array(
			'className' => 'PdcaComment',
			'foreignKey' => 'pdca_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);

}
