<?php
class AtendentesController extends CaritasAppController {
	
	public function login() {
	
		if ($this->request->isPost()) {
			
			if ($this->Auth->login($this->data)) {
				echo 'Autenticado!';
			}
			
		}

	}
	
	public function logout() {
		
		$this->Auth->logout();
		$this->Session->setFlash('Você saiu do sistema!');
		$this->redirect('/');
	}

}