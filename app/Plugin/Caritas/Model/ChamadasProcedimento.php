<?php

class ChamadasProcedimento extends CaritasAppModel {

	public $useTable = 'chamadas_procedimentos';
	
	public $belongsTo = array(
		'Procedimento' => array(
			'className' => 'Caritas.Procedimento',
			'foreignKey' => 'procedimento_id'
		)
	);

}