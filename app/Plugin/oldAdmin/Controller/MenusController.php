<?php
class MenusController extends AdminAppController {

	public $uses = array('Caritas.Menu');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Menus - Lista');

		// Carrega dados do BD
		$Menus = $this->Menu->find('threaded');
		$this->set('Menus',$Menus);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			if ($data['Menu']['parent_id'] == 0) {
				unset($data['Menu']['parent_id']);
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
		
		$this->set('action_name', $this->action);

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Menus- Adicionar');
		$NiveisAcessos = array('0'=>'Nenhum') + $this->Menu->NiveisAcesso->find('list', array('fields'=>array('id','nome')));
		$this->set('NiveisAcessos',$NiveisAcessos);

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Menu']['id'] = $id;
				if ($data['Menu']['parent_id'] == 0) {
					unset($data['Menu']['parent_id']);
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
		
		$conditions = array(
			'Menu.parent_id' => null,
			'Menu.id !=' => $id
		);
		
		$this->set('action_name', $this->action);

		$NiveisAcessos = array('0'=>'Nenhum') + $this->Menu->NiveisAcesso->find('list', array('fields'=>array('id','nome')));
		$this->set('NiveisAcessos',$NiveisAcessos);
		
		$conditions = array(
			'Link.menu_id' => $id
		);
		$Links = $this->Menu->Link->find('threaded', array('conditions'=>$conditions));
		$this->set('Links',$Links);
		
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
	
	public function addLink($menu_id = null) {
		if($this->request->isPost()) {
			$data = $this->request->data;
			if ($data['Link']['parent_id'] == 0) {
				unset($data['Link']['parent_id']);
			}
			$data['Link']['menu_id'] = $menu_id;
			
			$this->Menu->Link->create();
			if ($this->Menu->Link->save($data)) {
				$this->Session->setFlash('Link salvo com sucesso!');
				$this->redirect(array('action'=>'edit'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Link');
			}
		}
		
		$this->set('action_name', $this->action);

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Links- Adicionar');
		$Links = array('0'=>'Nenhum') + $this->Menu->Link->find(
			'list', 
			array(
				'fields'=>array(
					'id',
					'texto'
				),
				'conditions'=>array(
					'Link.parent_id'=>null,
					'Link.menu_id' => $menu_id 
				)
			)
		);
		$this->set('Links',$Links);

		$this->render('formLink');
	}
	
	public function editLink($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Link']['id'] = $id;
				if ($data['Link']['parent_id'] == 0) {
					$data['Link']['parent_id'] = null;
				}
				$link = $this->Menu->Link->read(null, $id);
				if ($this->Menu->Link->save($data)) {
					$this->Session->setFlash('Link salvo com sucesso!');
					$this->redirect(array('action'=>'edit', $link['Link']['menu_id'], '#'=>'tab-links'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Menu!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Menus - Editar');
		
		$this->set('action_name', $this->action);

		$NiveisAcessos = array('0'=>'Nenhum') + $this->Menu->NiveisAcesso->find('list', array('fields'=>array('id','nome')));
		$this->set('NiveisAcessos',$NiveisAcessos);
		$conditions = array(
			'Link.parent_id' => null,
			'Link.id !=' => $id
		);
		$Links = array('0'=>'Nenhum') + $this->Menu->Link->find('list', array('fields'=>array('id','texto'),'conditions'=>$conditions));
		$this->set('Links',$Links);
		
		$Link = $this->Menu->Link->read(null, $id);
		$this->request->data = $Link;

		$this->render('formLink');
	}
	
	public function delLink($id = null) {
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