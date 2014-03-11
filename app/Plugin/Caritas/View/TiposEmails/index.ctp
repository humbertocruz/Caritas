<?php echo $this->Bootstrap->pageHeader('TiposEmails'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'TiposEmails',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
)); ?>
<?php foreach ($TiposEmails as $TiposEmail) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($TiposEmail['TiposEmail']['id']);?></td>
	<td><?php echo $TiposEmail['TiposEmail']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
