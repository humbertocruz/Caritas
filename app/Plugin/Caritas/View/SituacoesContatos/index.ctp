<?php echo $this->Bootstrap->pageHeader('SituacoesContatos'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'SituacoesContatos',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
)); ?>
<?php foreach ($SituacoesContatos as $SituacoesContato) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($SituacoesContato['SituacoesContato']['id']);?></td>
	<td><?php echo $SituacoesContato['SituacoesContato']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
