<?php echo $this->Bootstrap->pageHeader('Atas de Preços'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Atas de Preços',
	'state'=>'info',
	'fields' => array(
		'Nome',
		'Edital'
	)
)); ?>
<?php foreach ($AtasPrecos as $AtasPreco) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($AtasPreco['AtasPreco']['id']);?></td>
	<td><?php echo $AtasPreco['AtasPreco']['nome']; ?></td>
	<td><?php echo $AtasPreco['Edital']['numero']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
