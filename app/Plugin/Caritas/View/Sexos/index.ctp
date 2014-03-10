<?php echo $this->Bootstrap->pageHeader('Sexos'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Sexos',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
)); ?>
<?php foreach ($Sexos as $Sexo) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Sexo['Sexo']['id']);?></td>
	<td><?php echo $Sexo['Sexo']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
