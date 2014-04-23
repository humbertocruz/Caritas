<?php

class FornecedoresEndereco extends CaritasAppModel {

	public $useTable = 'fornecedores_enderecos';

	public $belongsTo = array(
		'Fornecedor' => array(
			'className' => 'Caritas.Forcedor',
			'foreignKey' => 'fornecedor_id'
		),
		'Cidade' => array(
			'className' => 'Caritas.Cidade',
			'foreignKey' => 'cidade_id'
		)
	);

}