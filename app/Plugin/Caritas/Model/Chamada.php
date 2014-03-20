<?php

class Chamada extends CaritasAppModel {

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
			'className' => 'Caritas.Chamada',
			'foreignKey' => 'chamada_id'
		),
		'ChamadasProcedimento' => array(
			'className' => 'Caritas.ChamadasProcedimento',
			'foreignKey' => 'chamada_id'
		)
	);

	public $belongsTo = array(

		'Instituicao' => array(
			'className' => 'Caritas.Instituicao',
			'foreignKey' => 'instituicao_id'
		),
		'Contato' => array(
			'className' => 'Caritas.Contato',
			'foreignKey' => 'contato_id'
		),
		'Fornecedor' => array(
			'className' => 'Caritas.Fornecedor',
			'foreignKey' => 'fornecedor_id'
		),
		'Assunto' => array(
			'className' => 'Caritas.Assunto',
			'foreignKey' => 'assunto_id'
		),
		'Atendente' => array(
			'className' => 'Caritas.Atendente',
			'foreignKey' => 'atendente_id'
		),
		'Estado' => array(
			'className' => 'Caritas.Estado',
			'foreignKey' => 'estado_id'
		),
		'Cidade' => array(
			'className' => 'Caritas.Cidade',
			'foreignKey' => 'cidade_id'
		),
		'TiposChamada' => array(
			'className' => 'Caritas.TiposChamada',
			'foreignKey' => 'tipo_chamada_id'
		),
		'Status' => array(
			'className' => 'Caritas.Status',
			'foreignKey' => 'status_id'
		),
		'Prioridade' => array(
			'className' => 'Caritas.Prioridade',
			'foreignKey' => 'prioridade_id'
		)
	);

}