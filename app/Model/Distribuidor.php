<?php

class Distribuidor extends AppModel {

	public $useTable = 'distribuidores';
	
	public $belongsTo = array(
		'Fornecedor'
	);

}