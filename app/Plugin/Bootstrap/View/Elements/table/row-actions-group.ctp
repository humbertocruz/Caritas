<?php 
	if (!isset($class)) $class = null; 
	// Permissoes da página atual
	$adicionar = ($this->AuthBs->hasPerm('Adicionar',$perms))?(true):(false);
?>
<div class="btn-group <?php echo $class; ?>">
	<button type="button" class="btn btn-xs btn-<?php echo $state; ?> dropdown-toggle" data-toggle="dropdown">
		<?php echo $label; ?>
	   	<span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<li <?php echo ($adicionar)?(''):('class="disabled"');?>>
			<?php echo ($adicionar)?($this->Html->link('Adicionar Permissão',array('action'=>'add', $id))):('<a>Adicionar Permissão</a>'); ?>
		</li>
	</ul>
</div>
