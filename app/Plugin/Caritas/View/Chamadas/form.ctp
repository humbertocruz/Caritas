<?php echo $this->Html->script('Caritas.chamadas/ajax'); ?>

<?php echo $this->Bootstrap->pageHeader('Chamadas'); ?>

<div class="row">
	<div class="col-md-8">
		<?php echo $this->Form->create('Chamada',array('type'=>'post')); ?>
		<?php echo $this->Bootstrap->input('chamada_id', array('type'=>'hidden','label'=>false)); ?>
		<?php echo $this->Bootstrap->input('pedido_id', array('type'=>'hidden','label'=>false)); ?>
		<?php echo $this->Bootstrap->input('inst_forn', array('type'=>'hidden','label'=>false,'value'=>1)); ?>
		<div class="panel panel-warning">
			<div class="panel-heading">Instituição / Fornecedor</div>
			<div class="panel-body">
				<?php echo $this->Bootstrap->select('estado_id', array('options'=>$Estados,'label'=>'UF')); ?>
				<?php echo $this->Bootstrap->belongs('cidade_id', array('options'=>$Cidades,'label'=>'Cidade','url'=>'/cidades')); ?>
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
						<?php echo $this->Bootstrap->belongs('instituicao_id', array('options'=>$Instituicoes,'label'=>'Instituição','url'=>'/instituicoes')); ?>
					</div>
					<div class="tab-pane <?php echo $forn_active;?>" id="tipo_forn">
						<?php echo $this->Bootstrap->belongs('fornecedor_id', array('options'=>$Fornecedores,'label'=>'Fornecedor','url'=>'/fornecedores')); ?>
					</div>
				</div>
				
				
			</div>
		</div>
		
		<div class="panel panel-success">
			<div class="panel-heading">Contato</div>
			<div class="panel-body">
				<?php echo $this->Bootstrap->belongs('contato_id', array('options'=>$Contatos,'label'=>'Contato','url'=>'/contatos')); ?>
				<div id="contato-box" class="alert">
					<?php if (isset($this->data['Contato'])) { ?>
					<table>
						<tr>
							<td>
								<?php foreach($this->data['Contato']['ContatosFone'] as $fones) { ?>
									<?php echo $fones['fone'].'<br>'; ?>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php foreach($this->data['Contato']['ContatosEmail'] as $emails) { ?>
									<?php echo $emails['email'].'<br>'; ?>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td>
								Cargos
							</td>
						</tr>
					</table>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="panel panel-primary">
			<div class="panel-heading">Chamada</div>
			<div class="panel-body">
				<?php echo $this->Bootstrap->input('data_inicio', array('type'=>'date','label'=>'Data Início', 'defaultValue'=>date('Y-m-d'), 'readonly'=>'readonly')); ?>
				<?php echo $this->Bootstrap->select('tipo_chamada_id', array('options'=>$TiposChamada,'label'=>'Tipo de Chamada')); ?>
				<?php echo $this->Bootstrap->belongs('assunto_id', array('options'=>$Assuntos,'label'=>'Assunto','url'=>'/assuntos')); ?>
				<?php echo $this->Bootstrap->text('solicitacao', array('label'=>'Solicitação')); ?>
			</div>
		</div>
		
		<?php echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?>
	</div>
	
	<div class="col-md-4">
		<div class="panel panel-danger" id="historico-div">
			<div class="panel-heading">Histórico</div>
				<div class="panel-body" id="historico">
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
	</div>
	<style>
		#historico-div.affix {
			width: 358px;
			margin-top: -100px;
			margin-bottom: 100px;
		}
	</style>
</div>
