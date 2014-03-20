<?php echo $this->Bootstrap->pageHeader($txtAction.' Cidades'); ?>

<?php
echo $this->Bootstrap->create('Cidade', array('type'=>'post'));

echo $this->Form->input('nome', array('label'=>'Nome'));
echo $this->Form->input('codigo_ibge', array('label'=>'IBGE'));
echo $this->Form->input('estado_id', array('label'=>'UF','options'=>$Estados));
echo $this->Form->input('prefeito', array('label'=>'Prefeito'));

echo $this->Bootstrap->save_cancel();

echo $this->Form->end();