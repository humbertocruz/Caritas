<?php
	echo $this->Bootstrap->create('EditProcedimento');
		
	echo $this->Form->input('procedimento_id', array(
		'label'=>'Procedimento',
		'options'=>$procedimentos
	));
	
	echo $this->Form->input('data', array(
		'type' => 'text',
		'label' => 'Data'
	));
	
	echo $this->Form->input('procedimento', array(
		'label' => 'Descrição',
		'type'=>'textarea'
	));
	
	echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary'));	
	
	echo $this->Form->end();
	
	
