<?php
class StatusController extends CaritasAppController {

	public $uses = array('Caritas.Status');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Status - Lista');

		// Carrega dados do BD
		$Statuss = $this->Status->find('all');
		$this->set('Statuss',$Statuss);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->Status->create();
			if ($this->Status->save($data)) {
				$this->Session->setFlash('Status salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Status');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Statuss - Adicionar');

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Status']['id'] = $id;
				if ($this->Status->save($data)) {
					$this->Session->setFlash('Status salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Status!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Atividades - Editar');
		
		$Atividade = $this->Atividade->read(null, $id);
		$this->request->data = $Atividade;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->Atividade->delete($id)) {
					$this->Session->setFlash('Atividade excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Atividade!');
				}
			}
		}
	}

}