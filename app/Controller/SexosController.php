<?php
class SexosController extends CaritasAppController {

	public $uses = array('Caritas.Sexo');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Sexo - Lista');

		// Carrega dados do BD
		$Sexos = $this->Sexo->find('all');
		$this->set('Sexos',$Sexos);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->Sexo->create();
			if ($this->Sexo->save($data)) {
				$this->Session->setFlash('Sexo salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Sexo');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Sexos - Adicionar');

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Sexo']['id'] = $id;
				if ($this->Sexo->save($data)) {
					$this->Session->setFlash('Sexo salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Sexo!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Sexos - Editar');
		
		$Sexo = $this->Sexo->read(null, $id);
		$this->request->data = $Sexo;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->Sexo->delete($id)) {
					$this->Session->setFlash('Sexo excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Sexo!');
				}
			}
		}
	}

}