<?php
class AssuntosController extends CaritasAppController {

	public $uses = array('Caritas.Assunto');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Assuntos - Lista');
		// Carrega dados do BD
		$assuntos = $this->Assunto->find('all');
		$this->set('Assuntos',$assuntos);
	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->Assunto->create();
			if ($this->Assunto->save($data)) {
				$this->Session->setFlash('Assunto salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Assunto');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Assuntos - Adicionar');

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Assunto']['id'] = $id;
				if ($this->Assunto->save($data)) {
					$this->Session->setFlash('Assunto salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Assunto!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Assuntos - Editar');
		
		$Assunto = $this->Assunto->read(null, $id);
		$this->request->data = $Assunto;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->Assunto->delete($id)) {
					$this->Session->setFlash('Assunto excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Assunto!');
				}
			}
		}
	}

}