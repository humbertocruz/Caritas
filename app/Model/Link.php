<?php

class Link extends AppModel {

	public $useTable = 'links';
	
	public $belongsTo = array(
		'Menu' => array(
			'className' => 'Menu',
			'foreignKey' => 'menu_id'
		)
	);
	
}