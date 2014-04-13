<?php echo $this->Html->script('Caritas.chamadas/ajax'); ?>
<?php echo $this->Bootstrap->pageHeader('Chamadas'); ?>
<div class="row">
	<div class="col-md-1">
		<ul class="list-group" data-spy="affix" data-offset-top="108">
			<li class="list-group-item"><?php echo $this->Bootstrap->linkBt( '<span class="glyphicon glyphicon-filter"></span>', array('action'=>'filter'), array('class'=>'btn-info','data-toggle'=>'tooltip', 'data-placement'=>'left','title'=>'Filtrar')); ?></li>
			<li class="list-group-item"><?php echo $this->Bootstrap->linkBt( '<span class="glyphicon glyphicon-plus"></span>', array('action'=>'add'), array('class'=>'btn-success','data-toggle'=>'tooltip', 'data-placement'=>'left','title'=>'Adicionar')); ?></li>
		</ul>
	</div>
	<div class="col-md-11">
		<?php if ($escolhido_projeto_id == 0) { ?>
		<p class="text-danger">Escolha o Projeto no menu superior!</p>
		<?php } elseif (count($Chamadas) == 0) { ?>
		Nenhuma Chamada encontrada!
		<?php } else { ?>

<?php echo $this->Bootstrap->paginator($this->paginator); ?>
<div class="panel panel-default">
<table class="table">
<tr class="active">
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
	<td class="text-center">
		<div class="btn-group">
	<?php
		echo $this->Bootstrap->link('<span class="glyphicon glyphicon-pencil"></span>',array('action'=>'edit', $Chamada['Chamada']['id']), array('style'=>'primary'));
		echo $this->Bootstrap->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action'=>'del', $Chamada['Chamada']['id']), array('style'=>'danger'), 'Tem Certeza?');
	?>
		</div>
	</td>
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
</div>

	</div>
</div>

