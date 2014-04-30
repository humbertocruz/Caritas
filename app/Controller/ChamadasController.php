<?php
App::uses('CakeTime', 'Utility');
class ChamadasController extends AppController {

	public $uses = array('Chamada');

	public function beforeFilter() {
		parent::beforeFilter();
		if ($this->Session->check('BelongsForms.ChamadaAddForm')) {
			$this->request->data = $this->Session->read('BelongsForms.ChamadaAddForm');
			if ($this->request->data['Chamada']['instituicao_id'] == 0) unset($this->request->data['Chamada']['instituicao_id']);
			if ($this->request->data['Chamada']['fornecedor_id'] == 0) unset($this->request->data['Chamada']['fornecedor_id']);
			$this->Session->delete('BelongsForms.ChamadaAddForm');
		}

		
	}
		
	public function filter() {
		// Configura sessao
		if ($this->request->isPost()) {
			$data = $this->request->data;		
			$this->Session->write('Filtros.Chamadas', $data );
			$this->redirect(array('action'=>'index'));
		}
		$filtros = $this->Session->read('Filtros.Chamadas');
		$Atendentes = array('0'=>'Selecione o Atendente') + $this->Chamada->Atendente->find('list', array('fields'=>array('id','nome')));
		$Assuntos = array('0'=>'Selecione o Assunto') + $this->Chamada->Assunto->find('list', array('fields'=>array('id','nome')));
		$Status = array('0'=>'Selecione o Status') + $this->Chamada->Status->find('list', array('fields'=>array('id','nome')));
		$Estados = array('0'=>'Selecione o Estado') + $this->Chamada->Estado->find('list', array('fields'=>array('id','nome')));
		if ($filtros['Chamada']['estado_id'] != '0') {
			$conditions = array(
				'Cidade.estado_id' => $filtros['Chamada']['estado_id']
			);
			$Cidades = array('0'=>'Selecione um Cidade') + $this->Chamada->Cidade->find('list', array('fields'=>array('id','nome'),'conditions'=>$conditions));
		} else {
			$Cidades = array('0'=>'Selecione um Cidade');
		}
		$data = array(
			'Atendente' => $Atendentes,
			'Assunto' => $Assuntos,
			'Status' => $Status,
			'Estado' => $Estados,
			'Cidade' => $Cidades
		);
		
		$this->set('Filter', $data);
		$this->request->data = $filtros;
		
	}
	
	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Chamadas - Lista');
		$this->set('act_filtros', true);

		// Carrega dados do BD
		$this->Chamada->Behaviors->attach('Containable');
		$this->Chamada->contain(
			'Contato',
			'Instituicao',
			'Instituicao.ContatosInstituicao',
			'Instituicao.ContatosInstituicao.Contato',
			'Instituicao.InstituicoesEndereco',
			'Instituicao.InstituicoesEndereco.Cidade',
			'Instituicao.InstituicoesEndereco.Cidade.Estado',
			'Fornecedor',
			'Fornecedor.FornecedoresEndereco',
			'Fornecedor.FornecedoresEndereco.Cidade',
			'Fornecedor.FornecedoresEndereco.Cidade.Estado',
			'Assunto',
			'Filhas'
		);
		
		$filtros = $this->Session->read('Filtros.Chamadas');
	
		$conditions = array();
		if (isset($filtros['Chamada']['atendente_id']) && $filtros['Chamada']['atendente_id'] != '0') {
			$conditions['Chamada.atendente_id'] = $filtros['Chamada']['atendente_id'];
		}
		if (isset($filtros['Chamada']['assunto_id']) && $filtros['Chamada']['assunto_id'] != '0') {
			$conditions['Chamada.assunto_id'] = $filtros['Chamada']['assunto_id'];
		}
		if (isset($filtros['Chamada']['status_id']) && $filtros['Chamada']['status_id'] != '0') {
			$conditions['Chamada.status_id'] = $filtros['Chamada']['status_id'];
		}
		if (isset($filtros['Chamada']['estado_id']) && $filtros['Chamada']['estado_id'] != '0') {
			$conditions['Chamada.estado_id'] = $filtros['Chamada']['estado_id'];
		}
		if (isset($filtros['Chamada']['cidade_id']) && $filtros['Chamada']['cidade_id'] != '0') {
			$conditions['Chamada.cidade_id'] = $filtros['Chamada']['cidade_id'];
		} 
		
		if ($filtros['Chamada']['data_inicio'] != '') {
			$ranger = explode('-', $filtros['Chamada']['data_inicio']);
			$conditions['Chamada.data_inicio >='] = date_format( date_create_from_format('d/m/Y', trim($ranger[0])),'Y-m-d');
			$conditions['Chamada.data_inicio <='] = date_format( date_create_from_format('d/m/Y', trim($ranger[1])),'Y-m-d');
		}
		// Filtro Constante chamada pai
		$conditions['Chamada.chamada_id'] = null;
		
		// Filtro Constante Projeto
		//$conditions['Chamada.projeto_id'] = $this->escolhido_projeto_id;

		$chamadas = $this->Paginator->paginate('Chamada', $conditions);
		
		$this->set('data',$chamadas);

	}

	public function add($id = null) {
	
		$this->set('action_name', $this->action);
		
		if ($this->request->isPost()) {
			$data = &$this->request->data;
			if ($data['Chamada']['inst_forn'] == 1) {
				unset($data['Chamada']['fornecedor_id']);
			} else {
				unset($data['Chamada']['instituicao_id']);
			}
			// configura projeto
			$data['Chamada']['projeto_id'] = $this->escolhido_projeto_id;
			
			if ($data_ini = date_create_from_format('d/m/Y',$data['Chamada']['data_inicio'])) {
				$d = 0;
			} else {
				$data_ini = date_create_from_format('Y-m-d',$data['Chamada']['data_inicio']);
			}
			$data['Chamada']['data_inicio'] = date_format($data_ini, 'Y-m-d');
			unset($data['Chamada']['id']);
			$this->Chamada->create();
			if ($this->Chamada->save($data)) {
				$this->Session->setFlash('Chamada salva com sucesso!');
				if ($data['Chamada']['editar'] == 1) {
						$this->redirect(array('action'=>'edit',$id));
				} else {
					$this->redirect(array('action'=>'index'));
				}
			} else {
				$this->Session->setFlash('Houve um erro ao salvar!');	
			}
			
		}
		$this->request->data['Chamada']['chamada_id'] = $id;
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Chamadas - Adicionar');
		
		if ($id != null) {
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
			unset($Chamada['Chamada']['id']);
			$Chamada['Chamada']['data_inicio'] = date('d/m/Y', time());
			$Chamada['Chamada']['chamada_id'] = $id;
			$this->request->data = $Chamada;
		} else {
			$Chamada = array();
			$Chamada['Chamada']['data_inicio'] = date('d/m/Y', time());
			$this->request->data = $Chamada;
		}

		$TiposChamada = $this->Chamada->TiposChamada->find('list', array('fields'=>array('id','nome')));
		$this->set('TiposChamada',$TiposChamada);

		$Assuntos = $this->Chamada->Assunto->find('list', array('fields'=>array('id','nome')));
		$this->set('Assuntos',$Assuntos);
		
		$Status = $this->Chamada->Status->find('list', array('fields'=>array('id','nome')));
		$this->set('Status',$Status);
		
		$Prioridades = $this->Chamada->Prioridade->find('list', array('fields'=>array('id','nome')));
		$this->set('Prioridades',$Prioridades);

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
			//$historico = $this->Chamada->find('all', array('order'=>array('Chamada.data_inicio'=>'DESC'),'conditions'=>array('Chamada.fornecedor_id'=>$this->request->data['Chamada']['fornecedor_id'])));
			$historico = $this->Paginate('Chamada');
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
	
	public function addProcedimento($chamada_id = 0) {
		
		if ($this->request->isPost()) {
			$data = $this->data;
			$user = $this->Auth->user();
			$data['ChamadasProcedimento']['atendente_id'] = $user['id'];
			$data['ChamadasProcedimento']['chamada_id'] = $chamada_id;
			
			$this->Chamada->ChamadasProcedimento->create();
			$this->Chamada->ChamadasProcedimento->save($data);
			
			$this->Session->setFlash('Procedimento da Chamada editado com sucesso!');
			$this->redirect(array('action'=>'edit',$chamada_id));
		}
		$procedimentos = array('0'=>'Selecione') + $this->Chamada->ChamadasProcedimento->Procedimento->find('list', array('fields'=>array('id','nome')));
		$this->set('procedimentos',$procedimentos);
		$this->set('chamada_id', $chamada_id);
		
		$this->render('form_procedimento');
	}
	
	public function edit($id = null) {
	
		$this->set('action_name', $this->action);
		
		if ($this->request->isPost()) {
			$data = &$this->request->data;
			if ($data['Chamada']['inst_forn'] == 1) {
				unset($data['Chamada']['fornecedor_id']);
			} else {
				unset($data['Chamada']['instituicao_id']);
			}
			$data['Chamada']['id'] = $id;
			if ($data['Chamada']['finalizar'] == 1) {
				$data['Chamada']['data_fim'] = date('Y-m-d', time());
			}
			$this->Chamada->save($data);
			$this->Session->setFlash('Chamada salva com sucesso!');
			if ($data['Chamada']['editar'] == 1) {
				$this->redirect(array('action'=>'edit',$id));
			} else {
				$this->redirect(array('action'=>'index'));
			}
			
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
		
		$Status = array('0'=>'Selecione o Status') + $this->Chamada->Status->find('list', array('fields'=>array('id','nome')));
		$this->set('Status', $Status);
		
		$Prioridades = $this->Chamada->Prioridade->find('list', array('fields'=>array('id','nome')));
		$this->set('Prioridades',$Prioridades);
		
		$SituacoesContato = $this->Chamada->Contato->ContatosInstituicao->SituacoesContato->find('list', array('fields'=>array('id','nome')));
		$this->set('SituacoesContato', $SituacoesContato);
		
		$Cargos = $this->Chamada->Contato->ContatosInstituicao->Cargo->find('list', array('fields'=>array('id','nome')));
		$this->set('Cargos', $Cargos);
		
		$Sexos = $this->Chamada->Contato->Sexo->find('list', array('fields'=>array('id','nome')));
		$this->set('Sexos',$Sexos);

				
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
			
			$conditions = array(
				'ContatosInstituicao.instituicao_id'=>$Chamada['Chamada']['instituicao_id']
			);
			$ContatoInstitucao = $this->Chamada->Contato->ContatosInstituicao->find('list',array('fields'=>array('contato_id'),'conditions'=>$conditions));
			array_push($ContatoInstitucao, '0');
			array_push($ContatoInstitucao, '0');
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
		
		// Chamadas Filhas
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
			'Assunto',
			'Filhas'
		);
		// Filtro Constante
		$filtros = array('Chamada.chamada_id'=>$id);
		
		$chamadasFilhas = $this->Paginate('Chamada',$filtros);
		$this->set('ChamadasFilhas',$chamadasFilhas);
		
		// Procedimentos
		// Carrega dados do BD
		$this->Chamada->ChamadasProcedimento->Behaviors->attach('Containable');
		$this->Chamada->ChamadasProcedimento->contain(
			'Procedimento'
		);
		
		$procedimentos = $this->Chamada->ChamadasProcedimento->find('all');
		$this->set('procedimentos',$procedimentos);
		
		$this->render('form');
		
	}
	
	public function editProcedimento($id = 0) {
		if ($this->request->isPost()) {
			$data = $this->data;
			$data['ChamadasProcedimento']['id'] = $id;
			
			if ( $this->Chamada->ChamadasProcedimento->save($data) ) {
				$ChamadaProcedimento = $this->Chamada->ChamadasProcedimento->read(null, $id);
				$this->Session->setFlash('Procedimento da Chamada editado com sucesso!');
				$this->redirect(array('action'=>'edit',$ChamadaProcedimento['ChamadasProcedimento']['chamada_id']));
			} else {
				$this->Session->setFlash('Erro ai gravar Procedimento da Chamada!');
			}
			
		}
		$ChamadaProcedimento = $this->Chamada->ChamadasProcedimento->read(null, $id);
		$this->data = $ChamadaProcedimento;
		
		$procedimentos = array('0'=>'Selecione') + $this->Chamada->ChamadasProcedimento->Procedimento->find('list', array('fields'=>array('id','nome')));
		$this->set('procedimentos',$procedimentos);
		
		$this->render('form_procedimento');
	}
	
	public function del($id = null) {
		if ($this->request->isPost()) {
			$this->Chamada->delete($id);
			$this->Session->setFlash('Chamada Excluída com sucesso!');
			$this->redirect(array('action'=>'index'));
		}
	}
	
	public function delProcedimento($id = null) {
		if ($this->request->isPost()) {
			$ChamadaProcedimento = $this->Chamada->ChamadasProcedimento->read(null, $id);
			$this->Chamada->ChamadasProcedimento->delete($id);
			$this->Session->setFlash('Procedimento da Chamada Excluído com sucesso!');
			$this->redirect(array('action'=>'edit', $ChamadaProcedimento['ChamadasProcedimento']['chamada_id']));
		}
	}
	
	public function carregaProcedimento($id = null) {
		$this->layout = null;
		$Procedimento = $this->Chamada->ChamadasProcedimento->Procedimento->read(null, $id);
		echo $Procedimento['Procedimento']['descricao'];
		$this->render = null;
	}
	
	public function finalizar($id = null) {
		$data = array(
			'Chamada' => array(
				'id' => $id,
				'data_fim' => date('Y-m-d'),
				'status_id' => 3
			)
		);
		$this->Chamada->save($data);
		$this->Session->setFlash('Chamada Finalizada com sucesso!');
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
		$this->paginate = array(
		'limit' => 10,
		'order' => array(
			'Chamada.data_inicio' => 'DESC'
		)
		);
		$this->layout = false;
		// Carrega dados do BD
		$this->Chamada->Behaviors->attach('Containable');
		$this->Chamada->contain(
			'Contato',
			'Assunto'
		);
		//$historico = $this->Chamada->find('all', array('order'=>array('Chamada.data_inicio'=>'DESC'),'conditions'=>array('Chamada.instituicao_id'=>$instituicao_id)));
		$historico = $this->Paginate('Chamada', array('Chamada.instituicao_id'=>$instituicao_id));
		$this->set('historico', $historico);
		//$this->set('here',$this->here);
	
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
	
	public function carrega_contato($contato_id = null, $inst_forn = 1, $inst_forn_id = null) {
		$this->layout = false;
		$this->Chamada->Contato->Behaviors->attach('Containable');
		$this->Chamada->Contato->contain(
			'ContatosFone',
			'ContatosFone.TiposFone',
			'ContatosEmail',
			'ContatosEmail.TiposEmail',
			'ContatosInstituicao',
			'ContatosInstituicao.Cargo',
			'ContatosInstituicao.SituacoesContato',
			'ContatosFornecedor',
			'ContatosFornecedor.Cargo',
			'ContatosFornecedor.SituacoesContato'

		);
		if ($inst_forn == 1) {
			$conditions = array(
				'ContatosInstituiacao.instituiacao_id' => $inst_forn_id
			);
		} else {
			$conditions = array(
				'ContatosInstituiacao.fornecedor_id' => $inst_forn_id
			);
		}
		$contato = $this->Chamada->Contato->read(null, $contato_id, array('conditions'=>$conditions));
		
		$this->set('inst_forn', $inst_forn);
		
		$this->set('contato',$contato);
		
		// Tabelas adicionais
		$TiposFone = $this->Chamada->Contato->ContatosFone->TiposFone->find('list',array('fields'=>array('id','nome')));
		$this->set('TiposFone', $TiposFone);

		$TiposEmail = $this->Chamada->Contato->ContatosEmail->TiposEmail->find('list',array('fields'=>array('id','nome')));
		$this->set('TiposEmail', $TiposEmail);
		
		$SituacoesContato = $this->Chamada->Contato->ContatosInstituicao->SituacoesContato->find('list', array('fields'=>array('id','nome')));
		$this->set('SituacoesContato', $SituacoesContato);
		
		$Cargos = $this->Chamada->Contato->ContatosInstituicao->Cargo->find('list', array('fields'=>array('id','nome')));
		$this->set('Cargos', $Cargos);

		
	}
	
	// Fones	
	public function exclui_fone_contato($id = 0) {
		$this->Chamada->Contato->ContatosFone->delete($id);
		$this->render(false);
	}
	
	public function ler_fone_contato($id = 0) {
		$this->layout = false;
		$ContatoFone = $this->Chamada->Contato->ContatosFone->read(null, $id);
		$this->set('ContatoFone', $ContatoFone);
	}
	
	public function edit_fone_contato($id = 0) {
		$data = $this->request->data;
		if ($id == 0) unset($data['ContatosFone']['id']);
		$this->Chamada->Contato->ContatosFone->save($data);
		$this->render(false);
	}
	
	// Emails
	public function exclui_email_contato($id = 0) {
		$this->Chamada->Contato->ContatosEmail->delete($id);
		$this->render(false);
	}
	
	public function ler_email_contato($id = 0) {
		$this->layout = false;
		$ContatoEmail = $this->Chamada->Contato->ContatosEmail->read(null, $id);
		$this->set('ContatoEmail', $ContatoEmail);
	}
	
	public function edit_email_contato($id = 0) {
		$data = $this->request->data;
		if ($id == 0) unset($data['ContatosFone']['id']);
		$this->Chamada->Contato->ContatosEmail->save($data);
		$this->render(false);
	}
	
	// Cargos Instituicao
	public function exclui_cargo_contato($id = 0, $inst_forn = 1) {
		if ($inst_forn == 1) {
			$this->Chamada->Contato->ContatosInstituicao->delete($id);
		} else {
			$this->Chamada->Contato->ContatosFornecedor->delete($id);
		}
		$this->render(false);
	}
	
	public function ler_cargo_contato($id = 0, $inst_forn = 1) {
		$this->layout = false;
		if ($inst_forn == 1) {
			$ContatoCargo = $this->Chamada->Contato->ContatosInstituicao->read(null, $id);
			$ContatoCargo['Inst_Forn'] = 1;
		} else {
			$ContatoCargo = $this->Chamada->Contato->ContatosFornecedor->read(null, $id);
			$ContatoCargo['Inst_Forn'] = 2;
		}
		$this->set('ContatoCargo', $ContatoCargo);
	}
	
	public function edit_cargo_contato($id = 0, $inst_forn = 1) {
		$this->layout = false;
		$data_temp = $this->request->data;
		
		if ($inst_forn == 1) {
			$data = array(
				'ContatosInstituicao' => array(
					'contato_id' => $data_temp['ContatoInst_Forn']['contato_id'],
					'instituicao_id' => $data_temp['ContatosInst_Forn']['id'],
					'cargo_id' => $data_temp['ContatosInstForn']['cargo_id'],
					'data_inicio' => $data_temp['ContatosInstForn']['data_inicio'],
					'data_fim' => $data_temp['ContatosInstForn']['data_fim'],
					'situacao_contato_id' => $data_temp['ContatosInstForn']['situacao_contato_id']
				)
			);
			if ($id != 0) $data['ContatosInstituicao']['id'] = $id;
			$this->Chamada->Contato->ContatosInstituicao->save($data);
		} else {
			$data = array(
				'ContatosFornecedor' => array(
					'contato_id' => $data_temp['ContatoInst_Forn']['contato_id'],
					'instituicao_id' => $data_temp['ContatosInst_Forn']['id'],
					'cargo_id' => $data_temp['ContatosInstForn']['cargo_id'],
					'data_inicio' => $data_temp['ContatosInstForn']['data_inicio'],
					'data_fim' => $data_temp['ContatosInstForn']['data_fim'],
					'situacao_contato_id' => $data_temp['ContatosInstForn']['situacao_contato_id']
				)
			);
			if ($id != 0) $data['ContatosFornecedor']['id'] = $id;
			$this->Chamada->Contato->ContatosFornecedor->save($data);
		}
		$this->render(false);
	}
	
	public function novo_contato() {
		$this->layout = false;
		$data_temp = $this->request->data;
		$contato = $data_temp['Contato'];
		// Gravar Contato
		$this->Chamada->Contato->create();
		$this->Chamada->Contato->save($contato);
		$contato_id = $this->Chamada->Contato->id;
		// Gravar Cargo do Contato
		$data = array(
			'cargo_id' => $data_temp['ContatosInstForn']['cargo_id'],
			'data_inicio' => $data_temp['ContatosInstForn']['data_inicio'],
			'data_fim' => $data_temp['ContatosInstForn']['data_fim'],
			'situacao_contato_id' => $data_temp['ContatosInstForn']['situacao_contato_id'],
			'contato_id' => $contato_id
		);
		if ($data_temp['ContatosInstForn']['inst_forn'] == 1) {
			$data['instituicao_id'] = $data_temp['ContatosInstForn']['inst_forn_id'];
			$this->Chamada->Contato->ContatosInstituicao->save($data);
		} else {
			$data['fornecedor_id'] = $data_temp['ContatosInstForn']['inst_forn_id'];
			$this->Chamada->Contato->ContatosFornecedor->save($data);
		}
		$this->render(false);
	}

}
