<?php

class MenusComponent extends Component {
	
	public function generate() {
		return array(
			array(
				'Link' => array(
					'texto' => 'Módulos',
					'plugin' => false,
					'controller' => false,
					'action' => false,
					'children' => array(
						array(
							'Link' => array(
								'texto' => 'Chamadas',
								'plugin' => false,
								'controller' => 'Chamadas',
								'action' => 'index'
							)
						)
					)
				)
			),
			array(
				'Link' => array(
					'texto' => 'Tabelas',
					'plugin' => false,
					'controller' => false,
					'action' => false,
					'children' => array(
						array(
							'Link' => array(
								'texto' => 'Assuntos',
								'plugin' => false,
								'controller' => 'Assuntos',
								'action' => 'index'
							)
						),
						array(
							'Link' => array(
								'texto' => 'Atas de Preço',
								'plugin' => false,
								'controller' => 'AtasPrecos',
								'action' => 'index'
							)
						),
						array(
							'Link' => array(
								'texto' => 'Atividades',
								'plugin' => false,
								'controller' => 'Atividades',
								'action' => 'index'
							)
						),
						array(
							'Link' => array(
								'texto' => 'Cargos',
								'plugin' => false,
								'controller' => 'Cargos',
								'action' => 'index'
							)
						),
						array(
							'Link' => array(
								'texto' => 'Cidades',
								'plugin' => false,
								'controller' => 'Cidades',
								'action' => 'index'
							)
						)
					)
				)
			)
		);
	}
}