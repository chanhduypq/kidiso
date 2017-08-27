<?php
App::uses('AppModel', 'Model');
/**
 * Evaluate Model
 *
 * @property Pdca $Pdca
 */
class Evaluate extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'evaluate';


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
		)
	);
}
