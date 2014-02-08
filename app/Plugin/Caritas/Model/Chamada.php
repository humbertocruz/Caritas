<?php

class Chamada extends CaritasAppModel {

	public $belongsTo = array(

		'Instituicao' => array(
			'className' => 'Caritas.Instituicao',
			'foreignKey' => 'instituicao_id'
		),
		'Contato' => array(
			'className' => 'Caritas.Contato',
			'foreignKey' => 'contato_id'
		),
		'Fornecedor' => array(
			'className' => 'Caritas.Fornecedor',
			'foreignKey' => 'fornecedor_id'
		),
		'Assunto' => array(
			'className' => 'Caritas.Assunto',
			'foreignKey' => 'assunto_id'
		),
		'Atendente' => array(
			'className' => 'Caritas.Atendente',
			'foreignKey' => 'atendente_id'
		),
		'Estado' => array(
			'className' => 'Caritas.Estado',
			'foreignKey' => 'estado_id'
		),
		'Cidade' => array(
			'className' => 'Caritas.Cidade',
			'foreignKey' => 'cidade_id'
		),
		'TiposChamada' => array(
			'className' => 'Caritas.TiposChamada',
			'foreignKey' => 'tipo_chamada_id'
		)
	);

}