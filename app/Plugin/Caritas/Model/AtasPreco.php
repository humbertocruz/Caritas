<?php

class AtasPreco extends CaritasAppModel {

	public $useTable = 'ata_precos';
	
	public $belongsTo = array(
		'Edital'
	);
	
	public function afterFind($results, $primary = false) {
		if (is_array( $results )) {
		foreach($results as $key => $value) {
			if ( isset($value['AtasPreco']['data']) ) {
				$results[$key]['AtasPreco']['data'] = date('d/m/Y', strtotime( $value['AtasPreco']['data'] ) );
			}
		}
		}
		return $results;
	}
	
	public function beforeSave( $options = array() ) {
		if ( !empty($this->data['AtasPreco']['data']) ) {
			$this->data['AtasPreco']['data'] = date_format(date_create_from_format('d/m/Y', $this->data['AtasPreco']['data'] ), 'Y-m-d' );
		}
		return true;
	}

}