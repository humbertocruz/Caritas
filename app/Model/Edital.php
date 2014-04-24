<?php

class Edital extends AppModel {

	public $useTable = 'editais';
	
	public $belongsTo = array(
		'Orgao' => array(
			'className' => 'Orgao'
		),
		'Projeto' => array(
			'className' => 'Projeto'
		)
	);

}