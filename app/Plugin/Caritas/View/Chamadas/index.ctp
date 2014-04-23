<?php $this->extend('Bootstrap./Common/index'); ?>

<?php echo $this->Html->script('Caritas.chamadas/ajax'); ?>

<?php $this->start('pageHeader'); ?>Chamadas<?php $this->end(); ?>

<?php $this->start('table-tr'); ?>
		<tr class="active">
		<th class="col-md-2">Ações</th>
		<th class="col-md-1"><?php echo $this->Bootstrap->sorter('Chamada.data_inicio','Início'); ?></th>
		<th class="col-md-2">Instituição/Fornecedor</th>
		<th class="col-md-1">UF</th>
		<th class="col-md-3"><?php echo $this->Bootstrap->sorter('Contato.nome','Contato'); ?></th>
		<th class="col-md-2"><?php echo $this->Bootstrap->sorter('Assunto.nome','Assunto'); ?></th>
		<th class="col-md-1">Filhas</th>
		</tr>
<?php $this->end(); ?>
<?php $this->start('table-body'); ?>
<?php if ($escolhido_projeto_id == 0) { ?>
		<p class="text-danger">Escolha o Projeto no menu superior!</p>
<?php } else { ?>
<?php foreach ($data as $Chamada) { ?>
	<tr>
		<td class="text-center">
		<?php echo $this->Bootstrap->basicActions($Chamada['Chamada']['id']); ?>
		</td>
		<td><?php echo $Chamada['Chamada']['data_inicio']; ?></td>
		<td><?php echo ($Chamada['Chamada']['instituicao_id'])?( $Chamada['Instituicao']['nome_fantasia'] ):( $Chamada['Fornecedor']['nome_fantasia'] ); ?></td>
		<td><?php echo (isset($Chamada['Instituicao']['InstituicoesEndereco'][0]['Cidade']['estado_id']))?($Chamada['Instituicao']['InstituicoesEndereco'][0]['Cidade']['estado_id']):($Chamada['Fornecedor']['FornecedoresEndereco'][0]['Cidade']['estado_id']); ?></td>
		<td><?php echo $Chamada['Contato']['nome']; ?></td>
		<td><?php echo $Chamada['Assunto']['nome']; ?></td>
		<td class="text-center"><?php echo count($Chamada['Filhas']);?></td>
	</tr>
<?php } ?>
<?php } ?>
<?php $this->end(); ?>

