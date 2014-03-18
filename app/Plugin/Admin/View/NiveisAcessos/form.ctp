<?php echo $this->Bootstrap->pageHeader('Níveis de Acesso'); ?>

<ul class="nav nav-tabs" id="niveis-tabs">
	<li class="active"><a href="#tab-niveis" data-toggle="tab">Níveis de Acesso</a></li>
	<?php if ($action_name == 'edit') { ?>
		<li><a href="#tab-permissoes" data-toggle="tab">Permissões</a></li>
	<?php } ?>
</ul>
<br>
<div class="tab-content">
	<div class="tab-pane active" id="tab-niveis">
	
<?php
echo $this->Bootstrap->create('NiveisAcesso', array(
	'type'=>'post'
));

echo $this->Form->input('nome', array('label'=>'Nome'));

$options = array(
           '1' => 'Admin ?'
           );
$attributes = array(
            'class' => '',
            'label' => false,
            'type' => 'checkbox',
            'default'=> 1,
            'legend' => false,
            'before' => '<div class="checbox"><label>',
            'after' => '&nbsp;Admin ?</label></div>'
            );

echo $this->Form->input('admin', $attributes);

echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary'));

echo $this->Form->end();
?>

	</div>
	<div class="tab-pane" id="tab-permissoes">
		<?php echo $this->Bootstrap->pageHeader('Permissões'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Permissões',
	'state'=>'info'));
	 ?>
<?php  foreach ($Permissoes as $Permissao) {  ?>
<tr>
	<td class="col-md-2"><?php echo $this->Bootstrap->NiveisActions($Permissao['Permissao']['id']);?></td>
	<td><?php echo $Permissao['Permissao']['controller']; ?></td>
	<td><?php echo $Permissao['Permissao']['action']; ?></td>
</tr>
<?php } ?>
<?php echo $this->Element('Bootstrap.table/table-end', array('id'=>$this->request->data['NiveisAcesso']['id'],'action'=>'addPermissao')); ?>

	</div>
</div>
