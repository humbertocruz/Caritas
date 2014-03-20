<?php echo $this->Bootstrap->pageHeader($txtAction.' Assuntos'); ?>
<?php

echo $this->Bootstrap->create('Assunto', array('type'=>'post'));

echo $this->Form->input('nome', array('label'=>'Nome'));

echo $this->Bootstrap->save_cancel();

echo $this->Form->end();