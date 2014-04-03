<?php
class AtendentesController extends AdminAppController {

	public $uses = array('Caritas.Atendente');

	public function home() {
		
	}
	
	public function index() {
	
		$this->set('title_for_layout','Atendentes - Lista');
		
		$this->Atendente->Behaviors->attach('Containable');
		$this->Atendente->contain(
			'Sexo',
			'NiveisAcesso'
		);

		$Atendentes = $this->Paginate('Atendente');
		$this->set('Atendentes', $Atendentes);
	}
	
	public function add() {
	
		$this->set('title_for_layout','Atendentes - Adiciona');
	
		if ($this->request->isPost()) {
			$data = $this->request->data;
			if (isset($data['Atendente']['id'])) unset($data['Atendente']['id']);
			
			$this->Atendente->create();
			if ($this->Atendente->save($data)) {
				$this->Session->setFlash('Atendente adicionado com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Erro ao adicionar Atendente!');
			}
			
		}
	
		$this->set('Sexos', $this->Atendente->Sexo->find('list', array('fields'=>array('id', 'nome'))));
		$this->set('NiveisAcessos', $this->Atendente->NiveisAcesso->find('list', array('fields'=>array('id', 'nome'))));
		
		$this->render('form');
	}
	
	public function edit($atendente_id = null) {
	
		$this->set('title_for_layout','Atendentes - Edita');
	
		if ($this->request->isPost()) {
			$data = $this->request->data;
			$data['Atendente']['id'] = $atendente_id;
			
			if ($this->Atendente->save($data)) {
				$this->Session->setFlash('Atendente editado com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Erro ao editar Atendente!');
			}
			
		}

		$this->set('Sexos', $this->Atendente->Sexo->find('list', array('fields'=>array('id', 'nome'))));
		$this->set('NiveisAcessos', $this->Atendente->NiveisAcesso->find('list', array('fields'=>array('id', 'nome'))));
		
		$this->request->data = $this->Atendente->read(null, $atendente_id);

		$this->render('form');
	}
	
	public function emaberto() {
		$this->uses = array('Chamada');
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
		$user = $this->Auth->user();
		$conditions = array(
			'Chamada.atendente_id' => $user['id'],
			'Chamada.data_fim' => null
		);
		$chamadas = $this->Paginate('Chamada',$conditions);
		$this->set('Chamadas',$chamadas);
		
	}
	
	public function login() {
		
		$this->set('title_for_layout','Sistema Cáritas');
	
		if ($this->request->isPost()) {
			
			if ($this->Auth->login()) {
				$this->Session->setFlash('Atendente autenticado com successo!');
				$this->redirect('/');
			} else {
				$this->Session->setFlash('Erro na autenticação do Atendente!');
			}
			
		}

	}
	
	public function logout() {
		
		$this->Auth->logout();
		$this->Session->setFlash('Você saiu do sistema!');
		$this->redirect('/');
	}

}