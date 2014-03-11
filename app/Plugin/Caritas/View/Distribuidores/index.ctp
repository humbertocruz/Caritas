<?php echo $this->Bootstrap->pageHeader('Distribuidores'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Distribuidores',
	'state'=>'info'
)); ?>
<tr>
	<th>&nbsp;</th>
	<th>Nome</th>
	<th>Fornecedor</th>
</tr>
<?php foreach ($Distribuidores as $Distribuidor) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Distribuidor['Distribuidor']['id']);?></td>
	<td><?php echo $Distribuidor['Distribuidor']['nome']; ?></td>
	<td><?php echo $Distribuidor['Fornecedor']['nome_fantasia'];?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
