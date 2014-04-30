<div class="row" style="height: 100px;">
	<div class="col-md-12">&nbsp;</div>
</div>
<div class="row">
	<div class="col-md-3">&nbsp;</div>
	<div class="col-md-6">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Autenticação</h3>
			</div>
			<div class="panel-body" >
				<div><?php echo $this->Html->image('Sites.apaebrasil.jpg',array('class'=>'center-block')); ?></div>
				<?php
				echo $this->Bootstrap->create('Usuario');
				echo $this->Bootstrap->input('email',array('label'=>'E-mail'));
				echo $this->Bootstrap->input('senha',array('label'=>'Senha','type'=>'password','value'=>''));
				echo $this->Bootstrap->submit('Fazer Login',array('class'=>'btn btn-success '));
				echo $this->Bootstrap->end(); 
				?>
			</div>
			<div class="panel-footer clearfix">
				<span class="pull-right"><?php echo $this->Html->link('Esqueceu sua senha ?', array('action'=>'password')); ?></span>
			</div>
		</div>
		
	</div>
	<div class="col-md-3">&nbsp;</div>
</div>
