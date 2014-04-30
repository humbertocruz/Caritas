<?php
App::uses('AppModel', 'Model');
class Grupo extends AdminAppModel {
	public $useDbConfig = 'autenticacao';
    public $useTable = 'grupos';
	public $displayField = 'nome';
	public $hasMany = array(
		'Permissao' => array(
			'className' => 'Admin.Permissao',
			'foreignKey' => 'grupo_id'
		)
	);
	
}