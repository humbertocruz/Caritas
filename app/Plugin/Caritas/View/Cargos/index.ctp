<?php echo $this->Bootstrap->pageHeader('Cargos'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Cargos',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
)); ?>
<?php foreach ($Cargos as $Cargo) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Cargo['Cargo']['id']);?></td>
	<td><?php echo $Cargo['Cargo']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>