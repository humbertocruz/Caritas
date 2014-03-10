<?php
class OrgaosController extends CaritasAppController {

	public $uses = array('Caritas.Orgao');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Orgao - Lista');

		// Carrega dados do BD
		$Orgaos = $this->Orgao->find('all');
		$this->set('Orgaos',$Orgaos);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->Orgao->create();
			if ($this->Orgao->save($data)) {
				$this->Session->setFlash('Órgão salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Órgão');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Órgãos - Adicionar');

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Orgao']['id'] = $id;
				if ($this->Orgao->save($data)) {
					$this->Session->setFlash('Órgão salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Órgão!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Órgãos - Editar');
		
		$Orgao = $this->Orgao->read(null, $id);
		$this->request->data = $Orgao;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->Orgao->delete($id)) {
					$this->Session->setFlash('Órgão excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Órgão!');
				}
			}
		}
	}

}