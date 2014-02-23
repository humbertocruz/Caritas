<?php
echo $this->Bootstrap->pageHeader('Contatos');

$filters = array(
	array(
		'type'=>'select',
		'model'=>'Contato',
		'field'=>'estado_id',
		'options' => $filters['estados']
	),
	array(
		'type'=>'select',
		'model'=>'Chamada',
		'field'=>'assunto_id',
		'options' => $filters['assuntos']
	)
);
echo $this->Caritas->filters($filters, $filters_chamada);

echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Contatos',
	'state'=>'info'
	)
); 
?>
<tr class="panel">
	<th class="col-md-1">&nbsp;</th>
	<th class="col-md-11"><?php echo $this->Bootstrap->sorter('Contato.nome','Nome'); ?></th>
</tr>
<?php 
foreach ($Contatos as $Contato) { ?>
<tr>
	<td>
		<?php echo $this->Bootstrap->contatoActions($Contato['Contato']['id']); ?>
	</td>
	<td><?php echo $Contato['Contato']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
