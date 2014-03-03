<?php
class AtendentesController extends CaritasAppController {

	public function home() {
		
	}
	
	public function login() {
	
		if ($this->request->isPost()) {
			
			if ($this->Auth->login()) {
				$this->Session->setFlash('Atendente autenticado com successo!');
				$this->redirect('/');
			} else {
				$this->Session->setFlash('Erro na autenticação do Atendente!');
			}
			
		}

	}
	
	public function logout() {
		
		$this->Auth->logout();
		$this->Session->setFlash('Você saiu do sistema!');
		$this->redirect('/');
	}

}