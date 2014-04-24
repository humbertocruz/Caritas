<?php

class Chamada extends AppModel {
		
	public $sort = array(
		'data_inicio' => 'DESC'
	);

	public $validade = array(
		'data_inicio' => array(
			'rule'			=> 'date',
			'message'		=> 'Digite uma data válida!',
			'required'		=> true,
			'allowEmpty'	=> false
		)
	);
		
	public function afterFind($results, $primary = false) {
		if (is_array( $results )) {
		foreach($results as $key => $value) {
			if ( isset($value['Chamada']['data_inicio']) ) {
				$results[$key]['Chamada']['data_inicio'] = date('d/m/Y', strtotime( $value['Chamada']['data_inicio'] ) );
			}
		}
		}
		return $results;
	}
	
	public function beforeSave( $options = array() ) {
		if ( !empty($this->data['Chamada']['data_inicio']) ) {
			$this->data['Chamada']['data_inicio'] = date_format(date_create_from_format('d/m/Y', $this->data['Chamada']['data_inicio'] ), 'Y-m-d' );
		}
		return true;
	}
	
	public $hasMany = array(
		'Filhas' => array(
			'className' => 'Chamada',
			'foreignKey' => 'chamada_id'
		),
		'ChamadasProcedimento' => array(
			'className' => 'ChamadasProcedimento',
			'foreignKey' => 'chamada_id'
		)
	);

	public $belongsTo = array(

		'Instituicao' => array(
			'className' => 'Instituicao',
			'foreignKey' => 'instituicao_id'
		),
		'Contato' => array(
			'className' => 'Contato',
			'foreignKey' => 'contato_id'
		),
		'Fornecedor' => array(
			'className' => 'Fornecedor',
			'foreignKey' => 'fornecedor_id'
		),
		'Assunto' => array(
			'className' => 'Assunto',
			'foreignKey' => 'assunto_id'
		),
		'Atendente' => array(
			'className' => 'Atendente',
			'foreignKey' => 'atendente_id'
		),
		'Estado' => array(
			'className' => 'Estado',
			'foreignKey' => 'estado_id'
		),
		'Cidade' => array(
			'className' => 'Cidade',
			'foreignKey' => 'cidade_id'
		),
		'TiposChamada' => array(
			'className' => 'TiposChamada',
			'foreignKey' => 'tipo_chamada_id'
		),
		'Status' => array(
			'className' => 'Status',
			'foreignKey' => 'status_id'
		),
		'Prioridade' => array(
			'className' => 'Prioridade',
			'foreignKey' => 'prioridade_id'
		)
	);

}