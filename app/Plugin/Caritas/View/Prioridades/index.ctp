<?php echo $this->Bootstrap->pageHeader('Prioridades'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Prioridades',
	'state'=>'info'
)); ?>
<tr>
	<th>&nbsp;</th>
	<th>Nome</th>
</tr>
<?php foreach ($Prioridades as $Prioridade) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Prioridade['Prioridade']['id']);?></td>
	<td><?php echo $Prioridade['Prioridade']['nome']; ?></td>
</tr>
<?php } ?>
<</table>
		</div>
		<div class="panel-footer">
		<?php echo $this->Bootstrap->btnLink( 'Adicionar', array('action'=>'add'), 'success'); ?>
		</div>
</div>
