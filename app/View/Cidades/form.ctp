<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->start('pageHeader'); ?>Assuntos<?php $this->end(); ?>

<?php $this->start('actions');
    echo $this->Bootstrap->actions(null, $formActions);
$this->end(); ?>

<?php $this->start('form-create');
echo $this->Bootstrap->create('Cidade', array('type'=>'POST'));
$this->end();
$this->start('form-body');
	echo $this->Bootstrap->input('nome', array('label'=>'Nome'));
	echo $this->Bootstrap->input('codigo_ibge', array('label'=>'IBGE'));
	echo $this->Bootstrap->input('estado_id', array('label'=>'UF','options'=>$Estados));
	echo $this->Bootstrap->input('prefeito', array('label'=>'Prefeito'));
$this->end();
?>

<?php echo $this->Bootstrap->pageHeader($txtAction.' Cidades'); ?>

<?php
echo $this->Bootstrap->create('Cidade', array('type'=>'post'));



echo $this->Bootstrap->save_cancel();

echo $this->Form->end();