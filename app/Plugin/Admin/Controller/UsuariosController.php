<?php
class UsuariosController extends AdminAppController {

	public $uses = array('Admin.Usuario');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('password', 'logout');
	}

	public function home() {
		
	}
	
	function save($id = null) {
		if ($this->request->isPost()) {
			$data = $this->request->data;
			if ( $this->action == 'edit' ) {
				$data['Usuario']['id'] = $id;
			}
			
			$error = false;
			
			if ($data['Usuario']['senha1'] != '') {
				if ($data['Usuario']['senha1'] == $data['Usuario']['senha2']) {
					$data['Usuario']['senha'] = $this->Auth->password($data['Usuario']['senha1']);
					unset($data['Usuario']['senha2']);
				} else {
					$this->Bootstrap->setFlash('Erro! Senhas diferentes!','danger');
					$error = true;
				}
			} else {
				unset($data['Usuario']['senha1']);
				unset($data['Usuario']['senha2']);
			}
			
			if (!$error) {
				$this->Usuario->set($data);
				if ($this->Usuario->validates()) {
					$this->Bootstrap->setFlash('Usuário salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					pr($this->Usuario->invalidFields);
					$this->Bootstrap->setFlash('Erro ao salvar Usuário!','warning');
				}
			}

		}
	}
	
	function related() {
		$Grupos = array('0'=>'Selecione') + $this->Usuario->Grupo->find('list',array('fields'=>array('id','nome')));
		$this->set('Grupos',$Grupos);
		$Sites = array('0'=>'Selecione') + $this->Usuario->Site->find('list',array('fields'=>array('id','nome')));
		$this->set('Sites', $Sites);
	}
	
	public function index() {
	
		$this->set('title_for_layout','Usuários - Lista');
		
		$this->Usuario->Behaviors->attach('Containable');
		$this->Usuario->contain(
			'Grupo'
		);
		$conditions = $this->filterApply();
		
		$Usuarios = $this->Paginator->paginate('Usuario', $conditions);
		$this->set('data', $Usuarios);
	}
	
	public function add() {

		$this->save();
		
		$this->related();
		
		$this->render('form');
	}
	
	public function edit($usuario_id = null) {
		
		$this->save($usuario_id);
	
		$Usuario = $this->Usuario->read(null, $usuario_id);
		unset($Usuario['Usuario']['senha']);
		$this->request->data = $Usuario;
		
		$this->related();

		$this->render('form');
	}
	
	public function del($id = null) {
		if ($this->request->isPost()) {
			$Grupo = $this->Usuario->delete($id);
			$this->Bootstrap->setFlash('Usuário excluido com sucesso!');
			$this->redirect( array( 'action'=>'index' ));
		}
	}
	
	public function filter() {
		if ($this->request->isPost()) {
			$this->Session->write('filterUsuario', $this->request->data);
			$this->Bootstrap->setFlash('Usuário excluido com sucesso!');
			$this->redirect( array( 'action'=>'index' ));
		}
		$this->related();
		if ($this->Session->check('filterUsuario')) {
			$this->request->data = $this->Session->read('filterUsuario');
		}
	}
	
	public function filterApply() {
		if ($this->Session->check('filterUsuario')) {
			$filters = $this->Session->read('filterUsuario');
		} else {
			$filters = array();
		}
		
		$conditions = array();
		
		foreach ($filters as $mkey=>$mvalues) {
		foreach ($mvalues as $key=>$value) {
			if ($value) {
			$conditions[$mkey.'.'.$key.' like'] = '%'.$value.'%';
			}
		}
		}
		
		return $conditions;
	}
	
	public function login() {
		
		$this->set('title_for_layout','Portal Fenapaes');
		
		if ($this->request->isPost()) {
			$this->Usuario->Behaviors->attach('Containable');
			$this->Usuario->contain(
				'Grupo',
				'Grupo.Permissao'
			);
			if ($this->Auth->login()) {
				$usuario = $this->Auth->user();
				
				if (!$usuario['Grupo']['admin']) {
					$site = $this->Usuario->Site->read(null, $usuario['site_id']);
					$this->Session->write('selected_site', $site);	
				}
				$this->Bootstrap->setFlash('Usuário autenticado com successo!');
				$this->redirect(array('plugin'=>'Portal','controller'=>'Status','action'=>'index'));
			} else {
				unset($this->request->data['Usuario']['senha']);
				$this->Bootstrap->setFlash('Erro na autenticação do Usuário!','danger');
			}
		}

	}
	
	public function logout() {
		
		$this->Auth->logout();
		$this->Session->delete('selected_site');
		$this->Bootstrap->setFlash('Você saiu do sistema!');
		$this->redirect('/');
	}
	
	public function password($confirmacao = null) {
		App::uses('CakeEmail', 'Network/Email');
		
		if ($this->request->isPost()) {
			if (isset($this->request->data['Usuario']['senha1'])) {
				if ($this->request->data['Usuario']['senha1'] == $this->request->data['Usuario']['senha2']) {
					$Usuario = $this->Usuario->findByConfirmacao($confirmacao);
					$Usuario['Usuario']['senha'] = $this->Auth->password($this->request->data['Usuario']['senha1']);
					$this->Usuario->save($Usuario);
					
					$this->Session->setFlash('Nova senha gravada com sucesso!');
				} else {
					$this->Session->setFlash('Senhas digitadas não batem!');
				}
			} else {
			$confirmacao = time();
			$confirmacao = Security::hash($confirmacao);
			
			$conditions = array(
				'Usuario.email like ' => $this->request->data['Usuario']['email']
			);
			if ($Usuario = $this->Usuario->find('first', array('conditions'=>$conditions))) {
				$Usuario['Usuario']['confirmacao'] = $confirmacao;
				$this->Usuario->save($Usuario);
				$Email = new CakeEmail();
				$Email->from(array('me@example.com' => 'My Site'));
				$Email->to($this->request->data['Usuario']['email']);
				$Email->subject('Alteração de Senha');
				$Email->send('Clique no link a seguir para alterar sua senha: <a href="http://apaebr.org.br/admin/Usuarios/password/"'.$confirmacao.'>Alterar Senha</a>');
				$this->Session->setFlash('Confirmação enviada para o Email!');
			} else {
				$this->Session->setFlash('Email não encontrado!');
			}
			}
			
		}


		$this->set('confirmado', false);
		if ($confirmacao) {
			$conditions = array(
				'Usuario.confirmacao like ' => $confirmacao
			);
			$Usuario = $this->Usuario->find('all', array('conditions'=>$conditions));
			$this->set('confirmado', true);
		}
		
	}

}
