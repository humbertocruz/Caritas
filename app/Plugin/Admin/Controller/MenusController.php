<?php
class MenusController extends AdminAppController {

	public $uses = array('Caritas.Menu');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Menus - Lista');

		// Carrega dados do BD
		$Menus = $this->Menu->find('all');
		$this->set('Menus',$Menus);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			if ($data['Menu']['menu_id'] == 0) {
				unset($data['Menu']['menu_id']);
			}
			$this->Menu->create();
			if ($this->Menu->save($data)) {
				$this->Session->setFlash('Menu salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Menu');
				//pr($this->NiveisAcesso->invalidFields());
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Menus- Adicionar');
		$Menus = array('0'=>'Nenhum') + $this->Menu->find('list', array('fields'=>array('id','texto'),'conditions'=>array('Menu.menu_id'=>null)));
		$this->set('Menus',$Menus);

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Menu']['id'] = $id;
				if ($data['Menu']['menu_id'] == 0) {
					unset($data['Menu']['menu_id']);
				}
				if ($this->Menu->save($data)) {
					$this->Session->setFlash('Menu salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Menu!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Menus - Editar');
		
		$Menus = array('0'=>'Nenhum') + $this->Menu->find('list', array('fields'=>array('id','texto'),'conditions'=>array('Menu.menu_id'=>null)));
		$this->set('Menus',$Menus);
		
		$Menu = $this->Menu->read(null, $id);
		$this->request->data = $Menu;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->Menu->delete($id)) {
					$this->Session->setFlash('Menu excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir o Menu!');
				}
			}
		}
	}

}