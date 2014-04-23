<?php

class Menu extends CaritasAppModel {

	public $useTable = 'menus';
	
	public $belongsTo = array(
		'NiveisAcesso' => array(
			'className' => 'Caritas.NiveisAcesso',
			'foreignKey' => 'nivel_acesso_id'
		)
	);
	
	public $hasMany = array(
		'Link' => array(
			'className' => 'Caritas.Link',
			'foreignKey' => 'menu_id'
		)
	);
}