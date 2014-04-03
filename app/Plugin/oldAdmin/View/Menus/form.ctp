<?php echo $this->Bootstrap->pageHeader('Menu'); ?>
<ul class="nav nav-tabs" id="menus-tabs">
	<li class="active"><a href="#tab-menus" data-toggle="tab">Menu</a></li>
	<?php if ($action_name == 'edit') { ?>
		<li><a href="#tab-links" data-toggle="tab">Links</a></li>
	<?php } ?>
</ul>
<br>
<div class="tab-content">
	<div class="tab-pane active" id="tab-menus">
	
<?php
echo $this->Bootstrap->create('Menu', array(
	'type'=>'post'
));

echo $this->Form->input('nome', array('label'=>'Nome'));
echo $this->Form->input('posicao', array('label'=>'Posição'));
echo $this->Form->input('nivel_acesso_id', array('label'=>'Nível de Acesso','options'=>$NiveisAcessos));

echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary'));

echo $this->Form->end();
?>
	</div>
	<div class="tab-pane" id="tab-links">
	<?php echo $this->Bootstrap->pageHeader('Links'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Links',
	'state'=>'info'
)); ?>
<tr>
	<th class="col-md-1">&nbsp;</th>
	<th>Texto</th>
	<th>Plugin</th>
	<th>Controller</th>
	<th>Action</th>
</tr>
<?php foreach ($Links as $Link) { ?>
<tr>
	<td><?php echo $this->Bootstrap->menuActions($Link['Link']['id']);?></td>
	<td><?php echo $Link['Link']['texto']; ?></td>
	<td><?php echo $Link['Link']['plugin']; ?></td>
	<td><?php echo $Link['Link']['controller']; ?></td>
	<td><?php echo $Link['Link']['action']; ?></td>
</tr>
<?php foreach ($Link['children'] as $Child) { ?>
<tr>
	<td><?php echo $this->Bootstrap->menuActions($Child['Link']['id']);?></td>
	<td><span class="glyphicon glyphicon-chevron-right">&nbsp;</span><?php echo $Child['Link']['texto']; ?></td>
	<td><?php echo $Child['Link']['plugin']; ?></td>
	<td><?php echo $Child['Link']['controller']; ?></td>
	<td><?php echo $Child['Link']['action']; ?></td>
</tr>
<?php } ?>
<?php } ?>

<?php echo $this->Element('Bootstrap.table/table-end', array('id'=>$this->request->data['Menu']['id'],'action'=>'addLink')); ?>

	</div>
</div>