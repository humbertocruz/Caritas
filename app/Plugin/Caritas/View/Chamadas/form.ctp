<?php $this->extend('Caritas./Common/form-chamadas'); ?>

<?php echo $this->Html->script('Caritas.chamadas/ajax', array('inline' => false)); ?>

<?php $this->start('pageHeader'); ?>Chamadas<?php $this->end(); ?>

<?php $this->start('form-create');
echo $this->Bootstrap->create('Chamada', array('type'=>'POST'));
$this->end();

$this->start('form-body'); ?>

<?php echo $this->Form->input('chamada_id', array('type'=>'hidden','label'=>false)); ?>
						<?php echo $this->Form->input('pedido_id', array('type'=>'hidden','label'=>false)); ?>
						<?php echo $this->Form->input('inst_forn', array('type'=>'hidden','label'=>false,'value'=>1)); ?>
						<?php echo $this->Form->input('editar', array('type'=>'hidden','label'=>false)); ?>
						<?php echo $this->Form->input('finalizar', array('type'=>'hidden','label'=>false)); ?>
						<?php if ( isset($this->request->data['Chamada']['chamada_id'])) {
							$disabled = array('disabled'=>'disabled');
						} else {
							$disabled = array();
						}
						?>
						<div class="panel panel-warning">
							<div class="panel-heading">Instituição / Fornecedor</div>
							<div class="panel-body">
								<?php echo $this->Bootstrap->input('estado_id', array('options'=>$Estados,'label'=>'UF', $disabled)); ?>
								<?php echo $this->Bootstrap->input('cidade_id', array('options'=>$Cidades,'label'=>'Cidade', $disabled)); ?>
								<?php
									if (isset($this->request->data['Chamada']['instituicao_id'])) {
										$inst_active = 'active';
										$forn_active = '';
									} elseif (isset($this->request->data['Chamada']['fornecedor_id'])) {
										$forn_active = 'active';
										$inst_active = '';
									} else {
										$inst_active = 'active';
										$forn_active = '';
									}
								?>
								<ul class="nav nav-tabs" id="tipoTab">
									<li class="<?php echo $inst_active;?>"><a href="#tipo_inst" data-toggle="tab">Instituição</a></li>
									<li class="<?php echo $forn_active;?>"><a href="#tipo_forn" data-toggle="tab">Fornecedor</a></li>
								</ul>
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane <?php echo $inst_active;?>" id="tipo_inst">
										<?php echo $this->Bootstrap->input('instituicao_id', array('options'=>$Instituicoes,'label'=>'Instituição','url'=>'/instituicoes', $disabled)); ?>
									</div>
									<div class="tab-pane <?php echo $forn_active;?>" id="tipo_forn">
										<?php echo $this->Bootstrap->input('fornecedor_id', array('options'=>$Fornecedores,'label'=>'Fornecedor',$disabled)); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-success">
							<div class="panel-heading">Contato</div>
							<div class="panel-body">
								<?php echo $this->Form->input('contato_id', array('options'=>$Contatos,'label'=>'Contato')); ?>
								<span class="btn btn-success disabled" id="contato-novo">Adicionar</span>
								<hr>
								<div id="contato-box" class="alert"></div>
							</div>
						</div>
						<div class="panel panel-primary">
							<div class="panel-heading">Chamada</div>
							<div class="panel-body">
								<?php echo $this->Form->input('data_inicio', array('type'=>'text','label'=>'Data Início', 'readonly'=>'readonly')); ?>
								<?php echo $this->Form->input('tipo_chamada_id', array('options'=>$TiposChamada,'label'=>'Tipo de Chamada')); ?>
								<?php echo $this->Form->input('assunto_id', array('options'=>$Assuntos,'label'=>'Assunto','url'=>'/assuntos')); ?>
								<?php echo $this->Form->input('status_id', array('options'=>$Status,'label'=>'Status','url'=>'/status')); ?>
								<?php echo $this->Form->input('prioridade_id', array('options'=>$Prioridades,'label'=>'Prioridade','url'=>'/prioridades')); ?>
								<?php echo $this->Form->input('solicitacao', array('label'=>'Solicitação')); ?>
							</div>
						</div>

<?php $this->end(); ?>

