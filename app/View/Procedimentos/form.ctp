<?php echo $this->Bootstrap->pageHeader($txtAction.' Procedimentos'); ?>

<?php
echo $this->Bootstrap->create('Procedimento', array('type'=>'post'));

echo $this->Form->input('nome', array('label'=>'Nome'));
echo $this->Form->input('descricao', array('label'=>'Descrição'));

echo $this->Bootstrap->save_cancel();

echo $this->Form->end();