<?php echo $this->Html->script('Caritas.chamadas/ajax'); ?>

<?php echo $this->Bootstrap->pageHeader('Chamadas'); ?>

<div class="row">
	<div class="col-md-8">

<?php echo $this->Form->create('Chamada',array('method'=>'post')); ?>

<?php echo $this->Bootstrap->input('chamada_id', array('type'=>'hidden','label'=>false)); ?>

<?php echo $this->Bootstrap->input('pedido_id', array('type'=>'hidden','label'=>false)); ?>

<?php echo $this->Bootstrap->select('estado_id', array('options'=>$Estados,'label'=>'UF')); ?>

<?php echo $this->Bootstrap->belongs('cidade_id', array('options'=>$Cidades,'label'=>'Cidade','url'=>'/cidades')); ?>

<?php echo $this->Bootstrap->select('inst_forn', array('options'=>array('1'=>'Instituição','2'=>'Fornecedor'),'label'=>'Tipo')); ?>

<?php echo $this->Bootstrap->belongs('instituicao_id', array('options'=>$Instituicoes,'label'=>'Instituição','url'=>'/instituicoes')); ?>

<?php echo $this->Bootstrap->belongs('fornecedor_id', array('options'=>$Fornecedores,'label'=>'Fornecedor','url'=>'/fornecedores')); ?>

<?php echo $this->Bootstrap->belongs('contato_id', array('options'=>$Contatos,'label'=>'Contato','url'=>'/contatos')); ?>

<div id="contato-box" class="alert">
</div>

<?php echo $this->Bootstrap->select('tipo_chamada_id', array('options'=>$TiposChamada,'label'=>'Tipo de Chamada')); ?>

<?php echo $this->Bootstrap->belongs('assunto_id', array('options'=>$Assuntos,'label'=>'Assunto','url'=>'/assuntos')); ?>

<?php echo $this->Bootstrap->input('data_inicio', array('type'=>'text','label'=>'Data Início')); ?>

<?php echo $this->Bootstrap->text('solicitacao', array('labl'=>'Solicitação')); ?>

<?php echo $this->Form->submit('Gravar'); ?>

<?php echo $this->Form->end(); ?>

	</div>
	<div class="col-md-4 alert alert-success" id="historico-div">
		<h3 id="historico-title">Histórico</h3>
		<div id="historico" style="max-height: 700px; overflow: auto;">
		<table class="table table-bordered" style="background-color: #fff;">
			<tr>
				<th>Início</th>
				<th>Assunto</th>
				<th>Contato</th>
			</tr>
			<?php foreach ($historico as $dado) { ?>
			<tr>
				<td><?php echo $this->AuthBs->brdate($dado['Chamada']['data_inicio']); ?></td>
				<td><?php echo $dado['Contato']['nome']; ?></td>
				<td><?php echo $dado['Assunto']['nome']; ?></td>
			</tr>
			<?php } ?>
		</table>
		</div>
	</div>
</div>

