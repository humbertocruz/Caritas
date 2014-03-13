<?php echo $this->Bootstrap->pageHeader('Convênios');


$filters = array(
	array(
		'label'=>'UF',
		'type'=>'select',
		'model'=>'Convenio',
		'field'=>'estado_id',
		'options' => $filters['estados']
	),
	array(
		'label'=>'Cidade',
		'type'=>'select',
		'model'=>'Convenio',
		'field'=>'cidade_id',
		'options' => $filters['cidades']
	),
	array(
		'label'=>'Instituicao',
		'type'=>'select',
		'model'=>'Convenio',
		'field'=>'instituicao_id',
		'options' => $filters['instituicoes']
	)
);

$filters_panel = $this->Caritas->filters($filters, $filters_convenios);

echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Convênio',
	'state'=>'info',
	'filter_panel' => $filters_panel
));?>
<?php
if (count($Convenios) == 0) { ?>
<tr>
	<td colspan="8">Nenhum Convênio encontrad!</td>
</tr>
<?php } else { ?>
<tr class="panel">
	<th class="col-md-1">&nbsp;</th>
	<th class="col-md-9"><?php echo $this->Bootstrap->sorter('Convenio.data_publicacao','Data'); ?></th>
</tr>
<?php
foreach ($Convenios as $Convenio) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Convenio['Convenio']['id']);?></td>
	<td><?php echo $Convenio['Convenio']['data_publicacao']; ?></td>
</tr>
<?php } } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
