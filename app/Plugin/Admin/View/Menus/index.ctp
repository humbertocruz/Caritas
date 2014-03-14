<?php echo $this->Bootstrap->pageHeader('Menus'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Menus',
	'state'=>'info'
)); ?>
<tr>
	<th>&nbsp;</th>
	<th>Texto</th>
	<th>Plugin</th>
	<th>Controller</th>
	<th>Action</th>
</tr>
<?php foreach ($Menus as $Menu) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Menu['Menu']['id']);?></td>
	<td><?php echo $Menu['Menu']['texto']; ?></td>
	<td><?php echo $Menu['Menu']['plugin']; ?></td>
	<td><?php echo $Menu['Menu']['controller']; ?></td>
	<td><?php echo $Menu['Menu']['action']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
