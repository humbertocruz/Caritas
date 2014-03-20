<?php echo $this->Bootstrap->pageHeader('Cargos'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Cargos',
	'state'=>'info'
)); ?>
<tr>
	<th>&nbsp;</th>
	<th>Nome</th>
</tr>
<?php foreach ($Cargos as $Cargo) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Cargo['Cargo']['id']);?></td>
	<td><?php echo $Cargo['Cargo']['nome']; ?></td>
</tr>
<?php } ?>
</table>
</div>
<div class="panel-footer">
	<?php echo $this->Bootstrap->btnLink('Adicionar', array('action'=>'add'), 'success'); ?>
</div>
</div>