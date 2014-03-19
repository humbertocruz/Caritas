<?php echo $this->Bootstrap->pageHeader($txtAction.' Cargos'); ?>

<?php
echo $this->Bootstrap->create('Cargo', array('type'=>'post'));

echo $this->Form->input('nome', array('label'=>'Nome'));

echo $this->Bootstrap->save_cancel();

echo $this->Form->end();