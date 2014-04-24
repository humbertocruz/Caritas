<?php

class Convenio extends AppModel {

	public $useTable = 'convenios';
	
	public $belongsTo = array(
		'Instituicao'
	);

}