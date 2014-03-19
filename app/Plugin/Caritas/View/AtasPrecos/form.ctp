<?php
echo $this->Bootstrap->create('Ata de Preço', array('type'=>'post'));

echo $this->Form->input('nome', array('label'=>'Nome'));
echo $this->Form->input('data', array('label'=>'Data','data-mask'=>'99/99/9999','class'=>'form-control maskedinput'));
echo $this->Form->input('edital_id', array('label'=>'Edital','options'=>$Editais));
?>
<div class="btn-group">
<?php
echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary','div'=>false));
echo $this->Html->link('Cancelar', array('action'=>'index'), array('class'=>'btn btn-default'));
?>
</div>
<?php
echo $this->Form->end();