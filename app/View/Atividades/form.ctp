<?php echo $this->Bootstrap->pageHeader($txtAction.' Atividades'); ?>
<?php
echo $this->Bootstrap->create('Atividade', array('type'=>'post'));

echo $this->Form->input('nome', array('label'=>'Nome'));

echo $this->Bootstrap->save_cancel();

echo $this->Form->end();