<?php

class NiveisAcesso extends CaritasAppModel {

	public $useTable = 'niveis_acesso';
	
	public $hasMany = array(
		'Atendente' => array(
			'className' => 'Caritas.Atendente',
			'foreignKey' => 'nivel_acesso_id'
		)
	);
	
	public $validate = array(
		'nome' => array(
			'minLength' => array(
				'rule' => array('minLength', 5),
				'message' => 'Este campo deve ter mais de 5 caracteres!'
			)
		)
	);
	
}