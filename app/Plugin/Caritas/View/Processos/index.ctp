<?php echo $this->Bootstrap->pageHeader('Processos'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Processos',
	'state'=>'info'
)); ?>
<tr>
	<th>&nbsp;</th>
	<th>Nome</th>
</tr>
<?php foreach ($Processos as $Processo) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Processo['Processo']['id']);?></td>
	<td><?php echo $Processo['Processo']['nome']; ?></td>
</tr>
<?php } ?>
</table>
		</div>
		<div class="panel-footer">
		<?php echo $this->Bootstrap->btnLink( 'Adicionar', array('action'=>'add'), 'success'); ?>
		</div>
</div>
