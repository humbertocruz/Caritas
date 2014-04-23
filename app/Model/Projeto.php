<?php

class Projeto extends CaritasAppModel {

	public $useTable = 'projetos';
	
	public $hasMany = array(
		'AtendentesProjeto' => array(
			'className' => 'Caritas.AtendentesProjeto',
			'foreignKey' => 'projeto_id'
		),
		'Chamada' => array(
			'className' => 'Caritas.Chamada',
			'foreignKey' => 'projeto_id'
		)
	);

}