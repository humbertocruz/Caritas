<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->assign('pageHeader', 'Usuários'); ?>


<?php $this->start('form-create');?>
	<?php echo $this->Bootstrap->create('Usuario'); ?>
<?php $this->end(); ?>
<?php $this->start('actions');?>
	<?php echo $this->Bootstrap->actions(null, $formActions); ?>
<?php $this->end(); ?>

<?php $this->start('form-body');
	echo $this->Bootstrap->input('email');
	echo $this->Bootstrap->input('grupo_id',array('label'=>'Grupo','options'=>$Grupos));
	echo '<div class="panel panel-default"><div class="panel-heading">Senha</div><div class="panel-body">';
	echo $this->Bootstrap->input('senha1',array('label'=>'Senha'));
	echo $this->Bootstrap->input('senha2',array('label'=>'Confirmação'));
	echo '</div></div>';
$this->end(); ?>
