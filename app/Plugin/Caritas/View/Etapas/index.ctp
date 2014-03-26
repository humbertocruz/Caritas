<?php echo $this->Bootstrap->pageHeader('Etapas'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Etapas',
	'state'=>'info'
)); ?>
<tr>
	<th>&nbsp;</th>
	<th>Nome</th>
</tr>
<?php foreach ($Etapas as $Etapa) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Etapa['Etapa']['id']);?></td>
	<td><?php echo $Etapa['Etapa']['nome']; ?></td>
</tr>
<?php } ?>
</table>
		</div>
		<div class="panel-footer">
		<?php echo $this->Bootstrap->btnLink( 'Adicionar', array('action'=>'add'), 'success'); ?>
		</div>
</div>
