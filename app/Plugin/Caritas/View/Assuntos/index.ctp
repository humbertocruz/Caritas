<?php echo $this->Bootstrap->pageHeader('Assuntos'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Chamadas',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
)); ?>
<?php foreach ($Assuntos as $Assunto) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Assunto['Assunto']['id']);?></td>
	<td><?php echo $Assunto['Assunto']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
