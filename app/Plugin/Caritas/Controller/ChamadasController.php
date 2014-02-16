<?php
class ChamadasController extends CaritasAppController {

	public $uses = array('Caritas.Chamada');
	public $paginate = array(
		'limit' => 25,
		'order' => array(
			'Chamada.data_inicio' => 'desc'
		)
	);
	private function filters() {
		// Filtros
		
		// Configura sessao
		if ($this->request->isPost()) {
			if (isset($this->request->data['filter'])) {
				unset($this->request->data['filter']);
				foreach($this->request->data as $key=>$value) {
					if ($value == '0') {
						unset ($this->request->data[$key]);
					}
				}
				$this->Session->write('Filtros.Chamadas', $this->request->data );
			}
		}
		// Carrega lista de estados
		$estados = array('0'=>'Nenhum') + $this->Estado->find('list', array('fields'=>array('id','nome')));
		$this->set('filters', array('estados'=>$estados));
		// Carrega sessao
		$filtros = $this->Session->read('Filtros.Chamadas');
		$this->set('filters_chamada', $filtros);
	}
	public function index() {
		// Configura Filtros
		$this->filters();
		
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
	
		if ($this->request->isPost()) {
			pr($this->request->data);
		}
		$this->request->data['Chamada']['chamada_id'] = $id;
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Chamadas - Adicionar');

		$TiposChamada = $this->Chamada->TiposChamada->find('list', array('fields'=>array('id','nome')));
		$this->set('TiposChamada',$TiposChamada);

		$Assuntos = $this->Chamada->Assunto->find('list', array('fields'=>array('id','nome')));
		$this->set('Assuntos',$Assuntos);

		$Estados = array('0'=>'Selecione o Estado') + $this->Chamada->Estado->find('list', array('fields'=>array('id','nome')));
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

		$Estados = array('0'=>'Selecione o Estado') + $this->Chamada->Estado->find('list', array('fields'=>array('id','nome')));
		$this->set('Estados', $Estados);
		
		$conditions = array(
			'Cidade.estado_id' => $Chamada['Chamada']['estado_id']
		);
		$Cidades = array('0'=>'Selecione a Cidade') + $this->Chamada->Cidade->find('list', array('fields'=>array('id','nome'),'conditions'=>$conditions));
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
	
	public function carrega_cidades($estado_id = 0) {
		
		$this->layout = false;
		
		$cidades = array('0'=>'Selecione a Cidade') + $this->Chamada->Cidade->find('list', array('fields'=>array('id','nome'),'conditions'=>array('Cidade.estado_id'=>$estado_id)));
		$this->set('cidades',$cidades);
		
	}
	
	public function carrega_instituicoes($cidade_id = 0) {
		
		$this->layout = false;
		
		$instituicao_id = $this->Chamada->Instituicao->InstituicoesEndereco->find('list', array('fields'=>array('instituicao_id'),'conditions'=>array('InstituicoesEndereco.cidade_id'=>$cidade_id)));
		$instituicoes = array('0'=>'Selecione a Instituição') + $this->Chamada->Instituicao->find('list', array('fields'=>array('id','nome_fantasia'),'conditions'=>array('Instituicao.id IN'=>$instituicao_id)));
		$this->set('instituicoes',$instituicoes);
		
	}
	
	public function carrega_fornecedores($cidade_id = 0) {
		
		$this->layout = false;
		
		$fornecedor_id = $this->Chamada->Fornecedor->FornecedoresEndereco->find('list', array('fields'=>array('fornecedor_id'),'conditions'=>array('FornecedoresEndereco.cidade_id'=>$cidade_id)));
		if ($fornecedor_id) {
		$fornecedor_id = array('0') + $fornecedor_id;
		$fornecedores = array('0'=>'Selecione o Fornecedor') + $this->Chamada->Fornecedor->find('list', array('fields'=>array('id','nome_fantasia'),'conditions'=>array('Fornecedor.id IN'=>$fornecedor_id)));
		$this->set('fornecedores', $fornecedores);
		} else {
		$this->set('fornecedores', array('0'=>'Nenhum Fornecedor encontrado!'));	
		}
		
	}
	
	public function carrega_contatos($instituicao_id = 0) {
		
		$this->layout = false;
		
		$contato_id = $this->Chamada->Contato->ContatosInstituicao->find('list', array('fields'=>array('contato_id'),'conditions'=>array('ContatosInstituicao.instituicao_id'=>$instituicao_id)));
		$contatos = array('0'=>'Selecione o Contato') + $this->Chamada->Contato->find('list', array('fields'=>array('id','nome'),'conditions'=>array('Contato.id IN'=>$contato_id)));
		$this->set('contatos',$contatos);
		
	}
	
	public function carrega_historico($instituicao_id = 0) {
	
		$this->layout = false;
		// Carrega dados do BD
		$this->Chamada->Behaviors->attach('Containable');
		$this->Chamada->contain(
			'Contato',
			'Assunto'
		);
		$historico = $this->Chamada->find('all', array('order'=>array('Chamada.data_inicio'=>'DESC'),'conditions'=>array('Chamada.instituicao_id'=>$instituicao_id)));
		$this->set('historico', $historico);
	
	}


}