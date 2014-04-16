<div class="row">
	<div class="col-md-4">&nbsp;</div>
	<div class="col-md-4">
		<?php echo $this->Bootstrap->create('Atendente'); ?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Autenticação</h3>
			</div>
			<div class="panel-body">
			<?php
				
				echo $this->Bootstrap->input('email',array('label'=>'Email'));
				echo $this->Bootstrap->input('senha',array('label'=>'Senha','type'=>'password','value'=>''));
				?>
				
			</div>
			<div class="panel-footer clearfix">
				<?php echo $this->Bootstrap->submit('Entrar', array( 'class' => 'btn btn-primary btn-block') ); ?>
			</div>
		</div>
		<?php echo $this->Bootstrap->end(); ?>
	</div>
	<div class="col-md-4">&nbsp;</div>
</div>
