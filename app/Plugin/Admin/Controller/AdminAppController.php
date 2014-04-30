<?php

App::uses('Controller', 'Controller');

class AdminAppController extends AppController {
	
	public $uses = array('Sites.Menu');
	public $system =  array(
		'name'=>'Cáritas',
		'url' => '/'
	);
	public $sys_url = '/caritas';
	
	public $listActions = array(
		array(
			'text' => 'Adicionar',
			'icon' => 'plus',
			'style' => 'success',
			'action' => 'add'
		),
		array(
			'text' => 'Filtrar',
			'icon' => 'filter',
			'style' => 'default',
			'action' => 'filter'
		)
	);
	
	public $formActions = array(
		array(
			'text' => 'Gravar',
			'icon' => 'floppy-disk',
			'style' => 'success',
			'action' => false,
			'submit' => true
		),
		array(
			'text' => 'Cancelar',
			'icon' => 'remove',
			'action' => 'index',
			'style' => 'warning'
		)
	);
	public $indexActions = array(
		array(
			'text' => false,
			'icon' => 'edit',
			'action' => 'edit'
		),
		array(
			'text' => false,
			'title' => 'Excluir',
			'action' => 'del',
			'icon' => 'trash',
			'method' => 'post',
			'message' => 'Tem Certeza?'
			)
	);
	
	public $components = array(
		'Admin.MenuAdmin'
	);
	
	public function beforeFilter() {

		// Carregar Layout bootstrap
		$this->layout = 'Admin.admin';
		$menus = $this->MenuAdmin->generate();
		$this->set('menus', $menus);
		$this->set('usuario', $this->Auth->user());
		
		$this->set('listActions', $this->listActions);
		$this->set('indexActions', $this->indexActions);
		$this->set('formActions', $this->formActions);
		
		// Sistema
		$this->set('system', $this->system);
		
	}

}
