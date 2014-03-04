<?php
class ContatosController extends CaritasAppController {

	public $uses = array('Caritas.Contato');
	
	public function index() {
		
		$Contatos = $this->Paginate('Contato');
		$this->set('Contatos', $Contatos);
		
	}
	
	public function add() {
		if ($this->request->isPost()) {
			$data = $this->request->data;
			$this->Contato->save($data);
			$this->Session->setFlash('Contato gravado com sucesso!');
			$this->redirect(array('action'=>'index'));
		} else {
			$Sexos = $this->Contato->Sexo->find('list', array('fields'=>array('id','nome')));
			$this->set('Sexos',$Sexos);
		}
		$this->render('form');
	}
	
	public function edit($contato_id = null) {
		if ($this->request->isPost()) {
			$data = $this->request->data;
			$data['Contato']['id'] = $contato_id;
			$this->Contato->save($data);
			$this->Session->setFlash('Contato gravado com sucesso!');
			$this->redirect(array('action'=>'index'));
		} else {	
			$this->request->data = $this->Contato->read(null, $contato_id);
			$Sexos = $this->Contato->Sexo->find('list', array('fields'=>array('id','nome')));
			$this->set('Sexos',$Sexos);
			$this->render('form');
		}
	}
	
	public function del($contato_id = null) {
		
	}
	
}