<?php echo $this->Bootstrap->pageHeader('Permissão'); ?>
	
<?php
echo $this->Bootstrap->create('Permissao', array(
	'type'=>'post'
));

echo $this->Form->input('controller', array('label'=>'Controller'));
echo $this->Form->input('action', array('label'=>'Action'));

echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary'));

echo $this->Form->end();
?>
