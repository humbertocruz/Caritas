<?php

class Atendente extends CaritasAppModel {

	public $useTable = 'atendentes';
	public $recursive = 2;
	
	public $hasMany = array(
		'AtendentesProjeto' => array(
			'className' => 'Caritas.AtendentesProjeto',
			'foreignKey' => 'atendente_id'
		)
	);
	
	public $belongsTo = array(
		'Sexo' => array(
			'className' => 'Caritas.Sexo',
			'foreignKey' => 'sexo_id'
		),
		'NiveisAcesso' => array(
			'className' => 'Caritas.NiveisAcesso',
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