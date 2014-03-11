<?php
class DistribuidoresController extends CaritasAppController {

	public $uses = array('Caritas.Distribuidor');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Distribuidor - Lista');

		// Carrega dados do BD
		$Distribuidores = $this->Distribuidor->find('all');
		$this->set('Distribuidores',$Distribuidores);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->Distribuidor->create();
			if ($this->Distribuidor->save($data)) {
				$this->Session->setFlash('Distribuidor salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Distribuidor');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Distribuidores - Adicionar');

		$Fornecedores = $this->Distribuidor->Fornecedor->find('list', array('fields'=>array('id','nome_fantasia')));
		$this->set('Fornecedores', $Fornecedores);

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Distribuidor']['id'] = $id;
				if ($this->Distribuidor->save($data)) {
					$this->Session->setFlash('Distribuidor salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Distribuidor!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Distribuidores - Editar');
		
		$Forecedores = $this->Distribuidor->Fornecedor->find('list', array('fields'=>array('id','nome_fantasia')));
		$this->set('Fornecedores', $Forecedores);
		
		$Distribuidor = $this->Distribuidor->read(null, $id);
		$this->request->data = $Distribuidor;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->Distribuidor->delete($id)) {
					$this->Session->setFlash('Distribuidor excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Distribuidor!');
				}
			}
		}
	}

}