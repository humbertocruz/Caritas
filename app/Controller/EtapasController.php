<?php
class EtapasController extends CaritasAppController {

	public $uses = array('Caritas.Etapa');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Etapa - Lista');

		// Carrega dados do BD
		$Etapas = $this->Etapa->find('all');
		$this->set('Etapas',$Etapas);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->Etapa->create();
			if ($this->Etapa->save($data)) {
				$this->Session->setFlash('Etapa salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Etapa');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Etapas - Adicionar');

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Etapa']['id'] = $id;
				if ($this->Etapa->save($data)) {
					$this->Session->setFlash('Etapa salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Etapa!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Etapas - Editar');
		
		$Etapa = $this->Etapa->read(null, $id);
		$this->request->data = $Etapa;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->Etapa->delete($id)) {
					$this->Session->setFlash('Etapa excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Etapa!');
				}
			}
		}
	}

}