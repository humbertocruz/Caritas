<?php
class AtasPrecosController extends CaritasAppController {

	public $uses = array('Caritas.AtasPreco');
	
	public function related() {
		$Editais = array('0'=>'Selecione um Edital') + $this->AtasPreco->Edital->find('list', array('fields'=>array('id','numero')));
		$this->set('Editais',$Editais);
	}

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Atas de Preço - Lista');

		// Carrega dados do BD
		$AtasPrecos = $this->Paginator->paginate('AtasPreco');
		$this->set('data',$AtasPrecos);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->AtasPreco->create();
			if ($this->AtasPreco->save($data)) {
				$this->Session->setFlash('Ata de Preço salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Ata de Preço');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Ata de Preço - Adicionar');

		$this->related();
		
		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['AtasPreco']['id'] = $id;
				if ($this->AtasPreco->save($data)) {
					$this->Session->setFlash('Ata de Preço salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Ata de Preço!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Ata de Preço - Editar');
		
		$this->related();
		
		$AtasPreco = $this->AtasPreco->read(null, $id);
		$this->request->data = $AtasPreco;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->AtasPreco->delete($id)) {
					$this->Session->setFlash('Ata de Preço excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Ata de Preço!');
				}
			}
		}
	}

}