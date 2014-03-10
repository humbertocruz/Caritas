<?php echo $this->Bootstrap->pageHeader('Orgaos'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Orgãos',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
)); ?>
<?php foreach ($Orgaos as $Orgao) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Orgao['Orgao']['id']);?></td>
	<td><?php echo $Orgao['Orgao']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
