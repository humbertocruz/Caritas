<?php

class Contato extends CaritasAppModel {

	public $useTable = 'contatos';

	public $hasMany = array(
		'ContatosInstituicao' => array(
			'className' => 'Caritas.ContatosInstituicao',
			'foreignKey' => 'contato_id'
		)
	);

}