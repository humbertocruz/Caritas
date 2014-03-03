<?php
class AtendentesController extends CaritasAppController {
	
	public function login() {
	
		if ($this->request->isPost()) {
					
			echo $this->Auth->password($this->request->data['Atendente']['senha']);
			
			if ($this->Auth->login()) {
				$this->Session->setFlash('Login');
				echo 'Autenticado!';
			} else {
				$this->Session->setFlash('Erro no Login');
			}
			
		}

	}
	
	public function logout() {
		
		$this->Auth->logout();
		$this->Session->setFlash('Você saiu do sistema!');
		$this->redirect('/');
	}

}