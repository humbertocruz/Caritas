<?php
class ChamadasController extends AppController {

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

		$this->render('form');
	}

}