<?php

class Cidade extends AppModel {

	public $useTable = 'cidades';
	
	public $belongsTo = array(
		'Estado'
	);

}