<?php echo $this->Bootstrap->pageHeader($txtAction.' Órgãos'); ?>

<?php
echo $this->Bootstrap->create('Orgao', array('type'=>'post'));

echo $this->Form->input('nome', array('label'=>'Nome'));

echo $this->Bootstrap->save_cancel();

echo $this->Form->end();