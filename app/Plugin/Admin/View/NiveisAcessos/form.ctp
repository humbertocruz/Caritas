<?php
echo $this->Bootstrap->create('NiveisAcesso', array(
	'type'=>'post'
));

echo $this->Form->input('nome', array('label'=>'Nome'));

echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary'));

echo $this->Form->end();