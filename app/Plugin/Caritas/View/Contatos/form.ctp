<?php echo $this->Html->script('Caritas.chamadas/ajax'); ?>

<?php echo $this->Bootstrap->pageHeader('Contato'); ?>

<div class="row">
		<?php echo $this->Form->create('Contato',array('type'=>'post')); ?>
		<div class="panel panel-warning">
			<div class="panel-heading">Contato</div>
			<div class="panel-body">
				<?php echo $this->Bootstrap->input('nome', array('label'=>'Nome')); ?>
				<?php echo $this->Bootstrap->input('data_inicio', array('type'=>'date','label'=>'Data Início', 'defaultValue'=>date('Y-m-d'), 'readonly'=>'readonly')); ?>
			</div>
		</div>
</div>
