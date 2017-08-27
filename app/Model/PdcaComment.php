<?php
App::uses('AppModel', 'Model');
/**
 * PdcaComment Model
 *
 * @property Pdca $Pdca
 */
class PdcaComment extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'pdca_comment';


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
	);
}
