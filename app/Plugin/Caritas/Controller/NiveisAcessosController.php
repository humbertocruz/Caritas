<?php
class NiveisAcessosController extends CaritasAppController {

	public $uses = array('Caritas.NiveisAcesso');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Atendentes - Lista');

		// Carrega dados do BD
		$this->set('NiveisAcesso',$this->NiveisAcesso->find('all'));

	}

	
}