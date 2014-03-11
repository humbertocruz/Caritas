<?php echo $this->Bootstrap->pageHeader('Editais'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Editais',
	'state'=>'info'
)); ?>
<tr>
	<th>&nbsp;</th>
	<th>Número</th>
	<th>Órgão</th>
</tr>
<?php foreach ($Editais as $Edital) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Edital['Edital']['id']);?></td>
	<td><?php echo $Edital['Edital']['numero']; ?></td>
	<td><?php echo $Edital['Orgao']['nome'];?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
