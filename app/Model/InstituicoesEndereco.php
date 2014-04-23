<?php

class InstituicoesEndereco extends CaritasAppModel {

	public $useTable = 'instituicoes_enderecos';

	public $belongsTo = array(
		'Instituicao' => array(
			'className' => 'Caritas.Instituicao',
			'foreignKey' => 'instituicao_id'
		),
		'Cidade' => array(
			'className' => 'Caritas.Cidade',
			'foreignKey' => 'cidade_id'
		)
	);

}