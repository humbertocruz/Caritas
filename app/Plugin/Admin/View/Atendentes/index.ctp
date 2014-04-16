
<?php
echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Atendentes',
	'state'=>'info'
	)
); 
if (count($Atendentes) == 0) { ?>
<tr>
	<td colspan="8">Nenhum Atendente encontrado!</td>
</tr>
<?php } else { ?>
<tr class="panel">
	<th class="col-md-1">&nbsp;</th>
	<th class="col-md-2">Nome</th>
	<th class="col-md-1">Email</th>
	<th class="col-md-2">CPF</th>
	<th class="col-md-1">Nível</th>
</tr>
<?php 
foreach ($Atendentes as $Atendente) { ?>
<tr>
	<td>
		<?php echo $this->Bootstrap->atendenteActions($Atendente['Atendente']['id']); ?>
	</td>
	<td><?php echo $Atendente['Atendente']['nome']; ?></td>
	<td><?php echo $Atendente['Atendente']['email']; ?></td>
	<td><?php echo $Atendente['Atendente']['cpf']; ?></td>
	<td><?php echo $Atendente['NiveisAcesso']['nome'];?></td>
</tr>
<?php } ?>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>