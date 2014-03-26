<?php echo $this->Bootstrap->pageHeader($txtAction.' Sexos'); ?>

<?php
echo $this->Bootstrap->create('Sexos', array('type'=>'post'));

echo $this->Form->input('nome', array('label'=>'Nome'));

echo $this->Bootstrap->save_cancel();

echo $this->Form->end();