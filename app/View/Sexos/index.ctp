<?php echo $this->Bootstrap->pageHeader('Sexos'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Sexos',
	'state'=>'info'
)); ?>
<tr>
	<th>&nbsp;</th>
	<th>Nome</th>
</tr>
<?php foreach ($Sexos as $Sexo) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Sexo['Sexo']['id']);?></td>
	<td><?php echo $Sexo['Sexo']['nome']; ?></td>
</tr>
<?php } ?>
</table>
		</div>
		<div class="panel-footer">
		<?php echo $this->Bootstrap->btnLink( 'Adicionar', array('action'=>'add'), 'success'); ?>
		</div>
</div>
