<div class="row" style="height: 150px;">
	<div class="col-md-12">&nbsp;</div>
</div>
<div class="row">
	<div class="col-md-4">&nbsp;</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Autenticação</h3>
			</div>
			<div class="panel-body">
				<?php if ($confirmado) { ?>
				<p>
					Digite sua nova senha.
				</p>
				<?php
				echo $this->Bootstrap->create('Usuario'); // Formulario especial Bootstrap
				
				echo $this->Bootstrap->input('senha1',array('label'=>'Senha','type'=>'password'));
				
				echo $this->Bootstrap->input('senha2',array('label'=>'Confirme','type'=>'password'));
				
				echo $this->Bootstrap->submit('Gravar Senha');
				
				echo $this->Bootstrap->end();  ?>
				<?php } else { ?>
				<p>
					Digite seu email para receber um link de confirmação para criar uma nova senha.
				</p>
				<?php
				echo $this->Bootstrap->create('Usuario'); // Formulario especial Bootstrap
				
				echo $this->Bootstrap->input('email',array('label'=>'E-mail'));
				
				echo $this->Bootstrap->submit('Recuperar Senha');
				
				echo $this->Bootstrap->end(); 
				?>
				
				<?php } ?>
			</div>
			<div class="panel-footer clearfix">
				<span class="pull-right"><?php echo $this->Html->link('Voltar ao Login', array('action'=>'login')); ?></span>
			</div>
		</div>
		
	</div>
	<div class="col-md-4">&nbsp;</div>
</div>
