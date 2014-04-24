<?php

class TiposChamada extends AppModel {

	public $useTable = 'tipos_chamada';

	public $hasMany = array(
		'Chamada' => array(
			'foreignKey' => 'tipo_chamada_id'
		)
	);

}