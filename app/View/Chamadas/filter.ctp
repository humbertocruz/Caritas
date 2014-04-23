<?php echo $this->Bootstrap->pageHeader('Filtros de Chamadas'); ?>

<?php
    echo $this->Bootstrap->create('Chamada', array('type'=>'post'));
    
    echo $this->Bootstrap->input('data_inicio', array('type'=>'text','label'=>'Período','class'=>'form-control daterangerpicker'));
    
    echo $this->Bootstrap->input('atendente_id', array('label'=>'Atendente', 'options'=>$Filter['Atendente']));
    echo $this->Bootstrap->input('estado_id', array('label'=>'UF','options'=>$Filter['Estado']));
    echo $this->Bootstrap->input('cidade_id', array('label'=>'Cidade','options'=>$Filter['Cidade']));
    echo $this->Bootstrap->input('assunto_id', array('label'=>'Assunto','options'=>$Filter['Assunto']));
    echo $this->Bootstrap->input('status_id', array('label'=>'Status','options'=>$Filter['Status']));
    
    echo $this->Bootstrap->submit('Filtrar');
    echo $this->Bootstrap->submit('Zerar',array('class'=>'btn-danger pull-right'));
    
    echo $this->Bootstrap->end();
    
?>
<script>
	$(document).ready(function(){
		$('input.daterangerpicker').daterangepicker({
			locale: 'pt_BR'
		});
		$('#ChamadaEstadoId').change(function(){
			$.ajax({
				url: '/caritas/Chamadas/carrega_cidades/'+$(this).val(),
				success: function(data) {
					$('#ChamadaCidadeId').html(data);
				}
			});
		});
		
	});
</script>
