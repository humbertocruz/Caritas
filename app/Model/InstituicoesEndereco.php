<?php

class InstituicoesEndereco extends AppModel {

	public $useTable = 'instituicoes_enderecos';

	public $belongsTo = array(
		'Instituicao' => array(
			'className' => 'Instituicao',
			'foreignKey' => 'instituicao_id'
		),
		'Cidade' => array(
			'className' => 'Cidade',
			'foreignKey' => 'cidade_id'
		)
	);

}