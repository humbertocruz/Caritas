<?php

class FornecedoresEndereco extends AppModel {

	public $useTable = 'fornecedores_enderecos';

	public $belongsTo = array(
		'Fornecedor' => array(
			'className' => 'Forcedor',
			'foreignKey' => 'fornecedor_id'
		),
		'Cidade' => array(
			'className' => 'Cidade',
			'foreignKey' => 'cidade_id'
		)
	);

}