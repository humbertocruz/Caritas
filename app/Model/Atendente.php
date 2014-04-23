<?php

class Atendente extends AppModel {

	public $useTable = 'atendentes';
	public $recursive = 2;
	
	public $hasMany = array(
		'AtendentesProjeto' => array(
			'className' => 'AtendentesProjeto',
			'foreignKey' => 'atendente_id'
		)
	);
	
	public $belongsTo = array(
		'Sexo' => array(
			'className' => 'Sexo',
			'foreignKey' => 'sexo_id'
		),
		'NiveisAcesso' => array(
			'className' => 'NiveisAcesso',
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