<div class="panel-group" id="contato-data">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#contato-data" href="#contato-telefones">Telefones</a>
			</h4>
		</div>
		<div id="contato-telefones" class="panel-collapse collapse in">
			<div class="panel-body">
				<?php foreach($contato['ContatosFone'] as $fones) { ?>
				<span data-desc="<?php echo $fones['fone']; ?> - <?php echo $fones['TiposFone']['nome'];?>" data-id="<?php echo $fones['id'];?>" style="cursor:pointer;" class="glyphicon glyphicon-trash fone"></span>&nbsp;
				<span data-id="<?php echo $fones['id'];?>" style="cursor:pointer;" class="glyphicon glyphicon-pencil fone"></span>&nbsp;
				<?php echo $fones['fone']; ?> - <?php echo $fones['TiposFone']['nome'];?><br>
				<?php } ?>
			</div>
			<div class="panel-footer">
				<span class="btn btn-primary btn-add-fone">Novo Telefone</span>
			</div>
		</div>
	</div>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#contato-data" href="#contato-emails">Emails</a>
			</h4>
		</div>
		<div id="contato-emails" class="panel-collapse collapse">
			<div class="panel-body">
				<?php foreach($contato['ContatosEmail'] as $emails) { ?>
				<span data-desc="<?php echo $emails['email']; ?> - <?php echo $emails['TiposEmail']['nome'];?>" data-id="<?php echo $emails['id'];?>" style="cursor:pointer;" class="glyphicon glyphicon-trash email"></span>&nbsp;
				<span data-id="<?php echo $emails['id'];?>" style="cursor:pointer;" class="glyphicon glyphicon-pencil email"></span>&nbsp;
				<?php echo $emails['email']; ?> - <?php echo $emails['TiposEmail']['nome'];?><br>
				<?php } ?>
			</div>
			<div class="panel-footer">
				<span class="btn btn-primary btn-add-email">Novo Email</span>
			</div>
		</div>
	</div>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#contato-data" href="#contato-cargos">Cargos</a>
			</h4>
		</div>
		<div id="contato-cargos" class="panel-collapse collapse">
			<div class="panel-body">
				<?php if ($inst_forn == 1) { ?>
				<?php foreach($contato['ContatosInstituicao'] as $instituicao) { ?>
				<span data-desc="<?php echo $instituicao['Cargo']['nome'].'- '.$this->AuthBs->brdate($instituicao['data_inicio']).' - '.$instituicao['data_fim']; ?>" data-id="<?php echo $instituicao['id'];?>" style="cursor:pointer;" class="glyphicon glyphicon-trash cargo"></span>&nbsp;
				<span data-id="<?php echo $instituicao['id'];?>" style="cursor:pointer;" class="glyphicon glyphicon-pencil cargo"></span>&nbsp;
				<?php echo $instituicao['Cargo']['nome'].' - '.$this->AuthBs->brdate($instituicao['data_inicio']).' - '.$instituicao['data_fim']; ?><br>
				<?php } ?>
				<?php } ?>
				<?php if ($inst_forn == 2) { ?>
				<?php foreach($contato['ContatosFornecedor'] as $fornecedor) { ?>
				<span data-desc="<?php echo $fornecedor['Cargo']['nome'].'- '.$this->AuthBs->brdate($fornecedor['data_inicio']).' - '.$fornecedor['data_fim']; ?>" data-id="<?php echo $fornecedor['id'];?>" style="cursor:pointer;" class="glyphicon glyphicon-trash cargo"></span>&nbsp;
				<span data-id="<?php echo $fornecedor['id'];?>" style="cursor:pointer;" class="glyphicon glyphicon-pencil cargo"></span>&nbsp;
				<?php echo $fornecedor['Cargo']['nome'].' - '.$this->AuthBs->brdate($fornecedor['data_inicio']).' - '.$fornecedor['data_fim']; ?><br>
				<?php } ?>
				<?php } ?>
			</div>
			<div class="panel-footer">
				<span class="btn btn-primary btn-add-cargo">Novo Cargo</span>
			</div>
		</div>
	</div>
</div>
<?php 
/* Modais 
** Telefone 
*/
?>
<div class="modal" id="edit-fone">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Telefone</h4>
			</div>
			<div class="modal-body">
				<form id="EditaFormFone">
					<input type="hidden" name="data[ContatosFone][id]" id="EditaChamadaContatosFoneId">
					<input type="hidden" name="data[ContatosFone][contato_id]" id="ChamadaContatosFoneContatoId">
					<div class="form-group">
						<label for="ChamadaContatosFoneNome">Número</label>
						<input type="text" class="form-control mask-fone" name="data[ContatosFone][fone]" id="ChamadaContatosFoneNome">
					</div>
					<div class="form-group">
						<label for="ChamadaContatosFoneTiposFoneId">Tipo</label>
						<select class="form-control" id="ChamadaContatosFoneTiposFoneId" name="data[ContatosFone][tipo_fone_id]">
							<?php foreach($TiposFone as $key => $value) { ?>
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
<div class="modal" id="del-fone">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Excluir Telefone</h4>
			</div>
			<div class="modal-body">
				<span id="del-fone-data"></span>
				<br><br>Tem Certeza ?<br>
				<form id="ExcluiFormFone">
					<input type="hidden" name="data[ContatosFone][id]" id="ExcluiChamadaContatosFoneId">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-danger">Excluir</button>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="edit-email">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Email</h4>
			</div>
			<div class="modal-body">
				<form id="EditaFormEmail">
					<input type="hidden" name="data[ContatosEmail][id]" id="EditaChamadaContatosEmailId">
					<input type="hidden" name="data[ContatosEmail][contato_id]" id="ChamadaContatosEmailContatoId">
					<div class="form-group">
						<label for="ChamadaContatosEmailNome">Email</label>
						<input type="text" class="form-control" name="data[ContatosEmail][email]" id="ChamadaContatosEmailEmail">
					</div>
					<div class="form-group">
						<label for="ChamadaContatosEmailTiposEmailId">Tipo</label>
						<select class="form-control" id="ChamadaContatosEmailTiposEmailId" name="data[ContatosEmail][tipo_email_id]">
							<?php foreach($TiposEmail as $key => $value) { ?>
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
<div class="modal" id="del-email">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Excluir Email</h4>
			</div>
			<div class="modal-body">
				<span id="del-email-data"></span>
				<br><br>Tem Certeza ?<br>
				<form id="ExcluiFormEmail">
					<input type="hidden" name="data[ContatosEmail][id]" id="ExcluiChamadaContatosEmailId">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-danger">Excluir</button>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="edit-cargo">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Cargo</h4>
			</div>
			<div class="modal-body">
				<form id="EditaFormCargoInstituiacao">
					<input type="hidden" name="data[ContatosInst_Forn][id]" id="EditaChamadaContatosInstFornId">
					<input type="hidden" name="data[Contato][id]" id="ChamadaContatosInstituicaoContatoId">
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
						<label for="ChamadaContatosInstFornDataFim">Data Fim</label>
						<input type="date" class="form-control mask-date" name="data[ContatosInstForn][data_fim]" id="ChamadaContatosInstFornDataFim">
					</div>
					<div class="form-group">
						<label for="ChamadaContatosInstFornSituacaoContatoId">Situação</label>
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
<div class="modal" id="del-cargo">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Excluir Cargo</h4>
			</div>
			<div class="modal-body">
				<span id="del-cargo-instituicao-data"></span>
				<br><br>Tem Certeza ?<br>
				<form id="ExcluiFormCargoInstForn">
					<input type="hidden" name="data[ContatosInstForn][id]" id="ExcluiChamadaContatosInstFornId">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-danger">Excluir</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		
		// Telefone
		$('.glyphicon-trash.fone').click(function() {
			$('#ExcluiChamadaContatosFoneId').val($(this).data('id'));
			$('#del-fone-data').text($(this).data('desc'));
			$('#del-fone').modal('show');
		});
		$('#del-fone .btn-danger').click(function() {
			$.ajax({
				'url': '/caritas/chamadas/exclui_fone_contato/'+$('#ExcluiChamadaContatosFoneId').val(),
				'success': function(data) {
					$('#del-fone').modal('hide');
					$('#Chamadacontato_id').change();
				}
			});
		});
		$('.glyphicon-pencil.fone, .btn-add-fone').click(function(){
			$('#edit-fone-data').text($(this).data('desc'));
			if ($(this).data('id')) {
				fone_id = $(this).data('id');
				$('#EditaChamadaContatosFoneId').val(fone_id);
				$.ajax({
					'url':'/caritas/chamadas/ler_fone_contato/'+fone_id,
					'dataType':'json',
					'success': function(data) {
						$('#ChamadaContatosFoneNome').val(data.ContatosFone.fone);
						$('#ChamadaContatosFoneTiposFoneId').val(data.ContatosFone.tipo_fone_id);
					}
				});
				
			}
			$('#ChamadaContatosFoneContatoId').val($('#Chamadacontato_id').val());
			$('#edit-fone').modal('show');
		});
		$('#edit-fone .btn-primary').click(function(){
			$.ajax({
				'url': '/caritas/chamadas/edit_fone_contato/'+$('#EditaChamadaContatosFoneId').val(),
				'type': 'post',
				'data': $('#EditaFormFone').serialize(),
				'success': function(data) {
					$('#edit-fone').modal('hide');
					$('#Chamadacontato_id').change();
				}
			});
		});
		
		// Email
		$('.glyphicon-trash.email').click(function() {
			$('#ExcluiChamadaContatosEmailId').val($(this).data('id'));
			$('#del-email-data').text($(this).data('desc'));
			$('#del-email').modal('show');
		});
		$('#del-email .btn-danger').click(function(){
			$.ajax({
				'url': '/caritas/chamadas/exclui_email_contato/'+$('#ExcluiChamadaContatosEmailId').val(),
				'success': function(data) {
					$('#del-email').modal('hide');
					$('#Chamadacontato_id').change();
				}
			});
		});


		$('.glyphicon-pencil.email, .btn-add-email').click(function(){
			$('#edit-email-data').text($(this).data('desc'));
			if ($(this).data('id')) {
				email_id = $(this).data('id');
				$('#EditaChamadaContatosEmailId').val(email_id);
				$.ajax({
					'url':'/caritas/chamadas/ler_email_contato/'+email_id,
					'dataType':'json',
					'success': function(data) {
						$('#ChamadaContatosEmailEmail').val(data.ContatosEmail.email);
						$('#ChamadaContatosEmailTiposEmailId').val(data.ContatosEmail.tipo_email_id);
					}
				});
				
			}
			$('#ChamadaContatosEmailContatoId').val($('#Chamadacontato_id').val());
			$('#edit-email').modal('show');
		});
		$('#edit-email .btn-primary').click(function(){
			$.ajax({
				'url': '/caritas/chamadas/edit_email_contato/'+$('#EditaChamadaContatosEmailId').val(),
				'type': 'post',
				'data': $('#EditaFormEmail').serialize(),
				'success': function(data) {
					$('#edit-email').modal('hide');
					$('#Chamadacontato_id').change();
				}
			});
		});
		
		// Cargo
		$('.glyphicon-trash.cargo').click(function() {
			$('#ExcluiChamadaContatosInstFornId').val($(this).data('id'));
			$('#del-cargo-InstForn-data').text($(this).data('desc'));
			$('#del-cargo-InstForn').modal('show');
		});
		$('#del-cargo-instituicao .btn-danger').click(function(){
			$.ajax({
				'url': '/caritas/chamadas/exclui_cargo_contato/'+$('#ExcluiChamadaContatosInstFornId').val()+'/'+$('#ChamadaInstituiacaoId').val(),
				'success': function(data) {
					$('#del-cargo-InstForn').modal('hide');
					$('#Chamadacontato_id').change();
				}
			});
		});


		$('.glyphicon-pencil.cargo, .btn-add-cargo').click(function(){
			$('#edit-cargo-data').text($(this).data('desc'));
			if ($(this).data('id')) {
				cargo_id = $(this).data('id');
				$('#EditaChamadaContatosInstFornId').val(cargo_id);
				$.ajax({
					'url':'/caritas/chamadas/ler_cargo_contato/'+cargo_id+'/'+$('#Chamadainst_forn').val()+'/'+$('#ChamadaInstituiacaoId').val(),
					'dataType':'json',
					'success': function(data) {
						$('#ChamadaContatosInstFornCargoId').val(data.ContatosInstForn.cargo_id);
						$('#ChamadaContatosInstFornDataInicio').val(data.ContatosInstForn.data_inicio);
						
					}
				});
				
			}
			$('#ChamadaContatosCargoContatoId').val($('#Chamadacontato_id').val());
			$('#edit-cargo').modal('show');
		});
		$('#edit-cargo .btn-primary').click(function(){
			$.ajax({
				'url': '/caritas/chamadas/edit_cargo_contato/'+$('#EditaChamadaContatosCargoId').val(),
				'type': 'post',
				'data': $('#EditaFormCargo').serialize(),
				'success': function(data) {
					$('#edit-cargo').modal('hide');
					$('#Chamadacontato_id').change();
				}
			});
		});

	});
</script>