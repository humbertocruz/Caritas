<?php
App::uses('AppModel', 'Model');
class Usuario extends AdminAppModel {
	public $useDbConfig = 'autenticacao';
	public $useTable = 'usuarios';
	public $displayField = 'nome';
	public $belongsTo = array(
		'Grupo' => array(
			'className' => 'Admin.Grupo',
			'foreignKey' => 'grupo_id'
		),
		'Site' => array(
			'className' => 'Portal.Site',
			'foreignKey' => 'site_id'
		)
	);
	
}
