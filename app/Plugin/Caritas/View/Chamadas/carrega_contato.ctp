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
				<span data-desc="<?php echo $fones['fone']; ?> - <?php echo $fones['TiposFone']['nome'];?>" data-id="<?php echo $fones['id'];?>" style="color:#f63; cursor:pointer;" class="glyphicon glyphicon-trash fone"></span>&nbsp;
				<span data-id="<?php echo $fones['id'];?>" style="color:#36f; cursor:pointer;" class="glyphicon glyphicon-pencil fone"></span>&nbsp;
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
				<span data-desc="<?php echo $emails['email']; ?> - <?php echo $emails['TiposEmail']['nome'];?>" data-id="<?php echo $emails['id'];?>" style="color:#f63; cursor:pointer;" class="glyphicon glyphicon-trash email"></span>&nbsp;
				<span data-id="<?php echo $emails['id'];?>" style="color:#36f; cursor:pointer;" class="glyphicon glyphicon-pencil email"></span>&nbsp;
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
				<?php foreach($contato['ContatosInstituicao'] as $instituicao) { ?>
				<span data-desc="<?php echo $instituicao['Cargo']['nome'].'- '.$this->AuthBs->brdate($instituicao['data_inicio']).' - '.$instituicao['data_fim']; ?>" data-id="<?php echo $emails['id'];?>" style="color:#f63; cursor:pointer;" class="glyphicon glyphicon-trash cargo"></span>&nbsp;
				<span data-id="<?php echo $emails['id'];?>" style="color:#36f; cursor:pointer;" class="glyphicon glyphicon-pencil cargo"></span>&nbsp;
				<?php echo $instituicao['Cargo']['nome'].' - '.$this->AuthBs->brdate($instituicao['data_inicio']).' - '.$instituicao['data_fim']; ?><br>
				<?php } ?>
			</div>
			<div class="panel-footer">
				<span class="btn btn-primary btn-add-email">Novo Cargo</span>
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
						<input type="text" class="form-control" name="data[ContatosFone][fone]" id="ChamadaContatosFoneNome">
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
			$('#EditaChamadaContatosFoneId').val($(this).data('id'));
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
			$('#EditaChamadaContatosEmailId').val($(this).data('id'));
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

	});
</script>