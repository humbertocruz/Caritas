<?php

class Distribuidor extends CaritasAppModel {

	public $useTable = 'distribuidores';
	
	public $belongsTo = array(
		'Fornecedor'
	);

}