<?php

class Atendente extends CaritasAppModel {

	public $useTable = 'atendentes';
	
	public $belongsTo = array(
		'AtendentesProjeto' => array(
			'className' => 'Caritas.AtendentesProjeto',
			'foreignKey' => 'atendente_id'
		)
	);

}