<?php
echo $this->Form->create('Assunto', array('type'=>'post'));

echo $this->Bootstrap->input('nome', array('label'=>'Nome'));

echo $this->Bootstrap->submit();

echo $this->Form->end();