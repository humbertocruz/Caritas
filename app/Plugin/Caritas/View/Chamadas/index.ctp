<?php echo $this->Bootstrap->pageHeader('Chamadas'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Chamadas',
	'state'=>'info',
	'fields' => array(
		'Início',
		'Instituição/Fornecedor',
		'UF',
		'Contato',
		'Assunto',
		'Solicitação'
	)
)); ?>
<?php 
//pr($Chamadas[10]); 
foreach ($Chamadas as $Chamada) { ?>
<tr>
	<td>
		<?php echo $this->Bootstrap->chamadaActions($Chamada['Chamada']['id']); ?>
	</td>
	<td><?php echo $this->AuthBs->brdate($Chamada['Chamada']['data_inicio']);?></td>
	<td><?php echo $Chamada['Instituicao']['nome_fantasia']; ?></td>
	<td><?php echo $Chamada['Instituicao']['InstituicoesEndereco'][0]['Cidade']['estado_id']; ?></td>
	<td><?php echo $Chamada['Contato']['nome']; ?></td>
	<td><?php echo $Chamada['Assunto']['nome']; ?></td>
	<td><?php echo $Chamada['Chamada']['solicitacao']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>

<?php echo $this->Bootstrap->btnLink('Adicionar', array('action'=>'add'), 'primary'); ?>