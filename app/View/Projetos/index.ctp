<?php echo $this->Bootstrap->pageHeader('Projetos'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Projetos',
	'state'=>'info'
)); ?>
<tr>
	<th>&nbsp;</th>
	<th>Nome</th>
</tr>
<?php foreach ($Projetos as $Projeto) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Projeto['Projeto']['id']);?></td>
	<td><?php echo $Projeto['Projeto']['nome']; ?></td>
</tr>
<?php } ?>
</table>
		</div>
		<div class="panel-footer">
		<?php echo $this->Bootstrap->btnLink( 'Adicionar', array('action'=>'add'), 'success'); ?>
		</div>
</div>
