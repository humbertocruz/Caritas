<?php
	echo $this->Bootstrap->create('ChamadasProcedimento',array('type'=>'post'));
		
	echo $this->Form->input('procedimento_id', array(
		'label'=>'Procedimento',
		'options'=>$procedimentos
	));
	
	echo $this->Form->input('data', array(
		'type' => 'text',
		'label' => 'Data',
		'class' => 'maskedinput form-control',
		'data-date-format' => 'dd/mm/yyyy'
	));
	
	echo $this->Form->input('procedimento', array(
		'label' => 'Descrição',
		'type'=>'textarea'
	));
	
	echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary'));	
	
	echo $this->Form->end();
	?>
	
	<script>
	$(document).ready(function(){
		$('#ChamadasProcedimentoProcedimentoId').change(function(){
			$.ajax({
				'url':'/caritas/Chamadas/carregaProcedimento/'+$(this).val(),
				'type': 'post',
				'success': function(data){
					$('#ChamadasProcedimentoProcedimento').val(data);
				}
			});
		});
	});
	</script>
	
