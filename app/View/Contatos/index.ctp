<?php $this->extend('Bootstrap./Common/index'); ?>

<?php $this->start('pageHeader'); ?>Contatos<?php $this->end(); ?>

<?php $this->start('table-tr'); ?>
	<tr class="active">
		<th class="col-md-2">Ações</th>
		<th class="col-md-5"><?php echo $this->Paginator->sort('nome'); ?></th>
		<th class="col-md-3"><?php echo $this->Paginator->sort('cpf','CPF'); ?></th>
		<th class="col-md-2"><?php echo $this->Paginator->sort('Sexo.nome','Sexo'); ?></th>
	</tr>
<?php $this->end(); ?>
<?php $this->start('table-body'); ?>
<?php foreach ($data as $Contato) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->basicActions($Contato['Contato']['id']); ?></td>
		<td><?php echo $Contato['Contato']['nome']; ?></td>
		<td><?php echo $Contato['Contato']['cpf']; ?></td>
		<td><?php echo $Contato['Sexo']['nome']; ?></td>
	</tr>
<?php } ?>
<?php $this->end(); ?>
