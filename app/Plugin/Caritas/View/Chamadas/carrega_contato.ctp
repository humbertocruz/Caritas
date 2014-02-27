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
				<span data-id="<?php echo $fones['id'];?>" style="color:#f63; cursor:pointer;" class="glyphicon glyphicon-trash"></span>&nbsp;
				<span data-id="<?php echo $fones['id'];?>" style="color:#36f; cursor:pointer;" class="glyphicon glyphicon-pencil"></span>&nbsp;
				<?php echo $fones['fone']; ?> - <?php echo $fones['TiposFone']['nome'];?><br>
				<?php } ?>
			</div>
			<div class="panel-footer">
				<a data-toggle="modal" data-target="#edit-fone" href="#" class="btn btn-primary">Novo Telefone</a>
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
				<span class="glyphicon glyphicon-trash"></span>&nbsp;
				<span class="glyphicon glyphicon-pencil"></span>&nbsp;
				<?php echo $emails['email']; ?><br>
				<?php } ?>
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
				<span class="glyphicon glyphicon-trash"></span>&nbsp;
				<span class="glyphicon glyphicon-pencil"></span>&nbsp;
				<?php echo $instituicao['Cargo']['nome'].'- '.$this->AuthBs->brdate($instituicao['data_inicio']).' - '.$instituicao['data_fim']; ?>><br>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="edit-fone">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Telefone</h4>
			</div>
			<div class="modal-body">
				<form id="form-fone">
					<?php echo $this->Bootstrap->input('nome',array('label'=>'Nome')); ?>
					<?php echo $this->Bootstrap->select('tipo_fone_id',array('label'=>'Tipo','options'=>$TiposFone)); ?>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary">Salvar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="del-fone">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Excluir Telefone</h4>
			</div>
			<div class="modal-body">
				Tem Certeza ?<br>
				<span id="del-fone-data"></span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-danger">Excluir</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.glyphicon-trash').click(function(){
			console.log($(this).data('id'));
			$('#del-fone-data').text($(this).data('id'));
			$('#del-fone').modal('show');
		});
	});
</script>