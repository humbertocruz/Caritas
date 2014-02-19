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

<?php echo $this->Bootstrap->select('instituicao_id', array('options'=>$Instituicoes,'label'=>'Instituição')); ?>

<?php echo $this->Bootstrap->select('fornecedor_id', array('options'=>$Fornecedores,'label'=>'Fornecedor')); ?>

<?php echo $this->Bootstrap->select('contato_id', array('options'=>$Contatos,'label'=>'Contato')); ?>

<?php echo $this->Bootstrap->select('tipo_chamada_id', array('options'=>$TiposChamada,'label'=>'Tipo de Chamada')); ?>

<?php echo $this->Bootstrap->belongs('assunto_id', array('options'=>$Assuntos,'label'=>'Assunto','url'=>'/assuntos')); ?>

<?php echo $this->Bootstrap->input('data_inicio', array('type'=>'text','label'=>'Data Início')); ?>

<?php echo $this->Bootstrap->text('solicitacao', array('labl'=>'Solicitação')); ?>

<?php echo $this->Form->submit('Gravar'); ?>

<?php echo $this->Form->end(); ?>

	</div>
	<div class="col-md-4" id="historico">
		<table class="table table-bordered">
			<thead>
				<h3>Histórico de Chamadas</h3>
			</thead>
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

