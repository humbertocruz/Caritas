<?php

class Convenio extends CaritasAppModel {

	public $useTable = 'convenios';
	
	public $belongsTo = array(
		'Instituicao'
	);

}