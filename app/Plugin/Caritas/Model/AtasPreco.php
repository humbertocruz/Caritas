<?php

class AtasPreco extends CaritasAppModel {

	public $useTable = 'atas_precos';
	
	public $belongsTo = array(
		'Edital'
	);

}