<?php
class AtividadesController extends CaritasAppController {

	public $uses = array('Caritas.Atividade');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Atividade - Lista');

		// Carrega dados do BD
		$Atividades = $this->Atividade->find('all');
		$this->set('Atividades',$Atividades);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->Atividade->create();
			if ($this->Atividade->save($data)) {
				$this->Session->setFlash('Atividade salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Atividade');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Atividades - Adicionar');

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Atividade']['id'] = $id;
				if ($this->Atividade->save($data)) {
					$this->Session->setFlash('Atividade salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Atividade!');
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