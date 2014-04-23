<?php

class Cidade extends CaritasAppModel {

	public $useTable = 'cidades';
	
	public $belongsTo = array(
		'Estado'
	);

}