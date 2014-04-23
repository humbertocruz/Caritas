<?php echo $this->Bootstrap->pageHeader('Estados'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Estados',
	'state'=>'info'
)); ?>
<tr>
	<th>&nbsp;</th>
	<th>Nome</th>
</tr>
<?php foreach ($Estados as $Estado) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Estado['Estado']['id']);?></td>
	<td><?php echo $Estado['Estado']['nome']; ?></td>
</tr>
<?php } ?>
</table>
		</div>
		<div class="panel-footer">
		<?php echo $this->Bootstrap->btnLink( 'Adicionar', array('action'=>'add'), 'success'); ?>
		</div>
</div>
