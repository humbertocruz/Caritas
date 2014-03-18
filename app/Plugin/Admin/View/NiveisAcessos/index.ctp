<?php echo $this->Bootstrap->pageHeader('Níveis de Acesso'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Níveis de Acesso',
	'state'=>'info')); ?>
	<tr>
		<th>&nbsp;</th>
		<th>Nome</th>
		<th>Admin ?</th>
	</tr>
<?php foreach ($NiveisAcessos as $NiveisAcesso) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($NiveisAcesso['NiveisAcesso']['id']);?></td>
	<td><?php echo $NiveisAcesso['NiveisAcesso']['nome']; ?></td>
	<th><?php echo ($NiveisAcesso['NiveisAcesso']['admin'])?('<span class="text-danger">Sim</span>'):('<span class="text-success">Não</span>'); ?></th>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
