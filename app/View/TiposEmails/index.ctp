<?php echo $this->Bootstrap->pageHeader('TiposEmails'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'TiposEmails',
	'state'=>'info'
)); ?>
<tr>
	<th>&nbsp;</th>
	<th>Nome</th>
</tr>
<?php foreach ($TiposEmails as $TiposEmail) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($TiposEmail['TiposEmail']['id']);?></td>
	<td><?php echo $TiposEmail['TiposEmail']['nome']; ?></td>
</tr>
<?php } ?>
</table>
		</div>
		<div class="panel-footer">
		<?php echo $this->Bootstrap->btnLink( 'Adicionar', array('action'=>'add'), 'success'); ?>
		</div>
</div>
