<?php echo $this->Bootstrap->pageHeader('Projetos'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Projetos',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
)); ?>
<?php foreach ($Projetos as $Projeto) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Projeto['Projeto']['id']);?></td>
	<td><?php echo $Projeto['Projeto']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
