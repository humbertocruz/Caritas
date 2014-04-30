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
class AppController extends Controller {

	public $helpers = array(
		'Bootstrap.AuthBs',
		'Bootstrap.Bootstrap',
		'Html'
	);
	
	public $components = array(
		'Auth' => array(
			'loginAction' => array(
				'controller' => 'usuarios',
				'action' => 'login',
				'plugin' => 'admin'
			),
			'authError' => 'Did you really think you are allowed to see that?',
			'authenticate' => array(
				'Form' => array(
					'userModel' => 'Usuario',
					'fields' => array('username' => 'email','password'=>'senha')
				)
			)
		),
		'Bootstrap.Bootstrap',
		'Session',
		'Menus',
		'Paginator'
	);

	public function beforeFilter() {
	
		$this->layout = 'Bootstrap.default';
		$this->set('usuario', $this->Auth->user());
		$this->set('menus', $this->Menus->generate());
		
		// Botoes padroes para listagem de dados
		// É possível sobre-escrever os botôes padrão criando outra variavel "listButtons" no controller ou na view
		$this->set('indexButtons', array(
			array(
				'text' => false,
				'title' => 'Editar',
				'action' => 'edit',
				'icon' => 'edit'
			),
			array(
				'text' => false,
				'title' => 'Excluir',
				'action' => 'del',
				'icon' => 'remove',
				'method' => 'post',
				'message' => 'Tem Certeza?'
			)
		));
		// Ações padroes para listagem de dados
		// É possível sobre-escrever as açõs padrão criando outra variavel "actionButtons" no controller ou na view
		$this->indexActions = array(
			array(
				'style' => 'success',
				'text' => 'Adicionar',
				'title' => 'Adicionar',
				'action' => 'add',
				'icon' => 'plus'
			)
		);
		$this->set('indexActions', $this->indexActions);
		// Ações padroes para o formulario de dados
		$this->set('formActions', array(
			array(
				'style' => 'success',
				'text' => 'Gravar',
				'title' => 'Gravar',
				'icon' => 'floppy-disk',
				'submit' => true
			),
			array(
				'style' => 'danger',
				'text' => 'Cancelar',
				'title' => 'Cancelar',
				'action' => 'index',
				'icon' => 'remove'
			)
		));
	
	}
}
