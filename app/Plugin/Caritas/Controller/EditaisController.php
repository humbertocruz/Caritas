<?php
class EditaisController extends CaritasAppController {

	public $uses = array('Caritas.Edital');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Editais - Lista');

		$filtros = array('Edital.projeto_id'=>$this->escolhido_projeto_id);

		// Carrega dados do BD
		$Editais = $this->Edital->find('all', array('conditions'=>$filtros));
		$this->set('Editais',$Editais);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->Edital->create();
			if ($this->Edital->save($data)) {
				$this->Session->setFlash('Edital salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Edital');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Editais - Adicionar');

		$Orgaos = $this->Edital->Orgao->find('list', array('fields'=>array('id','nome')));
		$this->set('Orgaos', $Orgaos);
		$Projetos = $this->Edital->Projeto->find('list', array('fields'=>array('id','nome')));
		$this->set('Projetos', $Projetos);
		
		$this->request->data['Edital']['projeto_id'] = $this->escolhido_projeto_id;


		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Edital']['id'] = $id;
				if ($this->Edital->save($data)) {
					$this->Session->setFlash('Edital salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Edital!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Editais - Editar');
		
		$Orgaos = $this->Edital->Orgao->find('list', array('fields'=>array('id','nome')));
		$this->set('Orgaos', $Orgaos);
		$Projetos = $this->Edital->Projeto->find('list', array('fields'=>array('id','nome')));
		$this->set('Projetos', $Projetos);

		$Edital = $this->Edital->read(null, $id);
		$this->request->data = $Edital;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->Edital->delete($id)) {
					$this->Session->setFlash('Edital excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Edital!');
				}
			}
		}
	}

}