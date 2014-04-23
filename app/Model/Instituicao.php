<?php

class Instituicao extends CaritasAppModel {

	public $useTable = 'instituicoes';

	public $hasMany = array(
		'ContatosInstituicao' => array(
			'className' => 'Caritas.ContatosInstituicao',
			'foreignKey' => 'instituicao_id'
		),
		'Chamada' => array(
			'className' => 'Caritas.Chamada',
			'foreignKey' => 'instituicao_id'
		),
		'InstituicoesEndereco' => array(
			'className' => 'Caritas.InstituicoesEndereco',
			'foreignKey' => 'instituicao_id'
		)
	);

}