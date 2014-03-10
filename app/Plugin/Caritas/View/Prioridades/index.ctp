<?php echo $this->Bootstrap->pageHeader('Prioridades'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Prioridades',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
)); ?>
<?php foreach ($Prioridades as $Prioridade) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Prioridade['Prioridade']['id']);?></td>
	<td><?php echo $Prioridade['Prioridade']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
