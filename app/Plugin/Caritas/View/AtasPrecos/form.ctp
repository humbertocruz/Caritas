<?php
echo $this->Form->create('Ata de Preço', array('type'=>'post'));

echo $this->Bootstrap->input('nome', array('label'=>'Nome'));
echo $this->Bootstrap->select('edital_id', array('label'=>'Edital','options'=>$Editais));

echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary'));

echo $this->Form->end();