<?php $this->extend('Bootstrap./Common/index'); ?>

<?php $this->start('pageHeader'); ?>Assuntos<?php $this->end(); ?>

<?php $this->start('table-tr'); ?>
	<tr class="active">
		<th class="col-md-2">Ações</th>
		<th class="col-md-12">Nome</th>
	</tr>
<?php $this->end(); ?>
<?php $this->start('table-body'); ?>
<?php foreach ($data as $Assunto) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->basicActions($Assunto['Assunto']['id']); ?></td>
		<td><?php echo $Assunto['Assunto']['nome']; ?></td>
	</tr>
<?php } ?>
<?php $this->end(); ?>

