<?php

class ChamadasProcedimento extends CaritasAppModel {

	public $useTable = 'chamadas_procedimentos';
	
	public $belongsTo = array(
		'Procedimento' => array(
			'className' => 'Caritas.Procedimento',
			'foreignKey' => 'procedimento_id'
		)
	);
	
	public function afterFind($results, $primary = false) {
		if (is_array( $results )) {
		foreach($results as $key => $value) {
			if ( isset($value['ChamadasProcedimento']['data']) ) {
				$results[$key]['ChamadasProcedimento']['data'] = date('d/m/Y', strtotime( $value['ChamadasProcedimento']['data'] ) );
			}
		}
		}
		return $results;
	}
	
	public function beforeSave( $options = array() ) {
		if ( !empty($this->data['ChamadasProcedimento']['data']) ) {
			$this->data['ChamadasProcedimento']['data'] = date_format(date_create_from_format('d/m/Y', $this->data['ChamadasProcedimento']['data'] ), 'Y-m-d' );
		}
		return true;
	}

}