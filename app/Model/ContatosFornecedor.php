<?php

class ContatosFornecedor extends CaritasAppModel {

	public $useTable = 'contatos_fornecedores';

	public $belongsTo = array(
		'Contato' => array(
			'className' => 'Caritas.Contato',
			'foreignKey' => 'contato_id'
		),
		'Fornecedor' => array(
			'className' => 'Caritas.Fornecedor',
			'foreignKey' => 'fornecedor_id'
		),
		'Cargo' => array(
			'className' => 'Caritas.Cargo',
			'foreignKey' => 'cargo_id'
		),
		'SituacoesContato' => array(
			'className' => 'Caritas.SituacoesContato',
			'foreignKey' => 'situacao_contato_id'
		)
	);

}