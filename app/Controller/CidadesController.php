<?php
class CidadesController extends AppController {
	
	public $uses = array('Cidade');
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		array_push($this->indexActions, array(
			'style'=>'info',
			'text' => 'Filtrar',
			'action' => 'filter',
			'title' => 'Filtrar',
			'icon' => 'pencil'
		));
		$this->set('indexActions', $this->indexActions);
		
	}
	
	public function related($id = 0) {
		$Estados = $this->Cidade->Estado->find('list',array('fields'=>array('id','nome')));
		$this->set('Estados',$Estados);
	}
	
	public function filter() {
		
	}
	
	public function index() {
		
		$this->set('title_for_layout','Cidades');
		$this->Cidade->Behaviors->attach('Containable');
		$this->Cidade->contain();
		
		$Cidades = $this->Paginator->paginate('Cidade');
		$this->set('data', $Cidades);
		
	}
	
	public function add() {
		if ($this->request->isPost()){
			$data = $this->request->data;
			$this->Cidade->save($data);
			$this->Bootstrap->setFlash('Registro salvo com successo!');
			$this->redirect(array('action'=>'index'));
		};
		$this->related();
		$this->render('form');
	}
	
	public function edit($cidade_id = null) {
		if ($this->request->isPost()){
			$data = $this->request->data;
			$data['Cidade']['id'] = $cidade_id;
			$this->Cidade->save($data);
			$this->Bootstrap->setFlash('Registro salvo com successo!');
			$this->redirect(array('action'=>'index'));
		};
		$this->related($cidade_id);
		$this->request->data = $this->Cidade->read(null, $cidade_id);
		$this->render('form');
	}
	
	public function del( $cidade_id = null ) {
		if ($this->request->isPost()) {
			$this->Cidade->delete($cidade_id);
			$this->Bootstrap->setFlash('Registro excluido com successo!','success');
			$this->redirect(array('action'=>'index'));
		} else {
			$this->Bootstrap->setFlash('Erro na exclusão do Registro!','danger');
		}
	}
	
}
