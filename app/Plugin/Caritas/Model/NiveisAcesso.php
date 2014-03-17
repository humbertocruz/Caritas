<?php

class NiveisAcesso extends CaritasAppModel {

	public $useTable = 'niveis_acessos';
	
	public $hasMany = array(
		'Atendente' => array(
			'className' => 'Caritas.Atendente',
			'foreignKey' => 'nivel_acesso_id'
		),
		'Permissao' => array(
			'className' => 'Caritas.Permissao',
			'foreignKey' => 'nivel_acesso_id'
		)
	);
	
}