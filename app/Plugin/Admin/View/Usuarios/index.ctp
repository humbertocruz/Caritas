<?php $this->extend('Bootstrap./Common/index'); ?>

<?php $this->assign('panelStyle','primary'); ?>
<?php $this->assign('pageHeader','Usuários'); ?>


<?php $this->start('actions'); ?>
	<?php echo $this->Bootstrap->actions(null, $listActions); ?>
<?php $this->end(); ?>

<<?php $this->start('table-tr'); ?>
	<tr class="active">
		<th class="col-md-2">&nbsp;</th>
		<th class="col-md-4"><?php echo $this->Paginator->sort('nome','Nome');?></th>
		<th class="col-md-4"><?php echo $this->Paginator->sort('email','Email');?></th>
		<th class="col-md-2">Grupo</th>
	</tr>
<?php $this->end(); ?>

<?php $this->start('table-body'); ?>
	<?php foreach ($data as $Model) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->actions($Model['Usuario']['id'],$indexActions, array('size'=>'sm')); ?></td>
		<td><?php echo $Model['Usuario']['nome']; ?></td>
		<td><?php echo $Model['Usuario']['email']; ?></td>
		<td><?php echo $Model['Grupo']['nome']; ?></td>
	</tr>
	<?php } ?>
<?php $this->end(); ?>
