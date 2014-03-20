<?php echo $this->Html->script('Caritas.chamadas/ajax'); ?>
<?php
if ($this->action == 'add') {
	$action = 'Adicionar';
} else {
	$action = 'Editar';
}
if (isset($this->request->data['Chamada']['chamada_id'])) {
	$filha = ' Filha';
} else {
	$filha = '';
}
echo $this->Bootstrap->pageHeader($action.' Chamada'.$filha); 
?>

<ul class="nav nav-tabs" id="chamadas-tabs">
  <li class="active"><a href="#tab-chamadas" data-toggle="tab">Chamadas</a></li>
  <?php if ($action_name == 'edit') { ?>
  <li><a href="#tab-procedimentos" data-toggle="tab">Procedimentos</a></li>
  <?php if ($this->request->data['Chamada']['chamada_id'] == 0) { ?>
  <li><a href="#tab-filhas" data-toggle="tab">Chamadas Filhas</a></li>
  <?php } ?>
  <?php } ?>
</ul>
<br>
<div class="tab-content">
  <div class="tab-pane active" id="tab-chamadas">
<div class="row">
	<div class="col-md-8">
		<?php echo $this->Bootstrap->create('Chamada',array('type'=>'post')); ?>
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
				<?php echo $this->Form->input('estado_id', array('options'=>$Estados,'label'=>'UF', $disabled)); ?>
				<?php echo $this->Form->input('cidade_id', array('options'=>$Cidades,'label'=>'Cidade', $disabled)); ?>
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
						<?php echo $this->Form->input('instituicao_id', array('options'=>$Instituicoes,'label'=>'Instituição','url'=>'/instituicoes', $disabled)); ?>
					</div>
					<div class="tab-pane <?php echo $forn_active;?>" id="tipo_forn">
						<?php echo $this->Form->input('fornecedor_id', array('options'=>$Fornecedores,'label'=>'Fornecedor','url'=>'/fornecedores', $disabled)); ?>
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
				<div id="contato-box" class="alert">
					
				</div>
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
		<!-- Split button -->
<div class="btn-group dropup">
  <button type="submit" class="btn btn-primary">Gravar</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Ver Lista</span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#" id="btn-gravar-editar">Gravar e Editar</a></li>
    <li><a href="#" id="btn-gravar-finalizar">Gravar e Finalizar</a></li>
  </ul>
</div>
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
</div>
  <div class="tab-pane" id="tab-procedimentos">
	  <?php echo $this->Element('Chamadas/procedimentos'); ?>
  </div>
  <div class="tab-pane" id="tab-filhas">
	  <?php echo $this->Element('Chamadas/filhas'); ?>
  </div>
</div>

<div class="modal" id="modal-novo-contato">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Contato</h4>
			</div>
			<div class="modal-body">
				<form id="NovoFormContato">
					<input type="hidden" name="data[ContatosInstForn][inst_forn]" id="NovoChamadaContatosInstForn">
					<input type="hidden" name="data[ContatosInstForn][inst_forn_id]" id="NovoChamadaContatosInstFornId">
					<div class="form-group">
						<label for="ChamadaContatosNome">Nome</label>
						<input type="text" class="form-control" name="data[Contato][nome]" id="ChamadaContatosNome">
					</div>
					<div class="form-group">
						<label for="ChamadaContatosDataNascimento">Nascimento</label>
						<input type="date" class="form-control mask-date" name="data[Contato][data_nascimento]" id="ChamadaContatosDataNascimento">
					</div>
					<div class="form-group">
						<label for="ChamadaContatosCpf">CPF</label>
						<input type="text" class="form-control" name="data[Contato][cpf]" id="ChamadaContatosCpf">
					</div>
					<div class="form-group">
						<label for="ChamadaContatosSexoId">Sexo</label>
						<select class="form-control" id="ChamadaContatosSexoId" name="data[Contato][sexo_id]">
							<?php foreach($Sexos as $key => $value) { ?>
							<option value="<?php echo $key;?>"><?php echo $value;?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="ChamadaContatosInstFornCargoId">Cargo</label>
						<select class="form-control" id="ChamadaContatosInstFornCargoId" name="data[ContatosInstForn][cargo_id]">
							<?php foreach($Cargos as $key => $value) { ?>
							<option value="<?php echo $key;?>"><?php echo $value;?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="ChamadaContatosInstFornDataInicio">Data Início</label>
						<input type="date" class="form-control mask-date" name="data[ContatosInstForn][data_inicio]" id="ChamadaContatosInstFornDataInicio">
					</div>
					<div class="form-group">
						<label for="ChamadaContatosInstituicaoDataFim">Data Fim</label>
						<input type="date" class="form-control mask-date" name="data[ContatosInstForn][data_fim]" id="ChamadaContatosInstFornDataFim">
					</div>
					<div class="form-group">
						<label for="ChamadaContatosInstituiacaoSituacaoContatoId">Situação</label>
						<select class="form-control" id="ChamadaContatosInstFornSituacaoContatoId" name="data[ContatosInstForn][situacao_contato_id]">
							<?php foreach($SituacoesContato as $key => $value) { ?>
							<option value="<?php echo $key;?>"><?php echo $value;?></option>
							<?php } ?>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary">Salvar</button>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	if ($('#ChamadaContatoId').val()) {
		$('#ChamadaContatoId').change();
	}
	
	// Botoes do formularios chamadas
	$('#btn-gravar-editar').click(function(){
		$('#ChamadaEditar').val(1);
		$('#ChamadaEditForm').submit();
		return false;
	});
	$('#btn-gravar-finalizar').click(function(){
		$('#ChamadaFinalizar').val(1);
		$('#ChamadaEditForm').submit();
		return false;
	});
	
	// Contato
		$('#contato-novo').click(function(){
			$('#NovoFormContato').get(0).reset();
			if ($('#Chamadainst_forn').val() == 1) {
				$('#NovoChamadaContatosInstForn').val(1);
				$('#NovoChamadaContatosInstFornId').val($('#ChamadaInstituicaoId').val());
			} else {
				$('#NovoChamadaContatosInstForn').val(2);
				$('#NovoChamadaContatosInstFornId').val($('#ChamadaFornecedorId').val());
			}
			$('#modal-novo-contato').modal('show');
		});
		
		$('#modal-novo-contato .modal-footer .btn-primary').click(function(){
			$.ajax({
				'url': '/caritas/chamadas/novo_contato/',
				'type': 'post',
				'data': $('#NovoFormContato').serialize(),
				'success': function(data) {
					if ($('#Chamadainst_forn').val() == 1) {
						$('#ChamadaInstituicaoId').change();
					} else {
						$('#ChamadaFornecedorId').change();
					}
					$('#modal-novo-contato').modal('hide');
				}
			});

		});
	
	
});
</script>


