<?php

class Contato extends CaritasAppModel {

	public $useTable = 'contatos';

	public $hasMany = array(
		'ContatosInstituicao' => array(
			'className' => 'Caritas.ContatosInstituicao',
			'foreignKey' => 'contato_id'
		),
		'ContatosFornecedor' => array(
			'className' => 'Caritas.ContatosFornecedor',
			'foreignKey' => 'contato_id'
		)
	);

}