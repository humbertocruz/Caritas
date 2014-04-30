<?php $this->extend('Bootstrap./Common/index'); ?>

<?php $this->assign('panelStyle','primary'); ?>
<?php $this->assign('pageHeader','Grupos'); ?>


<?php $this->start('actions'); ?>
	<?php echo $this->Bootstrap->actions(null, $listActions); ?>
<?php $this->end(); ?>

<<?php $this->start('table-tr'); ?>
	<tr class="active">
		<th class="col-md-2">&nbsp;</th>
		<th><?php echo $this->Paginator->sort('nome','Nome');?></th>
		<th>Admin</th>
	</tr>
<?php $this->end(); ?>

<?php $this->start('table-body'); ?>
	<?php foreach ($data as $Model) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->actions($Model['Grupo']['id'],$indexActions, array('size'=>'sm')); ?></td>
		<td><?php echo $Model['Grupo']['nome']; ?></td>
		<td><?php echo ($Model['Grupo']['admin'])?('<span class="label label-success">Sim</span>'):('<span class="label label-default">Não</span>'); ?></td>
	</tr>
	<?php } ?>
<?php $this->end(); ?>

