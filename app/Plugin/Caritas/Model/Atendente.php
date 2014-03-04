<?php

class Atendente extends CaritasAppModel {

	public $useTable = 'atendentes';
	
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

}