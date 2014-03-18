<?php echo $this->Bootstrap->pageHeader('Menus'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Menus',
	'state'=>'info'
)); ?>
<tr>
	<th class="col-md-1">&nbsp;</th>
	<th>Nome</th>
	<th>Posição</th>
	<th>Nível de Acesso</th>
</tr>
<?php foreach ($Menus as $Menu) { ?>
<tr>
	<td><?php echo $this->Bootstrap->basicActions($Menu['Menu']['id']);?></td>
	<td><?php echo $Menu['Menu']['nome']; ?></td>
	<td><?php echo $Menu['Menu']['posicao']; ?></td>
	<td><?php echo $Menu['NiveisAcesso']['nome']; ?></td>
</tr>
<?php } ?>
			</table>
		</div>
		<div class="panel-footer">
		<?php echo $this->Bootstrap->btnLink( 'Adicionar', array('action'=>'add'), 'success'); ?>
		</div>
</div>
