<div class="panel panel-success">
	<div class="panel-heading">Telefones</div>
	<div class="panel-body">
		<?php foreach($contato['ContatosFone'] as $fones) { ?>
		<?php echo $fones['fone'].', '; ?>
		<?php } ?>
	</div>
</div>
<div class="panel panel-success">
	<div class="panel-heading">Emails</div>
	<div class="panel-body">
		<?php foreach($contato['ContatosEmail'] as $emails) { ?>
		<?php echo $emails['email'].', '; ?>
		<?php } ?>
	</div>
</div>
<div class="panel panel-success">
	<div class="panel-heading">Cargos</div>
	<div class="panel-body">
		<?php foreach($contato['ContatosInstituicao'] as $instituicao) { ?>
		<?php echo $instituicao['Cargo']['nome'].'- '.$this->AuthBs->brdate($instituicao['data_inicio']).' - '.$instituicao['data_fim'].'<br>'; ?>
		<?php } ?>
	</div>
</div>
		
