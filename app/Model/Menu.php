<?php

class Menu extends AppModel {

	public $useTable = 'menus';
	
	public $belongsTo = array(
		'NiveisAcesso' => array(
			'className' => 'NiveisAcesso',
			'foreignKey' => 'nivel_acesso_id'
		)
	);
	
	public $hasMany = array(
		'Link' => array(
			'className' => 'Link',
			'foreignKey' => 'menu_id'
		)
	);
}