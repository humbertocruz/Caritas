<?php echo $this->Bootstrap->pageHeader('Filtros de Chamadas'); ?>

<?php
    echo $this->Bootstrap->create('Filter', array('type'=>'post'));
    
    echo $this->Bootstrap->input('atendente_id', array('label'=>'Atendente', 'options'=>$Filter['Atendente']));
    echo $this->Bootstrap->input('estado_id', array('label'=>'UF','options'=>$Filter['Estado']));
    echo $this->Bootstrap->input('cidade_id', array('label'=>'Cidade'));
    echo $this->Bootstrap->input('assunto_id', array('label'=>'Assunto','options'=>$Filter['Assunto']));
    echo $this->Bootstrap->input('status_id', array('label'=>'Status','options'=>$Filter['Status']));
    
    echo $this->Bootstrap->input('periodo', array('label'=>'Período','class'=>'form-control daterangerpicker'));
    
    echo $this->Bootstrap->submit('Filtrar');
    
    echo $this->Bootstrap->end();
    
?>
