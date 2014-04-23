<?php

class TiposChamada extends CaritasAppModel {

	public $useTable = 'tipos_chamada';

	public $hasMany = array(
		'Chamada' => array(
			'foreignKey' => 'tipo_chamada_id'
		)
	);

}