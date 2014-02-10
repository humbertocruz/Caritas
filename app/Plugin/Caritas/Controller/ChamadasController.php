<?php
class ChamadasController extends CaritasAppController {

	public $uses = array('Caritas.Chamada');
	public $paginate = array(
		'limit' => 25,
		'order' => array(
			'Chamada.data_inicio' => 'desc'
		)
	);
	public function index() {
		// Filtros
		$estados = $this->Estado->find('list', array('fields'=>array('id','nome')));
		$this->set('filters', array('estados'=>$estados));
		
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Chamadas - Lista');

		// Carrega dados do BD
		$this->Chamada->Behaviors->attach('Containable');
		$this->Chamada->contain(
			'Contato',
			'Instituicao',
			'Instituicao.ContatosInstituicao',
			'Instituicao.ContatosInstituicao.Contato',
			'Instituicao.InstituicoesEndereco',
			'Instituicao.InstituicoesEndereco.Cidade',
			'Fornecedor',
			'Fornecedor.FornecedoresEndereco',
			'Fornecedor.FornecedoresEndereco.Cidade',
			'Assunto'
		);
		$filtros = $this->Session->read('Filtros.Chamadas');
		
		$chamadas = $this->Paginate('Chamada',$filtros);
		$this->set('Chamadas',$chamadas);

	}

	public function add($id = null) {
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
	
	public function edit($id = null) {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Chamadas - Editar');
		
		$Chamada = $this->Chamada->read(null, $id);

		$TiposChamada = $this->Chamada->TiposChamada->find('list', array('fields'=>array('id','nome')));
		$this->set('TiposChamada',$TiposChamada);

		$Assuntos = $this->Chamada->Assunto->find('list', array('fields'=>array('id','nome')));
		$this->set('Assuntos',$Assuntos);

		$Estados = $this->Chamada->Estado->find('list', array('fields'=>array('id','nome')));
		$this->set('Estados', $Estados);
		
		$conditions = array(
			'Cidade.estado_id' => $Chamada['Chamada']['estado_id']
		);
		$Cidades = $this->Chamada->Cidade->find('list', array('fields'=>array('id','nome'),'conditions'=>$conditions));
		$this->set('Cidades', $Cidades);
		
		$this->set('Instituicoes',array());
		
		$this->set('Fornecedores',array());
		
		$this->set('Pedidos',array());
		$this->set('Contatos',array());
		
		$this->request->data = $Chamada;
		

		$this->render('form');
		
	}
	
	public function del($id = null) {
	
		$this->Session->setFlash('Chamada Excluída com sucesso!');
		$this->redirect(array('action'=>'index'));
		
	}

}