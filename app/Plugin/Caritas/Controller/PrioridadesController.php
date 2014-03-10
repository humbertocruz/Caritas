<?php
class PrioridadesController extends CaritasAppController {

	public $uses = array('Caritas.Prioridade');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Prioridade - Lista');

		// Carrega dados do BD
		$Prioridades = $this->Prioridade->find('all');
		$this->set('Prioridades',$Prioridades);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->Prioridade->create();
			if ($this->Prioridade->save($data)) {
				$this->Session->setFlash('Prioridade salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Prioridade');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Prioridades - Adicionar');

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Prioridade']['id'] = $id;
				if ($this->Prioridade->save($data)) {
					$this->Session->setFlash('Prioridade salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Prioridade!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Prioridades - Editar');
		
		$Prioridade = $this->Prioridade->read(null, $id);
		$this->request->data = $Prioridade;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->Prioridade->delete($id)) {
					$this->Session->setFlash('Prioridade excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Prioridade!');
				}
			}
		}
	}

}