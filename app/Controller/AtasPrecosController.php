<?php
class AtasPrecosController extends AppController {
	
	public $uses = array('AtasPreco');
	
	public function related($id = 0) {
		$Editais = array('0'=>'Selecione um Edital') + $this->AtasPreco->Edital->find('list', array('fields'=>array('id','numero')));
		$this->set('Editais',$Editais);
	}
	
	public function filter() {
		
	}
	
	public function index() {
		
		$this->set('title_for_layout','Atas de Preços');
		$this->AtasPreco->Behaviors->attach('Containable');
		$this->AtasPreco->contain(
			'Edital'
		);
		
		$AtasPrecos = $this->Paginator->paginate('AtasPreco');
		$this->set('data', $AtasPrecos);
		
	}
	
	public function add() {
		if ($this->request->isPost()){
			$data = $this->request->data;
			$this->AtasPreco->save($data);
			$this->Bootstrap->setFlash('Registro salvo com successo!');
			$this->redirect(array('action'=>'index'));
		};
		$this->related();
		$this->render('form');
	}
	
	public function edit($ataspreco_id = null) {
		if ($this->request->isPost()){
			$data = $this->request->data;
			$data['AtasPreco']['id'] = $ataspreco_id;
			$this->AtasPreco->save($data);
			$this->Bootstrap->setFlash('Registro salvo com successo!');
			$this->redirect(array('action'=>'index'));
		};
		$this->related($ataspreco_id);
		$this->request->data = $this->AtasPreco->read(null, $ataspreco_id);
		$this->render('form');
	}
	
	public function del( $ataspreco_id = null ) {
		if ($this->request->isPost()) {
			$this->AtasPreco->delete($ataspreco_id);
			$this->Bootstrap->setFlash('Registro excluido com successo!','success');
			$this->redirect(array('action'=>'index'));
		} else {
			$this->Bootstrap->setFlash('Erro na exclusão do Registro!','danger');
		}
	}
}
