<?php
	echo $this->Form->create('EditProcedimento');
		
	echo $this->Bootstrap->belongs('procedimento_id', array(
		'label'=>'Procedimento',
		'options'=>$procedimentos, 
		'url'=>'/procedimentos',
		'model' => 'ChamadasProcedimento'
	));
	
	echo $this->Bootstrap->input('data', array(
		'type' => 'date',
		'label' => 'Data',
		'model' => 'ChamadasProcedimento'
	));
	
	echo $this->Bootstrap->text('procedimento', array(
		'label' => 'Descrição',
		'model' => 'ChamadasProcedimento'
	));
	
	echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary'));	
	
	echo $this->Form->end();
	
	
