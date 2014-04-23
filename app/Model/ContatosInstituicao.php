<?php

class ContatosInstituicao extends CaritasAppModel {

	public $useTable = 'contatos_instituicoes';

	public $belongsTo = array(
		'Contato' => array(
			'className' => 'Caritas.Contato',
			'foreignKey' => 'contato_id'
		),
		'Instituicao' => array(
			'className' => 'Caritas.Instituicao',
			'foreignKey' => 'instituicao_id'
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