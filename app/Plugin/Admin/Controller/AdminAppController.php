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
class AdminAppController extends AppController {

	public $uses = array('Caritas.Menu');

	public $helpers = array(
		'Bootstrap.AuthBs',
		'Bootstrap.Bootstrap',
		'Html'
	);
	
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
					'userModel' => 'Caritas.Atendente',
					'fields' => array('username' => 'email','password'=>'senha')
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
		
		// Carregar Layout bootstrap
		$this->layout = 'Bootstrap.bootstrap-admin';

		$menus = array(
			array(
				'Menu' => array(
					'title' => 'Menu Admin'
				),
				'Links' => array(
					array(
						'Link' => array(
							'id' => 1,
							'text' => 'Usuários'
						),
						'children' => array(
							array(
								'Link' => array(
									'id' => 1,
									'text' => 'Atendente',
									'plugin' => 'admin',
									'controller' => 'atendentes',
									'action' => 'index'
								)
							),
							array(
								'Link' => array(
									'id' => 1,
									'text' => 'Níveis de Acesso',
									'plugin' => 'admin',
									'controller' => 'niveis_acessos',
									'action' => 'index'
								)
							)
						)
					),
					array(
						'Link' => array(
						'id' => 1,
						'text' => 'Sistema'
					),
					'children' => array(
						array(
							'Link' => array(
								'id' => 1,
								'text' => 'Menus',
								'plugin' => 'admin',
								'controller' => 'menus',
								'action' => 'index'
							)
						)
					)
				)
			)
		)
	);
	
		$this->set('action_name', $this->action);

		$user = $this->Auth->user();
		if ($user) {		
		$conditions = array(
			'Permissao.nivel_acesso_id' => $user['nivel_acesso_id']
		);
		
		$PermissoesUser = $this->Menu->NiveisAcesso->Permissao->find('all', array('conditions'=>$conditions));
		
		$Permissoes = array();
		foreach($PermissoesUser as $Permissao) {
			$Permissoes[$Permissao['Permissao']['controller']][$Permissao['Permissao']['action']] = true;
		}
		
		$this->set('UserPermissoes', $Permissoes);

		$this->set('menus', $menus);
		$this->set('usuario', $this->Auth->user());
		}
	}

}
