<?php
class ChamadasController extends CaritasAppController {

	public $uses = array('Caritas.Chamada');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Chamadas - Lista');

		// Carrega dados do BD
		$chamadas = $this->Paginate('Chamada');
		$this->set('Chamadas',$chamadas);

	}

	public function add() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Chamadas - Adicionar');

		$TiposChamada = $this->Chamada->TiposChamada->find('list', array('fields'=>array('id','nome')));
		$this->set('TiposChamada',$TiposChamada);

		$Assuntos = $this->Chamada->Assunto->find('list', array('fields'=>array('id','nome')));
		$this->set('Assuntos',$Assuntos);

		$Estados = $this->Chamada->Estado->find('list', array('fields'=>array('id','nome')));
		$this->set('Estados', $Estados);
		
		$this->set('Cidades', array());
		$this->set('Instituicoes',array());
		$this->set('Fornecedores',array());
		$this->set('Pedidos',array());
		$this->set('Contatos',array());
		

		$this->render('form');
	}

}