<?php

App::uses('Controller', 'Controller');

class AdminAppController extends AppController {
		
	public function beforeFilter() {

		// Carregar Layout bootstrap
		$this->layout = 'Admin.admin';
		$menus = $this->Menus->generate();
		$this->set('menus', $menus);
		$this->set('usuario', $this->Auth->user());
	}

}
