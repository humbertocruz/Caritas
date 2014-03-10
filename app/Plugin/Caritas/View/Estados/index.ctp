<?php echo $this->Bootstrap->pageHeader('Estados'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Estados',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
)); ?>
<?php foreach ($Estados as $Estado) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Estado['Estado']['id']);?></td>
	<td><?php echo $Estado['Estado']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
