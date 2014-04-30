<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->assign('pageHeader', 'Filtrar Usuários'); ?>


<?php $this->start('form-create');?>
	<?php echo $this->Bootstrap->create('Usuario'); ?>
<?php $this->end(); ?>
<?php $this->start('actions');?>
	<?php echo $this->Bootstrap->actions(null, $formActions); ?>
<?php $this->end(); ?>

<?php $this->start('form-body');
	echo $this->Bootstrap->input('nome');
	echo $this->Bootstrap->input('usuario',array('label'=>'Usuário'));
	echo $this->Bootstrap->input('email');
	echo $this->Bootstrap->input('grupo_id',array('label'=>'Grupo','options'=>$Grupos));
	echo $this->Bootstrap->input('site_id',array('label'=>'Site','options'=>$Sites));
$this->end(); ?>
