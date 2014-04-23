<?php echo $this->Bootstrap->pageHeader($txtAction.' Projetos'); ?>

<?php
echo $this->Bootstrap->create('Projeto', array('type'=>'post'));

echo $this->Form->input('nome', array('label'=>'Nome'));

echo $this->Bootstrap->save_cancel();

echo $this->Form->end();