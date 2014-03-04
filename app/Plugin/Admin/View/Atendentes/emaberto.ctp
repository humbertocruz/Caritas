<style>
	.form-group {
		float: left;
		margin-right: 15px;
	}
</style>

<?php
echo $this->Bootstrap->pageHeader('Chamadas');

echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Chamadas',
	'state'=>'info'
	)
); 
if ($escolhido_projeto_id == 0) { ?>
<tr>
	<td colspan="8">Escolha o Projeto no menu superior!</td>
</tr>
<?php } elseif (count($Chamadas) == 0) { ?>
<tr>
	<td colspan="8">Nenhuma Chamada encontrada!</td>
</tr>
<?php } else { ?>
<tr class="panel">
	<th class="col-md-1">&nbsp;</th>
	<th class="col-md-1"><?php echo $this->Bootstrap->sorter('Chamada.data_inicio','Início'); ?></th>
	<th class="col-md-2">Instituição/Fornecedor</th>
	<th class="col-md-1">UF</th>
	<th class="col-md-2"><?php echo $this->Bootstrap->sorter('Contato.nome','Contato'); ?></th>
	<th class="col-md-2"><?php echo $this->Bootstrap->sorter('Assunto.nome','Assunto'); ?></th>
	<th class="col-md-2">Solicitação</th>
	<th class="col-md-1">Filhas</th>
</tr>
<?php 
foreach ($Chamadas as $Chamada) { ?>
<tr>
	<td>
		<?php echo $this->Bootstrap->chamadaAtendenteActions($Chamada['Chamada']['id']); ?>
	</td>
	<td><?php echo $this->AuthBs->brdate($Chamada['Chamada']['data_inicio']);?></td>
	<td><?php echo ($Chamada['Chamada']['instituicao_id'])?( $Chamada['Instituicao']['nome_fantasia'] ):( $Chamada['Fornecedor']['nome_fantasia'] ); ?></td>
	<td><?php echo (isset($Chamada['Instituicao']['InstituicoesEndereco'][0]['Cidade']['estado_id']))?($Chamada['Instituicao']['InstituicoesEndereco'][0]['Cidade']['estado_id']):($Chamada['Fornecedor']['FornecedoresEndereco'][0]['Cidade']['estado_id']); ?></td>
	<td><?php echo $Chamada['Contato']['nome']; ?></td>
	<td><?php echo $Chamada['Assunto']['nome']; ?></td>
	<td><?php echo $Chamada['Chamada']['solicitacao']; ?></td>
	<td><?php echo count($Chamada['Filhas']);?></td>
</tr>
<?php } ?>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
