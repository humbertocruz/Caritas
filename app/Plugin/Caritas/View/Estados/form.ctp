<?php
echo $this->Form->create('Estado', array('type'=>'post'));

echo $this->Bootstrap->input('id', array('label'=>'Sigla'));

echo $this->Bootstrap->input('nome', array('label'=>'Nome'));

echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary'));

echo $this->Form->end();