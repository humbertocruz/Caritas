<?php
class AssuntosController extends AppController {
	
	public $uses = array('Assunto');
	
	public function related($id = 0) {
		//$Associadas = $this->Site->Associada->find('list',array('fields'=>array('id','nome')));
		//$this->set('Associadas',$Associadas);
	}
	
	public function filter() {
		
	}
	
	public function index() {
		
		$this->set('title_for_layout','Assuntos');
		$this->Assunto->Behaviors->attach('Containable');
		$this->Assunto->contain();
		
		$Assuntos = $this->Paginator->paginate('Assunto');
		$this->set('data', $Assuntos);
		
	}
	
	public function add() {
		if ($this->request->isPost()){
			$data = $this->request->data;
			$this->Assunto->save($data);
			$this->Bootstrap->setFlash('Registro salvo com successo!');
			$this->redirect(array('action'=>'index'));
		};
		$this->related();
		$this->render('form');
	}
	
	public function edit($assunto_id = null) {
		if ($this->request->isPost()){
			$data = $this->request->data;
			$data['Assunto']['id'] = $assunto_id;
			$this->Assunto->save($data);
			$this->Bootstrap->setFlash('Registro salvo com successo!');
			$this->redirect(array('action'=>'index'));
		};
		$this->related($assunto_id);
		$this->request->data = $this->Assunto->read(null, $assunto_id);
		$this->render('form');
	}
	
	public function del( $assunto_id = null ) {
		if ($this->request->isPost()) {
			$this->Assunto->delete($assunto_id);
			$this->Bootstrap->setFlash('Registro excluido com successo!','success');
			$this->redirect(array('action'=>'index'));
		} else {
			$this->Bootstrap->setFlash('Erro na exclusão do Registro!','danger');
		}
	}
}
