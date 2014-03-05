<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class CaritasAppController extends AppController {

	public $helpers = array(
		'Bootstrap.AuthBs',
		'Bootstrap.Bootstrap',
		'Html'
	);
	
	public $uses = array('Caritas.Projeto');
	
	public $components = array(
		'Auth' => array(
			'loginAction' => array(
				'controller' => 'atendentes',
				'action' => 'login',
				'plugin' => 'admin'
			),
			'authError' => 'Did you really think you are allowed to see that?',
			'authenticate' => array(
				'Form' => array(
					'userModel' => 'Atendente',
					'fields' => array('username' => 'login','password'=>'senha')
				)
			)
		)
	);

	public function beforeFilter() {
	
		// Controle de Dados BelongsTo
		if ($this->request->isPost()) {
			if (isset($this->request->data['BelongsFormId'])) {
				$this->Session->write('BelongsForms.'.$this->request->data['BelongsFormId'],$this->request->data);
			}
		}
		
		// Escolha do Projeto
		if ($this->request->isPost()) {
			if (isset($this->request->data['Escolha'])) { 
				$projeto_id = $this->request->data['Escolha']['Projeto']['id'];
				$this->Session->write('Escolha.projeto_id', $projeto_id);
			}
		}
		
		$user = $this->Auth->user();
		$projetos_atendente = $this->Projeto->AtendentesProjeto->find('list', array('fields'=>array('id','projeto_id'),'conditions'=>array('atendente_id'=>$user['id'])));
		$this->set('escolha_projetos', $this->Projeto->find('list', array('fields'=>array('id','nome'),'conditions'=>array('id'=>$projetos_atendente))));
		
		$conditions = array(
			'Chamada.atendente_id' => $user['id'],
			'Chamada.data_fim' => null
		);
		$emaberto = $this->Projeto->Chamada->find('count', array('conditions'=>$conditions));
		$this->set('emaberto', $emaberto);


		if (count($projetos_atendente) == 1) {
			$this->set('escolhido_projeto_id', $projetos_atendente[$user['id']]);
			$this->escolhido_projeto_id = $projetos_atendente[$user['id']];
		} else {
			
			if ($this->Session->check('Escolha.projeto_id')) { 
				$this->set('escolhido_projeto_id', $this->Session->read('Escolha.projeto_id'));
				$this->escolhido_projeto_id = $this->Session->read('Escolha.projeto_id');
			} else {
				$this->set('escolhido_projeto_id', 0);
				$this->escolhido_projeto_id = 0;
			}
		
		}
		
		if($this->Session->check('BelongsForms')){
			$this->set('belongsForms',$this->Session->read('BelongsForms'));
		}

		// Carregar Layout bootstrap
		$this->layout = 'Bootstrap.bootstrap';

		$menus = array(
			array(
			'Menu' => array(
				'title' => 'Menu Superior'
			),
			'Links' => array(
				array(
				'Link' => array(
					'id' => 1,
					'text' => 'Módulos'
				),
				'children' => array(
					array(
						'Link' => array(
							'id' => 1,
							'text' => 'Chamada',
							'plugin' => 'caritas',
							'controller' => 'chamadas',
							'action' => 'index'
						)
					),
					array(
						'Link' => array(
							'id' => 1,
							'text' => 'Contato',
							'plugin' => 'caritas',
							'controller' => 'contatos',
							'action' => 'index'
						)
					)
				)
				),
				array(
				'Link' => array(
					'id' => 1,
					'text' => 'Tabelas'
				),
				'children' => array(
					array(
						'Link' => array(
							'id' => 1,
							'text' => 'Assuntos',
							'plugin' => 'caritas',
							'controller' => 'assuntos',
							'action' => 'index'
						)
					),
					array(
						'Link' => array(
							'id' => 1,
							'text' => 'Projetos',
							'plugin' => 'caritas',
							'controller' => 'projetos',
							'action' => 'index'
						)
					)
				)
				)
			)
			)
		);

		$this->set('menus', $menus);
		$this->set('usuario', $this->Auth->user());
	}

}
