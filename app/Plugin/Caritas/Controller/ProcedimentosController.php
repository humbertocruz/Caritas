<?php
class ProcedimentosController extends CaritasAppController {

	public $uses = array('Caritas.Procedimento');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Procedimento - Lista');

		// Carrega dados do BD
		$Procedimentos = $this->Procedimento->find('all');
		$this->set('Procedimentos',$Procedimentos);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->Procedimento->create();
			if ($this->Procedimento->save($data)) {
				$this->Session->setFlash('Procedimento salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Procedimento');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Procedimentos - Adicionar');

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Procedimento']['id'] = $id;
				if ($this->Procedimento->save($data)) {
					$this->Session->setFlash('Procedimento salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Procedimento!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Procedimentos - Editar');
		
		$Procedimento = $this->Procedimento->read(null, $id);
		$this->request->data = $Procedimento;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->Procedimento->delete($id)) {
					$this->Session->setFlash('Procedimento excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Procedimento!');
				}
			}
		}
	}

}