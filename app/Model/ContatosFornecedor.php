<?php

class ContatosFornecedor extends AppModel {

	public $useTable = 'contatos_fornecedores';

	public $belongsTo = array(
		'Contato' => array(
			'className' => 'Contato',
			'foreignKey' => 'contato_id'
		),
		'Fornecedor' => array(
			'className' => 'Fornecedor',
			'foreignKey' => 'fornecedor_id'
		),
		'Cargo' => array(
			'className' => 'Cargo',
			'foreignKey' => 'cargo_id'
		),
		'SituacoesContato' => array(
			'className' => 'SituacoesContato',
			'foreignKey' => 'situacao_contato_id'
		)
	);

}