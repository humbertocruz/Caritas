<?php echo $this->Bootstrap->pageHeader('Processos'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Processos',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
)); ?>
<?php foreach ($Processos as $Processo) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Processo['Processo']['id']);?></td>
	<td><?php echo $Processo['Processo']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
