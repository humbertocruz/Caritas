<?php echo $this->Html->script('Caritas.chamadas/ajax'); ?>
<?php echo $this->Bootstrap->pageHeader('Chamadas'); ?>
<div class="row">
	<div class="col-md-2">
		<ul class="list-group">
			<li class="list-group-item"><?php echo $this->Bootstrap->btnLink( 'Filtros', array('action'=>'filter'), array('style'=>'info','type'=>'btn-block')); ?></li>
			<li class="list-group-item"><?php echo $this->Bootstrap->btnLink( 'Adicionar', array('action'=>'add'), array('style'=>'success','type'=>'btn-block')); ?></li>
		</ul>
	</div>
	<div class="col-md-10">
		<?php if ($escolhido_projeto_id == 0) { ?>
		<p class="text-danger">Escolha o Projeto no menu superior!</p>
		<?php } elseif (count($Chamadas) == 0) { ?>
		Nenhuma Chamada encontrada!
		<?php } else { ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Chamadas</h3>
				<?php echo $this->Bootstrap->paginator($this->paginator); ?>
			</div>
			<table class="table">
				<tr class="active">
					<th class="col-md-2">&nbsp;</th>
					<th class="col-md-1"><?php echo $this->Bootstrap->sorter('Chamada.data_inicio','Início'); ?></th>
					<th class="col-md-2">Instituição/Fornecedor</th>
					<th class="col-md-1">UF</th>
					<th class="col-md-3"><?php echo $this->Bootstrap->sorter('Contato.nome','Contato'); ?></th>
					<th class="col-md-2"><?php echo $this->Bootstrap->sorter('Assunto.nome','Assunto'); ?></th>
					<th class="col-md-1">Filhas</th>
				</tr>
				<?php foreach ($Chamadas as $Chamada) { ?>
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
			</table>
			<div class="panel-footer">
				<?php echo $this->Bootstrap->paginator($this->paginator); ?>
			</div>
		</div>
		<?php } ?>
	</div>
</div>

