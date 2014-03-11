<?php echo $this->Bootstrap->pageHeader('Cidades');


$filters = array(
	array(
		'label'=>'UF',
		'type'=>'select',
		'model'=>'Cidade',
		'field'=>'estado_id',
		'options' => $filters['estados']
	),
	array(
		'label'=>'Nome',
		'type'=>'text',
		'model'=>'Cidade',
		'field'=>'nome like',
		'search' => '%'
	)
);

$filters_panel = $this->Caritas->filters($filters, $filters_cidades);

echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Cidade',
	'state'=>'info',
	'filter_panel' => $filters_panel
));?>
<?php
if ($escolhido_projeto_id == 0) { ?>
<tr>
	<td colspan="8">Escolha o Projeto no menu superior!</td>
</tr>
<?php } elseif (count($Cidades) == 0) { ?>
<tr>
	<td colspan="8">Nenhuma Cidade encontrada!</td>
</tr>
<?php } else { ?>
<tr class="panel">
	<th class="col-md-1">&nbsp;</th>
	<th class="col-md-9"><?php echo $this->Bootstrap->sorter('Cidade.nome','Nome'); ?></th>
	<th class="col-md-2"><?php echo $this->Bootstrap->sorter('Cidade.estado_id','UF'); ?></th>
</tr>
<?php
foreach ($Cidades as $Cidade) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Cidade['Cidade']['id']);?></td>
	<td><?php echo $Cidade['Cidade']['nome']; ?></td>
	<td><?php echo $Cidade['Estado']['nome']; ?></td>
</tr>
<?php } } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
