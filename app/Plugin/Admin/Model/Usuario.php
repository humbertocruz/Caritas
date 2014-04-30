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
		)
	);
	// relacao com usuario do sistema
	public $hasOne = array(
		'Atendente' => array(
			'className' => 'Atendente',
			'foreignKey' => 'usuario_id'
		)
	);
	
}
