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
		)
	);

}