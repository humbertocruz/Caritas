<?php
echo $this->Bootstrap->create('Link', array(
	'type'=>'post'
));

echo $this->Form->input('texto', array('label'=>'Texto'));
echo $this->Form->input('parent_id', array('label'=>'Link Pai','options'=>$Links));
echo $this->Form->input('plugin', array('label'=>'Plugin'));
echo $this->Form->input('controller', array('label'=>'Controller'));
echo $this->Form->input('action', array('label'=>'Action'));

echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary'));

echo $this->Form->end();
