<?php
class CargosController extends AppController {
	
	public $uses = array('Cargo');
	
	public function related($id = 0) {
		//$Associadas = $this->Site->Associada->find('list',array('fields'=>array('id','nome')));
		//$this->set('Associadas',$Associadas);
	}
	
	public function filter() {
		
	}
	
	public function index() {
		
		$this->set('title_for_layout','Assuntos');
		$this->Cargo->Behaviors->attach('Containable');
		$this->Cargo->contain();
		
		$Assuntos = $this->Paginator->paginate('Cargo');
		$this->set('data', $Assuntos);
		
	}
	
	public function add() {
		if ($this->request->isPost()){
			$data = $this->request->data;
			$this->Cargo->save($data);
			$this->Bootstrap->setFlash('Registro salvo com successo!');
			$this->redirect(array('action'=>'index'));
		};
		$this->related();
		$this->render('form');
	}
	
	public function edit($cargo_id = null) {
		if ($this->request->isPost()){
			$data = $this->request->data;
			$data['Cargo']['id'] = $cargo_id;
			$this->Cargo->save($data);
			$this->Bootstrap->setFlash('Registro salvo com successo!');
			$this->redirect(array('action'=>'index'));
		};
		$this->related($cargo_id);
		$this->request->data = $this->Cargo->read(null, $cargo_id);
		$this->render('form');
	}
	
	public function del( $cargo_id = null ) {
		if ($this->request->isPost()) {
			$this->Cargo->delete($cargo_id);
			$this->Bootstrap->setFlash('Registro excluido com successo!','success');
			$this->redirect(array('action'=>'index'));
		} else {
			$this->Bootstrap->setFlash('Erro na exclusão do Registro!','danger');
		}
	}
}
