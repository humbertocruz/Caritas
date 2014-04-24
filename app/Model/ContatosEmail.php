<?php

class ContatosEmail extends AppModel {

	public $useTable = 'contatos_emails';

	public $belongsTo = array(
		'TiposEmail' => array(
			'className' => 'TiposEmail',
			'foreignKey' => 'tipo_email_id'
		)
	);

}