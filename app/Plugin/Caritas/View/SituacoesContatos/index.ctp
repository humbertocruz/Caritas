<?php echo $this->Bootstrap->pageHeader('SituacoesContatos'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'SituacoesContatos',
	'state'=>'info'
)); ?>
<tr>
	<th>&nbsp;</th>
	<th>Nome</th>
</tr>
<?php foreach ($SituacoesContatos as $SituacoesContato) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($SituacoesContato['SituacoesContato']['id']);?></td>
	<td><?php echo $SituacoesContato['SituacoesContato']['nome']; ?></td>
</tr>
<?php } ?>
</table>
		</div>
		<div class="panel-footer">
		<?php echo $this->Bootstrap->btnLink( 'Adicionar', array('action'=>'add'), 'success'); ?>
		</div>
</div>
