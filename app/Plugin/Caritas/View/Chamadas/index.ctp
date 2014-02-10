<?php
echo $this->Bootstrap->pageHeader('Chamadas');

$filters = array(
	array(
		'type'=>'select',
		'model'=>'Chamada',
		'field'=>'estado_id',
		'options' => $filters['estados']
	)
);
echo $this->Bootstrap->filters($filters);

echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Chamadas',
	'state'=>'info'
	)
); 
?>
<tr class="panel">
	<th class="col-md-1">&nbsp;</th>
	<th class="col-md-1"><?php echo $this->Bootstrap->sorter('Chamada.data_inicio','Início'); ?></th>
	<th class="col-md-2">Instituição/Fornecedor</th>
	<th>UF</th>
	<th class="col-md-2"><?php echo $this->Bootstrap->sorter('Contato.nome','Contato'); ?></th>
	<th class="col-md-2"><?php echo $this->Bootstrap->sorter('Assunto.nome','Assunto'); ?></th>
	<th>Solicitação</th>
</tr>
<?php 
foreach ($Chamadas as $Chamada) { ?>
<tr>
	<td>
		<?php echo $this->Bootstrap->chamadaActions($Chamada['Chamada']['id']); ?>
	</td>
	<td><?php echo $this->AuthBs->brdate($Chamada['Chamada']['data_inicio']);?></td>
	<td><?php echo $Chamada['Instituicao']['nome_fantasia']; ?></td>
	<td><?php echo (isset($Chamada['Instituicao']['InstituicoesEndereco'][0]['Cidade']['estado_id']))?($Chamada['Instituicao']['InstituicoesEndereco'][0]['Cidade']['estado_id']):('Sem Endereço'); ?></td>
	<td><?php echo $Chamada['Contato']['nome']; ?></td>
	<td><?php echo $Chamada['Assunto']['nome']; ?></td>
	<td><?php echo $Chamada['Chamada']['solicitacao']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
