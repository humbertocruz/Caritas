<?php
echo $this->Form->create('Cidade', array('type'=>'post'));

echo $this->Bootstrap->input('nome', array('label'=>'Nome'));
echo $this->Bootstrap->input('codigo_ibge', array('label'=>'IBGE'));
echo $this->Bootstrap->select('estado_id', array('label'=>'UF','options'=>$Estados));
echo $this->Bootstrap->input('prefeito', array('label'=>'Prefeito'));

echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary'));

echo $this->Form->end();