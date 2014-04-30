<?php
App::uses('AppModel', 'Model');
class Permissao extends AdminAppModel {
	public $useDbConfig = 'autenticacao';
    public $useTable = 'permissoes';
	public $belongsTo = array(
		'Grupo' => array(
			'className' => 'Admin.Permissao',
			'foreignKey' => 'grupo_id'
		)
	);
	
}