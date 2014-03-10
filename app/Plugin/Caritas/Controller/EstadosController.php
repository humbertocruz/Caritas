<?php
class EstadosController extends CaritasAppController {

	public $uses = array('Caritas.Estado');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Estado - Lista');

		// Carrega dados do BD
		$Estados = $this->Estado->find('all');
		$this->set('Estados',$Estados);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->Estado->create();
			if ($this->Estado->save($data)) {
				$this->Session->setFlash('Estado salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Estado');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Estados - Adicionar');

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Estado']['id'] = $id;
				if ($this->Estado->save($data)) {
					$this->Session->setFlash('Estado salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Estado!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Estados - Editar');
		
		$Estado = $this->Estado->read(null, $id);
		$this->request->data = $Estado;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->Estado->delete($id)) {
					$this->Session->setFlash('Estado excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Estado!');
				}
			}
		}
	}

}