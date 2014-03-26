<?php echo $this->Bootstrap->pageHeader($txtAction.' Tipos de Enail'); ?>

<?php
echo $this->Bootstrap->create('TiposEmail', array('type'=>'post'));

echo $this->Form->input('nome', array('label'=>'Nome'));

echo $this->Bootstrap->save_cancel();

echo $this->Form->end();