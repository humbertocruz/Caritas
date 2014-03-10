<?php
echo $this->Form->create('Procedimento', array('type'=>'post'));

echo $this->Bootstrap->input('nome', array('label'=>'Nome'));
echo $this->Bootstrap->text('descricao', array('label'=>'Descrição'));

echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary'));

echo $this->Form->end();