<?php

class Projeto extends AppModel {

	public $useTable = 'projetos';
	
	public $hasMany = array(
		'AtendentesProjeto' => array(
			'className' => 'AtendentesProjeto',
			'foreignKey' => 'projeto_id'
		),
		'Chamada' => array(
			'className' => 'Chamada',
			'foreignKey' => 'projeto_id'
		)
	);

}