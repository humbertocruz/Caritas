<?php
echo $this->Bootstrap->create('Menu', array(
	'type'=>'post'
));

echo $this->Form->input('texto', array('label'=>'Texto'));
echo $this->Form->input('menu_id', array('label'=>'Menu Pai','options'=>$Menus));
echo $this->Form->input('plugin', array('label'=>'Plugin'));
echo $this->Form->input('controller', array('label'=>'Controller'));
echo $this->Form->input('action', array('label'=>'Action'));

echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary'));

echo $this->Form->end();