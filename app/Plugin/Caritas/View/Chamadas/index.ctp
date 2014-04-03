<div data-spy="affix" data-offset-top="5" data-offset-bottom="20">
	<div class="container">
		<span class="pull-right">
			<?php echo $this->Bootstrap->btnLink( '<span class="glyphicon glyphicon-plus"></span>', array('action'=>'add'), 'success','Adicionar Chamada'); ?>
			<span data-toggle="tooltip" data-placement="left" title="Filtros" class="btn btn-xs btn-info pull-right"><span class="glyphicon glyphicon-filter"></span></span>
		</span>
	</div>
</div>
<?php
echo $this->Bootstrap->pageHeader('Chamadas');
$filters_panel = $this->Caritas->filters($filters_chamadas, $this->request->data);
?>

<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<span class="pull-right">
			<?php echo $this->Bootstrap->paginator($this->paginator); ?>
		</span>
		
	</div>

<table class="table table-bordered">

<?php if ($escolhido_projeto_id == 0) { ?>
<tr>
	<td colspan="8">
		<p class="text-danger">Escolha o Projeto no menu superior!</p>
	</td>
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
		<?php echo $this->Bootstrap->chamadaActions($Chamada['Chamada']['id']); ?>
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
</table>
<div class="panel-footer clearfix"></div>
</div>
