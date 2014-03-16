<?php

class Link extends CaritasAppModel {

	public $useTable = 'links';
	
	public $belongsTo = array(
		'Menu' => array(
			'className' => 'Caritas.Menu',
			'foreignKey' => 'menu_id'
		)
	);
	
}