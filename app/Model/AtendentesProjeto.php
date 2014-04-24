<?php

class AtendentesProjeto extends AppModel {

	public $useTable = 'atendentes_projetos';
	
	public $belongsTo = array(
		'Projeto' => array(
			'className' => 'Projeto',
			'foreignKey' => 'projeto_id'
		),
		'Atendente' => array(
			'className' => 'Atendente',
			'foreignKey' => 'atendente_id'
		)
	);

}