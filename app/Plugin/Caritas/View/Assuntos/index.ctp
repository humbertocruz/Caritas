<?php echo $this->Bootstrap->pageHeader('Assuntos'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Assuntos',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
)); ?>
<?php foreach ($Assuntos as $Assunto) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Assunto['Assunto']['id']);?></td>
	<td><?php echo $Assunto['Assunto']['nome']; ?></td>
</tr>
<?php } ?>
</table>
		</div>
		<div class="panel-footer">
		<?php echo $this->Bootstrap->btnLink( 'Adicionar', array('action'=>'add'), 'success'); ?>
		</div>
</div>

