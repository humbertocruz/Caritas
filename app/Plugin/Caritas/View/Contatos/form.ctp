<?php echo $this->Html->script('Caritas.chamadas/ajax'); ?>

<?php echo $this->Bootstrap->pageHeader('Contato'); ?>

<!-- Nav tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#contato" data-toggle="tab">Contato</a></li>
	<?php if ($this->action == 'edit') { ?>
	<li><a href="#telefones" data-toggle="tab">Telefones</a></li>
	<li><a href="#emails" data-toggle="tab">Emails</a></li>
	<li><a href="#enderecos" data-toggle="tab">Endereços</a></li>
	<li><a href="#cargos" data-toggle="tab">Cargos</a></li>
	<?php } ?>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="contato">
		<br>
		<div class="panel panel-default">
			<div class="panel-body">
				<?php echo $this->Form->create('Contato',array('type'=>'post')); ?>
				<?php echo $this->Bootstrap->input('nome', array('label'=>'Nome')); ?>
				<?php echo $this->Bootstrap->input('data_nascimento', array('type'=>'date','label'=>'Data Nascimento')); ?>
				<?php echo $this->Bootstrap->input('cpf', array('label'=>'CPF')); ?>
				<?php echo $this->Bootstrap->select('sexo_id', array('options'=>$Sexos,'label'=>'Sexo')); ?>
				<?php echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary')); ?>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>	
	<div class="tab-pane" id="telefones">...</div>
	<div class="tab-pane" id="emails">...</div>
	<div class="tab-pane" id="enderecos">...</div>
	<div class="tab-pane" id="cargos">...</div>
</div>

