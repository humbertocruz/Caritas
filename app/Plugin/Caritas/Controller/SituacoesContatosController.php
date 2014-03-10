<?php
class SituacoesContatosController extends CaritasAppController {

	public $uses = array('Caritas.SituacoesContato');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Situações de Contato - Lista');

		// Carrega dados do BD
		$SituacoesContatos = $this->SituacoesContato->find('all');
		$this->set('SituacoesContatos',$SituacoesContatos);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->SituacoesContato->create();
			if ($this->SituacoesContato->save($data)) {
				$this->Session->setFlash('Situaões de Contato salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Situações de Contato');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Situações de Contatos - Adicionar');

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['SituacoesContato']['id'] = $id;
				if ($this->SituacoesContato->save($data)) {
					$this->Session->setFlash('Situações de Contatos salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Situações de Contatos!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Situações de Contatos - Editar');
		
		$SituacoesContato = $this->SituacoesContato->read(null, $id);
		$this->request->data = $SituacoesContato;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->SituacoesContato->delete($id)) {
					$this->Session->setFlash('Situações de Contatos excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Situações de Contatos!');
				}
			}
		}
	}

}