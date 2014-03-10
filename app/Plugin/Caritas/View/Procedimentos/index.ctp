<?php echo $this->Bootstrap->pageHeader('Procedimentos'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Procedimentos',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
)); ?>
<?php foreach ($Procedimentos as $Procedimento) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Procedimento['Procedimento']['id']);?></td>
	<td><?php echo $Procedimento['Procedimento']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
