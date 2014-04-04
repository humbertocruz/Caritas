<?php echo $this->Html->script('Caritas.chamadas/ajax'); ?>
<?php echo $this->Bootstrap->pageHeader('Chamadas'); ?>
<div class="row">
	<div class="col-md-1">
		<ul class="list-group" data-spy="affix" data-offset-top="108">
			<li class="list-group-item"><?php echo $this->Bootstrap->linkBt( '<span class="glyphicon glyphicon-filter"></span>', array('action'=>'filter'), array('class'=>'btn-info','data-toggle'=>'tooltip', 'data-placement'=>'left','title'=>'Filtrar')); ?></li>
			<li class="list-group-item"><?php echo $this->Bootstrap->linkBt( '<span class="glyphicon glyphicon-plus"></span>', array('action'=>'add'), array('class'=>'btn-success','data-toggle'=>'tooltip', 'data-placement'=>'left','title'=>'Adicionar')); ?></li>
			<li class="list-group-item"><?php echo $this->Bootstrap->linkBt( '<span class="glyphicon glyphicon-edit"></span>', array('action'=>'edit'), array('id'=>'btn-form-edit','class'=>'btn-primary disabled','data-toggle'=>'tooltip', 'data-placement'=>'left','title'=>'Editar')); ?></li>
			<li class="list-group-item">
			<?php echo $this->Bootstrap->linkBt( '<span class="glyphicon glyphicon-trash"></span>', array('action'=>'del'), array('id'=>'btn-form-del','class'=>'btn-danger disabled', 'data-toggle'=>'tooltip', 'data-placement'=>'left','title'=>'Excluir'),'Tem Certeza?'); ?>
			</li>
		</ul>
	</div>
	<div class="col-md-11">

<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<span class="pull-right">
			<?php echo $this->Bootstrap->paginator($this->paginator); ?>
		</span>
		
	</div>

<table class="table">

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
<tr class="info">
	<th class="col-md-1"><input type="checkbox" name="data[Chamada][all]">&nbspTodos</th>
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
	<td class="text-center"><?php echo $this->Bootstrap->input('Chamada.id', array('class'=>'ChamadaId','type'=>'checkbox','label'=>false,'div'=>false,'value'=>$Chamada['Instituicao']['id'])); ?></td>
	<td><?php echo $this->AuthBs->brdate($Chamada['Chamada']['data_inicio']);?></td>
	<td><?php echo ($Chamada['Chamada']['instituicao_id'])?( $Chamada['Instituicao']['nome_fantasia'] ):( $Chamada['Fornecedor']['nome_fantasia'] ); ?></td>
	<td><?php echo (isset($Chamada['Instituicao']['InstituicoesEndereco'][0]['Cidade']['estado_id']))?($Chamada['Instituicao']['InstituicoesEndereco'][0]['Cidade']['estado_id']):($Chamada['Fornecedor']['FornecedoresEndereco'][0]['Cidade']['estado_id']); ?></td>
	<td><?php echo $Chamada['Contato']['nome']; ?></td>
	<td><?php echo $Chamada['Assunto']['nome']; ?></td>
	<td><?php echo $Chamada['Chamada']['solicitacao']; ?></td>
	<td class="text-center"><?php echo count($Chamada['Filhas']);?></td>
</tr>
<?php } ?>
<?php } ?>
</table>
<div class="panel-footer clearfix"></div>
</div>

	</div>
</div>

