<?php
echo $this->Form->create('Distribuidor', array('type'=>'post'));

echo $this->Bootstrap->input('nome', array('label'=>'Nome'));

echo $this->Bootstrap->select('fornecedor_id', array('label'=>'Fornecedor','options'=>$Fornecedores));

echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary'));

echo $this->Form->end();