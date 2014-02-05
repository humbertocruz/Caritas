<?php echo $this->Bootstrap->pageHeader('Chamadas'); ?>

<?php echo $this->Form->create('Chamada'); ?>

<?php echo $this->Bootstrap->select('estado_id', array('options'=>$Estados,'label'=>'UF')); ?>

<?php echo $this->Bootstrap->select('cidade_id', array('options'=>$Cidades,'label'=>'Cidade')); ?>

<?php echo $this->Bootstrap->select('instituicao_id', array('options'=>$Instituicoes,'label'=>'Instituição')); ?>

<?php echo $this->Bootstrap->select('fornecedor_id', array('options'=>$Fornecedores,'label'=>'Fornecedor')); ?>

<?php echo $this->Bootstrap->select('contato_id', array('options'=>$Contatos,'label'=>'Contato')); ?>

<?php echo $this->Bootstrap->select('pedido_id', array('options'=>$Pedidos,'label'=>'Pedido')); ?>

<?php echo $this->Bootstrap->select('assunto_id', array('options'=>$Assuntos,'label'=>'Assunto')); ?>

<?php echo $this->Bootstrap->input('data_inicio', array('value'=>date('Y-m-d'), 
'type'=>'date','label'=>'Data Início')); ?>

<?php echo $this->Bootstrap->select('tipo_chamada_id', array('options'=>$TiposChamada,'label'=>'Tipo de Chamada')); ?>

<?php echo $this->Form->end(); ?>
