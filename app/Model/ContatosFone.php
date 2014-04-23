<?php

class ContatosFone extends CaritasAppModel {

	public $useTable = 'contatos_fones';
	
	public $belongsTo = array(
		'TiposFone' => array(
			'className' => 'Caritas.TiposFone',
			'foreignKey' => 'tipo_fone_id'
		)
	);

}