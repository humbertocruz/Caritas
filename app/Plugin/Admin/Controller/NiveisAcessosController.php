<?php
class NiveisAcessosController extends AdminAppController {

	public $uses = array('Caritas.NiveisAcesso');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Níveis de Acesso - Lista');

		// Carrega dados do BD
		$NiveisAcessos = $this->NiveisAcesso->find('all');
		$this->set('NiveisAcessos',$NiveisAcessos);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->NiveisAcesso->create();
			if ($this->NiveisAcesso->save($data)) {
				$this->Session->setFlash('Nível de Acesso salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Nível de Acesso');
				//pr($this->NiveisAcesso->invalidFields());
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Nível de Acesso - Adicionar');

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['NiveisAcesso']['id'] = $id;
				if ($this->NiveisAcesso->save($data)) {
					$this->Session->setFlash('Nível de Acesso salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Nível de Acesso!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Nível de Acesso - Editar');
		
		$NiveisAcesso = $this->NiveisAcesso->read(null, $id);
		$this->request->data = $NiveisAcesso;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->NiveisAcesso->delete($id)) {
					$this->Session->setFlash('Nível de Acesso excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Nível de Acesso!');
				}
			}
		}
	}

}