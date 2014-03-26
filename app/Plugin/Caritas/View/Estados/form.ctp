<?php echo $this->Bootstrap->pageHeader($txtAction.' Estados'); ?>

<?php
echo $this->Bootstrap->create('Estado', array('type'=>'post'));

echo $this->Form->input('id', array('label'=>'Sigla'));
echo $this->Form->input('nome', array('label'=>'Nome'));

echo $this->Bootstrap->save_cancel();

echo $this->Form->end();