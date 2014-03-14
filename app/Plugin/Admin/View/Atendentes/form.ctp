<?php echo $this->Bootstrap->pageHeader('Atendente'); ?>

<!-- Nav tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#contato" data-toggle="tab">Contato</a></li>
	<?php if ($this->action == 'edit') { ?>
	<li><a href="#telefones" data-toggle="tab">Telefones</a></li>
	<li><a href="#enderecos" data-toggle="tab">Endereços</a></li>
	<li><a href="#projetos" data-toggle="tab">Projetos</a></li>
	<?php } ?>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="contato">
		<br>
		<div class="panel panel-default">
			<div class="panel-body">
				<?php echo $this->Bootstrap->create('Atendente',array('type'=>'post')); ?>
				<?php echo $this->Form->input('nome', array('label'=>'Nome')); ?>
				<?php echo $this->Form->input('email', array('type'=>'email','label'=>'Email')); ?>
				<?php echo $this->Form->input('cpf', array('label'=>'CPF')); ?>
				<?php echo $this->Form->input('sexo_id', array('options'=>$Sexos,'label'=>'Sexo')); ?>
				<?php echo $this->Form->input('nivel_acesso_id', array('options'=>$NiveisAcessos,'label'=>'Nível de Acesso')); ?>
				<?php echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary')); ?>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>	
	<div class="tab-pane" id="telefones">...</div>
	<div class="tab-pane" id="enderecos">...</div>
	<div class="tab-pane" id="projetos">...</div>
</div>

