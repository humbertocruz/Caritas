<?php
echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Níveis de Acessos',
	'state'=>'info'
	)
); 
if (count($NiveisAcessos) == 0) { ?>
<tr>
	<td colspan="8">Nenhum Nível de Acesso encontrado!</td>
</tr>
<?php } else { ?>
<tr class="panel">
	<th class="col-md-1">&nbsp;</th>
	<th class="col-md-2">Nome</th>
</tr>
<?php 
foreach ($NiveisAcessos as $NivelAcesso) { ?>
<tr>
	<td>
		<?php echo $this->Bootstrap->basicActions($NivelAcesso['NiveisAcesso']['id']); ?>
	</td>
	<td><?php echo $NivelAcesso['NiveisAcesso']['nome']; ?></td>
</tr>
<?php } ?>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>