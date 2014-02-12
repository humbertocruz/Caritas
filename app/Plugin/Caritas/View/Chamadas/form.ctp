<?php echo $this->Html->script('Caritas.chamadas/ajax'); ?>

<?php echo $this->Bootstrap->pageHeader('Chamadas'); ?>

<?php echo $this->Form->create('Chamada',array('method'=>'post')); ?>

<?php echo $this->Bootstrap->input('chamada_id', array('type'=>'hidden','label'=>false)); ?>

<?php echo $this->Bootstrap->select('estado_id', array('options'=>$Estados,'label'=>'UF')); ?>

<?php echo $this->Bootstrap->select('cidade_id', array('options'=>$Cidades,'label'=>'Cidade')); ?>

<?php echo $this->Bootstrap->radios('inst_forn', array('options'=>array('1'=>'Instituição','2'=>'Fornecedor'))); ?>

<?php echo $this->Bootstrap->select('instituicao_id', array('options'=>$Instituicoes,'label'=>'Instituição','disabled'=>'disabled')); ?>

<?php echo $this->Bootstrap->select('fornecedor_id', array('options'=>$Fornecedores,'label'=>'Fornecedor','disabled'=>'disabled')); ?>

<?php echo $this->Bootstrap->select('contato_id', array('options'=>$Contatos,'label'=>'Contato')); ?>

<?php echo $this->Bootstrap->select('pedido_id', array('options'=>$Pedidos,'label'=>'Pedido')); ?>

<?php echo $this->Bootstrap->select('assunto_id', array('options'=>$Assuntos,'label'=>'Assunto')); ?>

<?php echo $this->Bootstrap->input('data_inicio', array('type'=>'text','label'=>'Data Início')); ?>

<?php echo $this->Bootstrap->select('tipo_chamada_id', array('options'=>$TiposChamada,'label'=>'Tipo de Chamada')); ?>

<?php echo $this->Bootstrap->text('solicitacao', array('labl'=>'Solicitação')); ?>

<?php echo $this->Form->submit('Gravar'); ?>

<?php echo $this->Form->end(); ?>
