<?php echo $this->Bootstrap->pageHeader('Etapas'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Etapas',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
)); ?>
<?php foreach ($Etapas as $Etapa) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Etapa['Etapa']['id']);?></td>
	<td><?php echo $Etapa['Etapa']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
