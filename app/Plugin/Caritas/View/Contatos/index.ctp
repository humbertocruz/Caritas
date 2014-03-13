<?php
echo $this->Bootstrap->pageHeader('Contatos');

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
		<?php echo $this->Bootstrap->contatoActions($Contato['Contato']['id'], array('ContatosEmail'=>$Contato['ContatosEmail'])); ?>
	</td>
	<td><?php echo $Contato['Contato']['nome']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end'); ?>
