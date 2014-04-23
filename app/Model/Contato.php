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
		),
		'ContatosFone' => array(
			'className' => 'Caritas.ContatosFone',
			'foreignKey' => 'contato_id'
		),
		'ContatosEmail' => array(
			'className' => 'Caritas.ContatosEmail',
			'foreignKey' => 'contato_id'
		)
	);
	
	public $belongsTo = array(
		'Sexo' => array(
			'className' => 'Caritas.Sexo',
			'foreignKey' => 'sexo_id'
		)
	);

}