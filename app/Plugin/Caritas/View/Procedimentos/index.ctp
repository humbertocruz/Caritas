<?php echo $this->Bootstrap->pageHeader('Procedimentos'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Procedimentos',
	'state'=>'info'
)); ?>
<tr>
	<th>&nbsp;</th>
	<th>Nome</th>
</tr>
<?php foreach ($Procedimentos as $Procedimento) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Procedimento['Procedimento']['id']);?></td>
	<td><?php echo $Procedimento['Procedimento']['nome']; ?></td>
</tr>
<?php } ?>
</table>
		</div>
		<div class="panel-footer">
		<?php echo $this->Bootstrap->btnLink( 'Adicionar', array('action'=>'add'), 'success'); ?>
		</div>
</div>
