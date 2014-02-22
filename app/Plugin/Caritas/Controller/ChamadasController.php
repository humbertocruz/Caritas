<?php
class ChamadasController extends CaritasAppController {

	public $uses = array('Caritas.Chamada');
	public $paginate = array(
		'limit' => 15,
		'order' => array(
			'Chamada.data_inicio' => 'desc'
		)
	);
	public function beforeFilter() {
		
		if ($this->Session->check('BelongsForms.ChamadaAddForm')) {
			$this->request->data = $this->Session->read('BelongsForms.ChamadaAddForm');
			if ($this->request->data['Chamada']['instituicao_id'] == 0) unset($this->request->data['Chamada']['instituicao_id']);
			if ($this->request->data['Chamada']['fornecedor_id'] == 0) unset($this->request->data['Chamada']['fornecedor_id']);
			$this->Session->delete('BelongsForms.ChamadaAddForm');
		}
		parent::beforeFilter();
	}
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
		// Carrega listas para filtro
		$estados = array('0'=>'Nenhum') + $this->Chamada->Estado->find('list', array('fields'=>array('id','nome')));
		$assuntos = array('0'=>'Nenhum') + $this->Chamada->Assunto->find('list', array('fields'=>array('id','nome')));
		$this->set('filters', array('estados'=>$estados,'assuntos'=>$assuntos));
		
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
			$data = &$this->request->data;
			if ($data['Chamada']['inst_forn'] == 1) {
				unset($data['Chamada']['fornecedor_id']);
			} else {
				unset($data['Chamada']['instituicao_id']);
			}
			
			if ($data_ini = date_create_from_format('d/m/Y',$data['Chamada']['data_inicio'])) {
				$d = 0;
			} else {
				$data_ini = date_create_from_format('Y-m-d',$data['Chamada']['data_inicio']);
			}
			$data['Chamada']['data_inicio'] = date_format($data_ini, 'Y-m-d');
			
			$this->Chamada->create();
			if ($this->Chamada->save($data)) {
			$this->Session->setFlash('Chamada salva com sucesso!');
			$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar!');	
			}
			
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
		
		if (isset($this->request->data['Chamada']['estado_id'])) {
			$conditions = array(
				'Cidade.estado_id' => $this->request->data['Chamada']['estado_id']
			);
			$Cidades = array('0'=>'Selecione a Cidade') + $this->Chamada->Cidade->find('list', array('fields'=>array('id','nome'),'conditions'=>$conditions));
		} else {
			$Cidades = array();
		}
		$this->set('Cidades', $Cidades);
		
		if (isset($this->request->data['Chamada']['cidade_id'])) {
			$conditions = array(
				'InstituicoesEndereco.cidade_id' => $this->request->data['Chamada']['cidade_id']
			);
			$InstituicoesEndereco = $this->Chamada->Instituicao->InstituicoesEndereco->find('list', array('fields'=>array('instituicao_id'),'conditions'=>$conditions));
			array_push($InstituicoesEndereco, '0');
			array_push($InstituicoesEndereco, '0');
			$Instituicoes = array('0'=>'Selecione a Instituição') + $this->Chamada->Instituicao->find('list', array('fields'=>array('id','nome_fantasia'),'conditions'=>array('Instituicao.id IN'=>$InstituicoesEndereco)));
			$conditions = array(
				'FornecedoresEndereco.cidade_id' => $this->request->data['Chamada']['cidade_id']
			);
			$FornecedoresEndereco = $this->Chamada->Fornecedor->FornecedoresEndereco->find('list', array('fields'=>array('fornecedor_id'),'conditions'=>$conditions));
			array_push($FornecedoresEndereco, '0');
			array_push($FornecedoresEndereco, '0');
			$Fornecedor = array('0'=>'Selecione o Fornecedor') + $this->Chamada->Fornecedor->find('list', array('fields'=>array('id','nome_fantasia'),'conditions'=>array('Fornecedor.id IN'=>$FornecedoresEndereco)));
		} else {
			$Instituicoes = array();
			$Fornecedor = array();
		}
		$this->set('Instituicoes',$Instituicoes);
		$this->set('Fornecedores',$Fornecedor);

		$Contatos = array();
		$historico = array();

		if (isset($this->request->data['Chamada']['instituicao_id'])) {
			$this->Chamada->Behaviors->attach('Containable');
			$this->Chamada->contain(
				'Contato',
				'Assunto'
			);
			$historico = $this->Chamada->find('all', array('order'=>array('Chamada.data_inicio'=>'DESC'),'conditions'=>array('Chamada.instituicao_id'=>$this->request->data['Chamada']['instituicao_id'])));
			
			$conditions = array(
				'ContatosInstituicao.instituicao_id'=>$this->request->data['Chamada']['instituicao_id']
			);
			$ContatoInstitucao = $this->Chamada->Contato->ContatosInstituicao->find('list',array('fields'=>array('contato_id'),'conditions'=>$conditions));
			$Contatos = $this->Chamada->Contato->find('list',array('fields'=>array('id','nome'),'conditions'=>array('Contato.id IN'=>$ContatoInstitucao)));
		} elseif (isset($this->request->data['Chamada']['fornecedor_id'])) {
			$this->Chamada->Behaviors->attach('Containable');
			$this->Chamada->contain(
				'Contato',
				'Assunto'
			);
			$historico = $this->Chamada->find('all', array('order'=>array('Chamada.data_inicio'=>'DESC'),'conditions'=>array('Chamada.fornecedor_id'=>$this->request->data['Chamada']['fornecedor_id'])));
			
			$conditions = array(
				'ContatosFornecedor.fornecedor_id'=>$this->request->data['Chamada']['fornecedor_id']
			);
			$ContatoFornecedor= $this->Chamada->Contato->ContatosFornecedor->find('list',array('fields'=>array('contato_id'),'conditions'=>$conditions));
			array_push($ContatoFornecedor, '0');
			array_push($ContatoFornecedor, '0');
			$Contatos = $this->Chamada->Contato->find('list',array('fields'=>array('id','nome'),'conditions'=>array('Contato.id IN'=>$ContatoFornecedor)));
		}
		
		$this->set('Contatos',$Contatos);
		$this->set('historico',$historico);
		
		$this->render('form');
	}
	
	public function edit($id = null) {
	
		if ($this->request->isPost()) {
			$data = &$this->request->data;
			if ($data['Chamada']['inst_forn'] == 1) {
				unset($data['Chamada']['fornecedor_id']);
			} else {
				unset($data['Chamada']['instituicao_id']);
			}
			if ($data_ini = date_create_from_format('d/m/Y',$data['Chamada']['data_inicio'])) {
				$d = 0;
			} else {
				$data_ini = date_create_from_format('Y-m-d',$data['Chamada']['data_inicio']);
			}
			$data['Chamada']['data_inicio'] = date_format($data_ini, 'Y-m-d');
			$data['Chamada']['id'] = $id;
			$this->Chamada->save($data);
			$this->Session->setFlash('Chamada salva com sucesso!');
			$this->redirect(array('action'=>'index'));
			
		} else {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Chamadas - Editar');
		
		$this->Chamada->Behaviors->attach('Containable');
		$this->Chamada->contain(
			'Contato',
			'Contato.ContatosFone',
			'Contato.ContatosEmail',
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
		
		$Chamada = $this->Chamada->read(null, $id);
		
		// Nao editar a data_inicio

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
		
		if($Chamada['Chamada']['instituicao_id'] != null) {
			$conditions = array(
				'InstituicoesEndereco.cidade_id' => $Chamada['Chamada']['cidade_id']
				);
			$instituicoesEndereco = $this->Chamada->Instituicao->InstituicoesEndereco->find('list', array('fields'=>array('instituicao_id'),'conditions'=>$conditions));
			array_push($instituicoesEndereco, '0');
			array_push($instituicoesEndereco, '0');
			$instituicoes = array('0'=>'Selecione a Instituição') + $this->Chamada->Instituicao->find('list', array('fields'=>array('id','nome_fantasia'),'conditions'=>array('Instituicao.id IN'=>$instituicoesEndereco)));
			$fornecedores = array();
		} else {
			$conditions = array(
				'FornecedoresEndereco.cidade_id' => $Chamada['Chamada']['cidade_id']
				);
			$fornecedoresEndereco = $this->Chamada->Fornecedor->FornecedoresEndereco->find('list', array('fields'=>array('fornecedor_id'),'conditions'=>$conditions));
			array_push($fornecedoresEndereco, '0');
			array_push($fornecedoresEndereco, '0');
			$fornecedores = array('0'=>'Selecione a Instituição') + $this->Chamada->Fornecedor->find('list', array('fields'=>array('id','nome_fantasia'),'conditions'=>array('Fornecedor.id IN'=>$fornecedoresEndereco)));
			$instituicoes = array();
		}
		
		$this->set('Instituicoes',$instituicoes);
		$this->set('Fornecedores',$fornecedores);
		
		$Contatos = array();
		$historico = array();
		
		if (isset($Chamada['Chamada']['instituicao_id'])) {
			$this->Chamada->Behaviors->attach('Containable');
			$this->Chamada->contain(
				'Contato',
				'Assunto'
			);
			$historico = $this->Chamada->find('all', array('order'=>array('Chamada.data_inicio'=>'DESC'),'conditions'=>array('Chamada.instituicao_id'=>$Chamada['Chamada']['instituicao_id'])));
			
			$conditions = array(
				'ContatosInstituicao.instituicao_id'=>$Chamada['Chamada']['instituicao_id']
			);
			$ContatoInstitucao = $this->Chamada->Contato->ContatosInstituicao->find('list',array('fields'=>array('contato_id'),'conditions'=>$conditions));
			$Contatos = $this->Chamada->Contato->find('list',array('fields'=>array('id','nome'),'conditions'=>array('Contato.id IN'=>$ContatoInstitucao)));
		} else {
			$this->Chamada->Behaviors->attach('Containable');
			$this->Chamada->contain(
				'Contato',
				'Assunto'
			);
			$historico = $this->Chamada->find('all', array('order'=>array('Chamada.data_inicio'=>'DESC'),'conditions'=>array('Chamada.fornecedor_id'=>$Chamada['Chamada']['fornecedor_id'])));
			
			$conditions = array(
				'ContatosFornecedor.fornecedor_id'=>$Chamada['Chamada']['fornecedor_id']
			);
			$ContatoFornecedor= $this->Chamada->Contato->ContatosFornecedor->find('list',array('fields'=>array('contato_id'),'conditions'=>$conditions));
			array_push($ContatoFornecedor, '0');
			array_push($ContatoFornecedor, '0');
			$Contatos = $this->Chamada->Contato->find('list',array('fields'=>array('id','nome'),'conditions'=>array('Contato.id IN'=>$ContatoFornecedor)));
		}
		
		$this->set('Contatos',$Contatos);
		$this->set('historico',$historico);
		
		$this->request->data = $Chamada;
		}
		$this->render('form');
		
	}
	
	public function del($id = null) {
	
		$this->Chamada->delete($id);
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
		array_push($contato_id, '0');
		array_push($contato_id, '0');
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
	
	public function carrega_contatos_forn($fornecedor_id = 0) {
		
		$this->layout = false;
		
		$contato_id = $this->Chamada->Contato->ContatosFornecedor->find('list', array('fields'=>array('contato_id'),'conditions'=>array('ContatosFornecedor.fornecedor_id'=>$fornecedor_id)));
		array_push($contato_id, '0');
		array_push($contato_id, '0');
		$contatos = array('0'=>'Selecione o Contato') + $this->Chamada->Contato->find('list', array('fields'=>array('id','nome'),'conditions'=>array('Contato.id IN'=>$contato_id)));
		$this->set('contatos',$contatos);
		
		$this->render('carrega_contatos');
		
	}
	
	public function carrega_historico_forn($fornecedor_id = 0) {
	
		$this->layout = false;
		// Carrega dados do BD
		$this->Chamada->Behaviors->attach('Containable');
		$this->Chamada->contain(
			'Contato',
			'Assunto'
		);
		$historico = $this->Chamada->find('all', array('order'=>array('Chamada.data_inicio'=>'DESC'),'conditions'=>array('Chamada.fornecedor_id'=>$fornecedor_id)));
		$this->set('historico', $historico);
		
		$this->render('carrega_historico');
	
	}
	
	public function carrega_contato($contato_id) {
		$this->layout = false;
		$this->Chamada->Contato->Behaviors->attach('Containable');
		$this->Chamada->Contato->contain(
			'ContatosFone',
			'ContatosEmail'
		);
		$contato = $this->Chamada->Contato->read(null, $contato_id);
		$this->set('contato',$contato);
	}


}