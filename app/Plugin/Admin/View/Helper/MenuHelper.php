<?php

App::uses('AppHelper', 'View/Helper');

class MenuHelper extends AppHelper {
	
	var $admin_menu = array(
		'Link' => array(
			'text' => 'Home',
			'plugin' => '',
			'controller' => '',
			'action' => ''
		)
	);

	public function generate() {
		
		return $this->admin_menu;
		
	}
	
}
