<?php
echo $this->Form->create('Edital', array('type'=>'post'));

echo $this->Bootstrap->input('numero', array('label'=>'Número'));

echo $this->Bootstrap->input('ano', array('label'=>'Ano'));

echo $this->Bootstrap->select('orgao_id', array('label'=>'Orgao','options'=>$Orgaos));

echo $this->Bootstrap->select('projeto_id', array('label'=>'Projeto','options'=>$Projetos));

echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary'));

echo $this->Form->end();