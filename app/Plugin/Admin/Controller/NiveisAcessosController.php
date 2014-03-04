<?php
class NiveisAcessosController extends AdminAppController {

	public $uses = array('Caritas.NiveisAcesso');

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Níveis de Acesso - Lista');
		
		$this->set('NiveisAcessos', $this->NiveisAcesso->find('all'));

		// Carrega dados do BD
		$niveis_acesso = $this->NiveisAcesso->find('all');
		$this->set('NiveisAcesso', $niveis_acesso);

	}
}