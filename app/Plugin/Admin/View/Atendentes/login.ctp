<div class="row">
	<div class="col-md-4">&nbsp;</div>
	<div class="col-md-4">
		
		<div class="alert alert-info">
			<?php
				echo $this->Bootstrap->create('Atendente');
				echo $this->Form->input('email',array('label'=>'Email','required'=>'required'));
				echo $this->Form->input('senha',array('label'=>'Senha','type'=>'password','value'=>'','required'=>'required'));
				?>
				<input type="submit" value="Login" class="btn btn-primary">
				<?php
				echo $this->Form->end(); 
			?>
		</div>
		
	</div>
	<div class="col-md-4">&nbsp;</div>
</div>
