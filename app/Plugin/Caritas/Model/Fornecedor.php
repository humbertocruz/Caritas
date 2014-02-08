<?php

class Fornecedor extends CaritasAppModel {

	public $useTable = 'fornecedores';

	public $hasMany = array(
		'Chamada' => array(
			'foreignKey' => 'fornecedor_id'
		),
		'FornecedoresEndereco' => array(
			'className' => 'Caritas.FornecedoresEndereco',
			'foreignKey' => 'fornecedor_id'
		)
	);

}