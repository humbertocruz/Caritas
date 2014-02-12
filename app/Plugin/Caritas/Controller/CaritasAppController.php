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
		'Html',
		'Paginator'
	);
	
	public $uses = array('Caritas.Estado');

	public function beforeFilter() {

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

		$usuario = array(
			'nome' => 'Humberto Cruz'
		);
		$this->set('usuario', $usuario);
	}

}
