<?php echo $this->Bootstrap->pageHeader($txtAction.' Processos'); ?>

<?php
echo $this->Bootstrap->create('Processo', array('type'=>'post'));

echo $this->Form->input('nome', array('label'=>'Nome'));

echo $this->Bootstrap->save_cancel();

echo $this->Form->end();