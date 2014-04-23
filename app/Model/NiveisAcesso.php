<?php

class NiveisAcesso extends AppModel {

	public $useTable = 'niveis_acessos';
	
	public $hasMany = array(
		'Atendente' => array(
			'className' => 'Atendente',
			'foreignKey' => 'nivel_acesso_id'
		),
		'Permissao' => array(
			'className' => 'Permissao',
			'foreignKey' => 'nivel_acesso_id'
		)
	);
	
}