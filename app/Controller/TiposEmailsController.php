<?php
class TiposEmailsController extends CaritasAppController {

	public $uses = array('Caritas.TiposEmail');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Tipos de Email - Lista');

		// Carrega dados do BD
		$TiposEmails = $this->TiposEmail->find('all');
		$this->set('TiposEmails',$TiposEmails);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->TiposEmail->create();
			if ($this->TiposEmail->save($data)) {
				$this->Session->setFlash('Tipos de Email salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Tipos de Email');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Tipos de Email - Adicionar');

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['TiposEmail']['id'] = $id;
				if ($this->TiposEmail->save($data)) {
					$this->Session->setFlash('Tipos de Email salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Tipos de Email!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Tipos de Email - Editar');
		
		$TiposEmail = $this->TiposEmail->read(null, $id);
		$this->request->data = $TiposEmail;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->TiposEmail->delete($id)) {
					$this->Session->setFlash('Tipos de Email excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Tipos de Email!');
				}
			}
		}
	}

}