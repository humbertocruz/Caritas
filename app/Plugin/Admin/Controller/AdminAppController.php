<?php

App::uses('Controller', 'Controller');

class AdminAppController extends AppController {
	
	public $uses = array('Sites.Menu');
	
	public function beforeFilter() {

		// Carregar Layout bootstrap
		$this->layout = 'Admin.admin';
		$menus = $this->MenuAdmin->generate();
		$this->set('menus', $menus);
		$this->set('usuario', $this->Auth->user());
	}

}
