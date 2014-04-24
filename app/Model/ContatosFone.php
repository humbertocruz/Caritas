<?php

class ContatosFone extends AppModel {

	public $useTable = 'contatos_fones';
	
	public $belongsTo = array(
		'TiposFone' => array(
			'className' => 'TiposFone',
			'foreignKey' => 'tipo_fone_id'
		)
	);

}