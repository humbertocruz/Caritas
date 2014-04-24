<?php

class Instituicao extends AppModel {

	public $useTable = 'instituicoes';

	public $hasMany = array(
		'ContatosInstituicao' => array(
			'className' => 'ContatosInstituicao',
			'foreignKey' => 'instituicao_id'
		),
		'Chamada' => array(
			'className' => 'Chamada',
			'foreignKey' => 'instituicao_id'
		),
		'InstituicoesEndereco' => array(
			'className' => 'InstituicoesEndereco',
			'foreignKey' => 'instituicao_id'
		)
	);

}