<?php

class AtendentesProjeto extends CaritasAppModel {

	public $useTable = 'atendentes_projetos';
	
	public $belongsTo = array(
		'Projeto' => array(
			'className' => 'Caritas.Projeto',
			'foreignKey' => 'projeto_id'
		),
		'Atendente' => array(
			'className' => 'Caritas.Atendente',
			'foreignKey' => 'atendente_id'
		)
	);

}