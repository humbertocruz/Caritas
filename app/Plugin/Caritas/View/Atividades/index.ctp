<?php echo $this->Bootstrap->pageHeader('Atividades'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Atividades',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
)); ?>
<?php foreach ($Atividades as $Atividade) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Atividade['Atividade']['id']);?></td>
	<td><?php echo $Atividade['Atividade']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
