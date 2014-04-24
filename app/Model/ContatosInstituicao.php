<?php

class ContatosInstituicao extends AppModel {

	public $useTable = 'contatos_instituicoes';

	public $belongsTo = array(
		'Contato' => array(
			'className' => 'Contato',
			'foreignKey' => 'contato_id'
		),
		'Instituicao' => array(
			'className' => 'Instituicao',
			'foreignKey' => 'instituicao_id'
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