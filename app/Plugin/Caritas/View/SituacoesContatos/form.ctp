<?php echo $this->Bootstrap->pageHeader($txtAction.' Situações de Contato'); ?>
<?php
echo $this->Bootstrap->create('SituacoesContato', array('type'=>'post'));

echo $this->Form->input('nome', array('label'=>'Nome'));

echo $this->Bootstrap->save_cancel();

echo $this->Form->end();