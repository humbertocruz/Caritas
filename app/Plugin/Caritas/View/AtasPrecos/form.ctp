<?php echo $this->Bootstrap->pageHeader($txtAction.' Atas de Preços'); ?>

<?php

echo $this->Bootstrap->create('AtasPreco', array('type'=>'post'));

echo $this->Form->input('nome', array('label'=>'Nome'));
echo $this->Form->input('data', array('type'=>'text','label'=>'Data','class'=>'form-control maskedinput'));
echo $this->Form->input('edital_id', array('label'=>'Edital','options'=>$Editais));
?>
<?php echo $this->Bootstrap->save_cancel(); ?>
<?php
echo $this->Form->end();