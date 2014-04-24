<?php

class Contato extends AppModel {

	public $useTable = 'contatos';
	
	public $order = array('Contato.nome'=>'ASC');

	public $hasMany = array(
		'ContatosInstituicao' => array(
			'className' => 'ContatosInstituicao',
			'foreignKey' => 'contato_id'
		),
		'ContatosFornecedor' => array(
			'className' => 'ContatosFornecedor',
			'foreignKey' => 'contato_id'
		),
		'ContatosFone' => array(
			'className' => 'ContatosFone',
			'foreignKey' => 'contato_id'
		),
		'ContatosEmail' => array(
			'className' => 'ContatosEmail',
			'foreignKey' => 'contato_id'
		)
	);
	
	public $belongsTo = array(
		'Sexo' => array(
			'className' => 'Sexo',
			'foreignKey' => 'sexo_id'
		)
	);

}