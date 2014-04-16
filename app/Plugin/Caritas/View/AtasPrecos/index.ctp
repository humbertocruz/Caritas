<?php $this->extend('Bootstrap./Common/index'); ?>

<?php $this->start('pageHeader'); ?>Atas de Preços<?php $this->end(); ?>

<?php $this->start('table-tr'); ?>
	<tr class="active">
		<th class="col-md-2">Ações</th>
		<th class="col-md-4">Nome</th>
		<th class="col-md-4">Data</th>
		<th class="col-md-2">Número</th>
	</tr>
<?php $this->end(); ?>
<?php $this->start('table-body'); ?>
<?php foreach ($data as $AtasPreco) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->basicActions($AtasPreco['AtasPreco']['id']); ?></td>
		<td><?php echo $AtasPreco['AtasPreco']['nome']; ?></td>
		<td><?php echo $AtasPreco['AtasPreco']['data']; ?></td>
		<td><?php echo $AtasPreco['Edital']['numero']; ?></td>
	</tr>
<?php } ?>
<?php $this->end(); ?>

