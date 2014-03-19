<?php

class AtasPreco extends CaritasAppModel {

	public $useTable = 'ata_precos';
	
	public $belongsTo = array(
		'Edital'
	);

}