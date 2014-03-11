<?php

class Edital extends CaritasAppModel {

	public $useTable = 'editais';
	
	public $belongsTo = array(
		'Orgao' => array(
			'className' => 'Caritas.Orgao'
		),
		'Projeto' => array(
			'className' => 'Caritas.Projeto'
		)
	);

}