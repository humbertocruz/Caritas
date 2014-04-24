<?php
class AtividadesController extends AppController {
	
	public $uses = array('Atividade');
	
	public function related($id = 0) {
		//$Associadas = $this->Site->Associada->find('list',array('fields'=>array('id','nome')));
		//$this->set('Associadas',$Associadas);
	}
	
	public function filter() {
		
	}
	
	public function index() {
		
		$this->set('title_for_layout','Atividades');
		$this->Atividade->Behaviors->attach('Containable');
		$this->Atividade->contain();
		
		$Assuntos = $this->Paginator->paginate('Atividade');
		$this->set('data', $Assuntos);
		
	}
	
	public function add() {
		if ($this->request->isPost()){
			$data = $this->request->data;
			$this->Atividade->save($data);
			$this->Bootstrap->setFlash('Registro salvo com successo!');
			$this->redirect(array('action'=>'index'));
		};
		$this->related();
		$this->render('form');
	}
	
	public function edit($atividade_id = null) {
		if ($this->request->isPost()){
			$data = $this->request->data;
			$data['Atividade']['id'] = $atividade_id;
			$this->Atividade->save($data);
			$this->Bootstrap->setFlash('Registro salvo com successo!');
			$this->redirect(array('action'=>'index'));
		};
		$this->related($atividade_id);
		$this->request->data = $this->Atividade->read(null, $atividade_id);
		$this->render('form');
	}
	
	public function del( $atividade_id = null ) {
		if ($this->request->isPost()) {
			$this->Atividade->delete($atividade_id);
			$this->Bootstrap->setFlash('Registro excluido com successo!','success');
			$this->redirect(array('action'=>'index'));
		} else {
			$this->Bootstrap->setFlash('Erro na exclusão do Registro!','danger');
		}
	}
}
