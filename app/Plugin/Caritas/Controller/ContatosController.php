<?php
class ContatosController extends CaritasAppController {

	public $uses = array('Contato');
	
	public function index() {
		
		$Contatos = $this->Paginate('Contato');
		$this->set('Contatos', $Contatos);
		
	}
	
	public function add() {
		$this->render('form');
	}
	
	public function edit($contato_id = null) {
		$this->request->data = $this->Contato->read(null, $contato_id);
		$this->render('form');
	}
	
	public function del($contato_id = null) {
		
	}
	
}