<?php

class Chamada extends AppModel {

	public $belongsTo = array(

		'Instituicao',
		'Assunto',
		'Estado',
		'Cidade',
		'TiposChamada' => array(
			'className' => 'TiposChamada',
			'foreignKey' => 'tipo_chamada_id'
		)
	);

}