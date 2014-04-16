<div class="panel-heading">
	Histórico
</div>
<table class="table style="background-color: #fff;">
	<tr>
		<th>Início</th>
		<th>Contato</th>
		<th>Assunto</th>
	</tr>
	<?php foreach ($historico as $dado) { ?>
	<tr>
		<td><?php echo $dado['Chamada']['data_inicio']; ?></td>
		<td><?php echo $dado['Contato']['nome']; ?></td>
		<td><?php echo $dado['Assunto']['nome']; ?></td>
	</tr>
	<?php } ?>
</table>
<div class="panel-footer"><span class="ajax_paginator"><?php echo $this->Bootstrap->simplePaginator($this->paginator); ?></span></div>
<script>
$(document).ready(function(){
	$('.ajax_paginator .pagination li a').click(function(){
		$.ajax({
			url: $(this).attr('href'),
			success: function(data){
				$('#historico').html(data);
			}
		})
		return false;
	});
});
</script>