<?php $this->extend('Bootstrap./Common/index'); ?>
<?php $this->start('pageHeader'); ?>Cargos<?php $this->end(); ?>

<?php $this->start('table-tr'); ?>
	<tr class="active">
		<th class="col-md-2">Ações</th>
		<th class="col-md-10"><?php echo $this->Paginator->sort('Cargo.nome','Nome');?></th>
	</tr>
<?php $this->end(); ?>
<?php $this->start('table-body'); ?>
<?php foreach ($data as $Cargos) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->basicActions($Cargos['Cargo']['id']); ?></td>
		<td><?php echo $Cargos['Cargo']['nome']; ?></td>
	</tr>
<?php } ?>
<?php $this->end(); ?>
