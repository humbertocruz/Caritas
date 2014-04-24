<?php

class Fornecedor extends AppModel {

	public $useTable = 'fornecedores';

	public $hasMany = array(
		'Chamada' => array(
			'foreignKey' => 'fornecedor_id'
		),
		'FornecedoresEndereco' => array(
			'className' => 'FornecedoresEndereco',
			'foreignKey' => 'fornecedor_id'
		)
	);

}