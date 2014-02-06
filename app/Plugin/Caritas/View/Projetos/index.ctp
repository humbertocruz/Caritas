<?php echo $this->Bootstrap->pageHeader('Projetos'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Chamadas',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
)); ?>
<?php foreach ($Projetos as $Projeto) { ?>
<tr>
	<td>&nbsp;</td>
	<td><?php echo $Projeto['Projeto']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>

<?php echo $this->Bootstrap->btnLink('Adicionar', array('action'=>'add'), 'primary'); ?>