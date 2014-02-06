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
	<td>&nbsp;</td>
	<td><?php echo $Assunto['Assunto']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>

<?php echo $this->Bootstrap->btnLink('Adicionar', array('action'=>'add'), 'primary'); ?>