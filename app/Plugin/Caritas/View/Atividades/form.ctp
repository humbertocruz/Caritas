<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->start('pageHeader'); ?>Atividades<?php $this->end(); ?>

<?php $this->start('form-create');
echo $this->Bootstrap->create('Atividade', array('type'=>'POST'));
$this->end();

$this->start('form-body');
	echo $this->Bootstrap->input('nome');
$this->end();
?>

