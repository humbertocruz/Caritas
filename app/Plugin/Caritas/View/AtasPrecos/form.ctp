<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->start('pageHeader'); ?>Atas de Preços<?php $this->end(); ?>

<?php $this->start('form-create');
echo $this->Bootstrap->create('AtasPreco', array('type'=>'POST'));
$this->end();

$this->start('form-body');
	echo $this->Bootstrap->input('nome');
    echo $this->Bootstrap->input('data',array('type'=>'text'));
    echo $this->Bootstrap->input('edital_id',array('options'=>$Editais));
$this->end();
?>
