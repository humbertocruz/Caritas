<?php

class Projeto extends CaritasAppModel {

	public $useTable = 'projetos';
	
	public $belongsTo = array(
		'AtendentesProjeto' => array(
			'className' => 'Caritas.AtendentesProjeto',
			'foreignKey' => 'projeto_id'
		)
	);

}