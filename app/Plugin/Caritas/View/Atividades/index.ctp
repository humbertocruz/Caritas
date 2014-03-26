<?php echo $this->Bootstrap->pageHeader('Atividades'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Atividades',
	'state'=>'info'
)); ?>
<tr>
	<th>&nbsp;</th>
	<th>Nome</th>
</tr>
<?php foreach ($Atividades as $Atividade) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Atividade['Atividade']['id']);?></td>
	<td><?php echo $Atividade['Atividade']['nome']; ?></td>
</tr>
<?php } ?>
</table>
		</div>
		<div class="panel-footer">
		<?php echo $this->Bootstrap->btnLink( 'Adicionar', array('action'=>'add'), 'success'); ?>
		</div>
</div>
