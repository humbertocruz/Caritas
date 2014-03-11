<?php echo $this->Bootstrap->pageHeader('Cidades'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Cidade',
	'state'=>'info',
	'fields' => array(
		'Nome'
	)
));

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
		'field'=>'nome'
	)
);
echo $this->Caritas->filters($filters, $filters_cidades);

foreach ($Cidades as $Cidade) { ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->basicActions($Cidade['Cidade']['id']);?></td>
	<td><?php echo $Cidade['Cidade']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
