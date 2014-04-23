<?php
class ProjetosController extends CaritasAppController {

	public $uses = array('Caritas.Projeto');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Projeto - Lista');

		// Carrega dados do BD
		$Projetos = $this->Projeto->find('all');
		$this->set('Projetos',$Projetos);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->Projeto->create();
			if ($this->Projeto->save($data)) {
				$this->Session->setFlash('Projeto salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Projeto');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Projetos - Adicionar');

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Projeto']['id'] = $id;
				if ($this->Projeto->save($data)) {
					$this->Session->setFlash('Projeto salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Projeto!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Projetos - Editar');
		
		$Projeto = $this->Projeto->read(null, $id);
		$this->request->data = $Projeto;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->Projeto->delete($id)) {
					$this->Session->setFlash('Projeto excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Projeto!');
				}
			}
		}
	}

}