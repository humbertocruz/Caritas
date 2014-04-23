<?php echo $this->Bootstrap->pageHeader($txtAction.' Distribuidores'); ?>

<?php
echo $this->Bootstrap->create('Distribuidor', array('type'=>'post'));

echo $this->Form->input('nome', array('label'=>'Nome'));
echo $this->Form->input('fornecedor_id', array('label'=>'Fornecedor','options'=>$Fornecedores));

echo $this->Bootstrap->save_cancel();

echo $this->Form->end();