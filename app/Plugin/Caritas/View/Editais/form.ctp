<?php echo $this->Bootstrap->pageHeader($txtAction.' Editais'); ?>

<?php
echo $this->Bootstrap->create('Edital', array('type'=>'post'));

echo $this->Form->input('numero', array('label'=>'Número'));
echo $this->Form->input('ano', array('label'=>'Ano'));
echo $this->Form->input('orgao_id', array('label'=>'Orgao','options'=>$Orgaos));
echo $this->Form->input('projeto_id', array('label'=>'Projeto','options'=>$Projetos));

echo $this->Bootstrap->save_cancel();

echo $this->Form->end();