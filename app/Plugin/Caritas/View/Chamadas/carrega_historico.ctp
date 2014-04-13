<div class="ajax_paginator"><?php echo $this->Bootstrap->paginator($this->paginator); ?></div>
<table class="table table-bordered" style="background-color: #fff;">
	<tr>
		<th>Início</th>
		<th>Assunto</th>
		<th>Contato</th>
	</tr>
	<?php foreach ($historico as $dado) { ?>
	<tr>
		<td><?php echo $this->AuthBs->brdate($dado['Chamada']['data_inicio']); ?></td>
		<td><?php echo $dado['Contato']['nome']; ?></td>
		<td><?php echo $dado['Assunto']['nome']; ?></td>
	</tr>
	<?php } ?>
</table>
<script>
$(document).ready(function(){
	$('.ajax_paginator .pagination li.ajax_link a').click(function(){
		$.ajax({
			url: $(this).attr('href'),
			success: function(data){
				$('.ajax_paginator').parent().html(data);
			}
		})
		return false;
	});
});
</script>