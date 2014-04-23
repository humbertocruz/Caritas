<?php
class CargosController extends CaritasAppController {

	public $uses = array('Caritas.Cargo');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Cargos - Lista');

		// Carrega dados do BD
		$Cargos = $this->paginate('Cargo');
		$this->set('Cargos',$Cargos);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->Cargo->create();
			if ($this->Cargo->save($data)) {
				$this->Session->setFlash('Cargo salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Cargo');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Cargos - Adicionar');

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Cargo']['id'] = $id;
				if ($this->Cargo->save($data)) {
					$this->Session->setFlash('Cargo salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Cargo!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Cargos - Editar');
		
		$Cargo = $this->Cargo->read(null, $id);
		$this->request->data = $Cargo;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->Cargo->delete($id)) {
					$this->Session->setFlash('Cargo excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Cargo!');
				}
			}
		}
	}

}