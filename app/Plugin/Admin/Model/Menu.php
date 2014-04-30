<?php
App::uses('AppModel', 'Model');
class Menu extends AdminAppModel {

	public $useDbConfig = 'sistemas';

	public $displayField = 'texto';

	public $validate = array(
		'texto' => array(
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
	);

	public $belongsTo = array(
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
	);

}
