<?php echo $this->Bootstrap->pageHeader('Atas de Preços'); ?>

<div class="panel panel-default">
	<div class="panel-heading clearfix">
		Atas de Preços
		<span class="btn btn-xs btn-info pull-right"><span class="glyphicon glyphicon-filter"></span></span>
	</div>
		<table class="table">

<tr>
	<th>&nbsp;</th>
	<th><?php echo $this->Paginator->sort('nome');?></th>
	<th><?php echo $this->Paginator->sort('data');?></th>
	<th><?php echo $this->Paginator->sort('numero');?></th>
</tr>
<?php foreach ($AtasPrecos as $AtasPreco) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($AtasPreco['AtasPreco']['id']);?></td>
	<td><?php echo $AtasPreco['AtasPreco']['nome']; ?></td>
	<td><?php echo $AtasPreco['AtasPreco']['data']; ?></td>
	<td><?php echo $AtasPreco['Edital']['numero']; ?></td>
</tr>
<?php } ?>
</table>
<div class="panel-footer">
	<?php echo $this->Bootstrap->btnLink('Adicionar',array('action'=>'add'), 'success'); ?>
</div>
</div>
