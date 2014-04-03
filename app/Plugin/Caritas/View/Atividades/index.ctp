<?php echo $this->Bootstrap->pageHeader('Atividades'); ?>

<div class="panel panel-default">
	<div class="panel-heading clearfix">
		Atividades
		<span class="btn btn-xs btn-info pull-right"><span class="glyphicon glyphicon-filter"></span></span>
	</div>
		<table class="table">
<tr>
	<th>&nbsp;</th>
	<th>Nome</th>
</tr>
<?php foreach ($Atividades as $Atividade) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Atividade['Atividade']['id']);?></td>
	<td><?php echo $Atividade['Atividade']['nome']; ?></td>
</tr>
<?php } ?>
</table>
		
		<div class="panel-footer">
		<?php echo $this->Bootstrap->btnLink( 'Adicionar', array('action'=>'add'), 'success'); ?>
		</div>
</div>
