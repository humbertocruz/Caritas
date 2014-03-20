<?php echo $this->Bootstrap->pageHeader('Atas de Preços'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Atas de Preços',
	'state'=>'info'
)); ?>
<tr>
	<th>&nbsp;</th>
	<th>Nome</th>
	<th>Data</th>
	<th>Edital</th>
</tr>
<?php foreach ($AtasPrecos as $AtasPreco) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($AtasPreco['AtasPreco']['id']);?></td>
	<td><?php echo $AtasPreco['AtasPreco']['nome']; ?></td>
	<td><?php echo $AtasPreco['AtasPreco']['data']; ?></td>
	<td><?php echo $AtasPreco['Edital']['numero']; ?></td>
</tr>
<?php } ?>
</table>
</div>
<div class="panel-footer">
	<?php echo $this->Bootstrap->btnLink('Adicionar',array('action'=>'add'), 'success'); ?>
</div>
</div>
