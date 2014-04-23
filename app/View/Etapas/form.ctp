<?php echo $this->Bootstrap->pageHeader($txtAction.' Etapas'); ?>

<?php
echo $this->Bootstrap->create('Etapa', array('type'=>'post'));

echo $this->Form->input('nome', array('label'=>'Nome'));

echo $this->Bootstrap->save_cancel();

echo $this->Form->end();