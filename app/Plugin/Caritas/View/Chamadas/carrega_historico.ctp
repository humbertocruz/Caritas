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