<?php echo $this->Bootstrap->pageHeader($txtAction.' Prioridades'); ?>

<?php
echo $this->Bootstrap->create('Prioridade', array('type'=>'post'));

echo $this->Form->input('nome', array('label'=>'Nome'));

echo $this->Bootstrap->save_cancel();

echo $this->Form->end();