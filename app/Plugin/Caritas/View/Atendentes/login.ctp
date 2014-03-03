<div class="row">
	<div class="col-md-4">&nbsp;</div>
	<div class="col-md-4">
		
		<div class="alert alert-info">
			<?php
				echo $this->Form->create('Atendente');
				echo $this->Bootstrap->input('email',array('label'=>'Email'));
				echo $this->Bootstrap->input('senha',array('label'=>'Senha','type'=>'password','value'=>''));
				?>
				<input type="submit" value="Login" class="btn btn-primary">
				<?php
				echo $this->Form->end(); 
			?>
		</div>
		
	</div>
	<div class="col-md-4">&nbsp;</div>
</div>
