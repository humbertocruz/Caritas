<?php
class ProcessosController extends CaritasAppController {

	public $uses = array('Caritas.Processo');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Processo - Lista');

		// Carrega dados do BD
		$Processos = $this->Processo->find('all');
		$this->set('Processos',$Processos);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->Processo->create();
			if ($this->Processo->save($data)) {
				$this->Session->setFlash('Processo salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Processo');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Processos - Adicionar');

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Processo']['id'] = $id;
				if ($this->Processo->save($data)) {
					$this->Session->setFlash('Processo salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Processo!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Processos - Editar');
		
		$Processo = $this->Processo->read(null, $id);
		$this->request->data = $Processo;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->Processo->delete($id)) {
					$this->Session->setFlash('Processo excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Processo!');
				}
			}
		}
	}

}