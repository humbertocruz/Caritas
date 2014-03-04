<?php

class NiveisAcesso extends CaritasAppModel {

	public $useTable = 'niveis_acesso';
	
	public $hasMany = array(
		'Atendente' => array(
			'className' => 'Caritas.Atendente',
			'foreignKey' => 'nivel_acesso_id'
		)
	);
	
}