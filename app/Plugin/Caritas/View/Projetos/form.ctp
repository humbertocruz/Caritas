<?php
echo $this->Form->create('Projeto', array('type'=>'post'));

echo $this->Bootstrap->input('nome', array('label'=>'Nome'));

echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary'));

echo $this->Form->end();