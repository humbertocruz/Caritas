<?php echo $this->Bootstrap->pageHeader('Chamadas'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Chamadas',
	'state'=>'info',
	'fields' => array(
		'Data',
		'Instituição/Fornecedor'
	)
)); ?>
<?php foreach ($Chamadas as $Chamada) { ?>
<tr>
	<td>&nbsp;</td>
	<td><?php echo $this->AuthBs->brdate($Chamada['Chamada']['data_inicio']);?></td>
	<td><?php echo $Chamada['Instituicao']['nome_fantasia']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>

<?php echo $this->Bootstrap->btnLink('Adicionar', array('action'=>'add'), 'primary'); ?>