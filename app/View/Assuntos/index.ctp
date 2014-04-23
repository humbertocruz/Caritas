<?php echo $this->Bootstrap->pageHeader('Assuntos'); ?>

<div class="panel panel-default">
	<div class="panel-heading clearfix">
		Assuntos
		<span class="btn btn-xs btn-info pull-right"><span class="glyphicon glyphicon-filter"></span></span>
	</div>
		<table class="table">
			<tr>
				<th>&nbsp;</th>
				<th>Nome</th>
			</tr>
			<?php foreach ($Assuntos as $Assunto) { ?>
			<tr>
				<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Assunto['Assunto']['id']);?></td>
				<td><?php echo $Assunto['Assunto']['nome']; ?></td>
			</tr>
			<?php } ?>
		</table>
	<div class="panel-footer">
	<?php echo $this->Bootstrap->btnLink( 'Adicionar', array('action'=>'add'), 'success'); ?>
	</div>
</div>

