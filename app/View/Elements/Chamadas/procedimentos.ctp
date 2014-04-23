<div class="panel panel-info">
	<div class="panel-heading">Procedimentos</div>
	<div class="panel-body">
<table class="table">
	<tr>
		<th>&nbsp;</th>
		<th>Data</th>
		<th>Procedimento</th>
		<th>Descricao</th>
	</tr>
	<?php foreach($procedimentos as $procedimento) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->basicActions($procedimento['ChamadasProcedimento']['id'],'Procedimento'); ?></td>
		<td><?php echo $this->AuthBs->brDate($procedimento['ChamadasProcedimento']['data']); ?></td>
		<td><?php echo $procedimento['Procedimento']['nome']; ?></td>
		<td><?php echo $procedimento['ChamadasProcedimento']['procedimento'];?></td>
	</tr>
	<?php } ?>
	<?php echo $this->Element('Bootstrap.table/table-end',array('action'=>'addProcedimento','id'=>$this->data['Chamada']['id'])); ?>