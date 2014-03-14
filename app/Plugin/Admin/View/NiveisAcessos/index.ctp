<?php echo $this->Bootstrap->pageHeader('Níveis de Acesso'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Níveis de Acesso',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
)); ?>
<?php foreach ($NiveisAcessos as $NiveisAcesso) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($NiveisAcesso['NiveisAcesso']['id']);?></td>
	<td><?php echo $NiveisAcesso['NiveisAcesso']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
