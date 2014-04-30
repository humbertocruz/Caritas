<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->assign('pageHeader', 'Grupos'); ?>


<?php $this->start('form-create');?>
	<?php echo $this->Bootstrap->create('Grupo'); ?>
<?php $this->end(); ?>
<?php $this->start('actions');?>
	<?php echo $this->Bootstrap->actions(null, $formActions); ?>
<?php $this->end(); ?>

<?php $this->start('form-body');
	echo $this->Bootstrap->input('nome');
	echo $this->Bootstrap->input('admin', array('type'=>'checkbox','label'=>false,'class'=>false,'div'=>'checkbox','before'=>'<label>','after'=>'&nbsp;Administrador?</label>'));
$this->end(); ?>

