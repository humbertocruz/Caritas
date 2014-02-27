<?php

class ContatosEmail extends CaritasAppModel {

	public $useTable = 'contatos_emails';

	public $belongsTo = array(
		'TiposEmail' => array(
			'className' => 'Caritas.TiposEmail',
			'foreignKey' => 'tipo_email_id'
		)
	);

}