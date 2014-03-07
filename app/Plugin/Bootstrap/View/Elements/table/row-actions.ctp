<?php 
	if (!isset($menu_id)) $menu_id = null; 
	if (!isset($class)) $class = null; 
	// Permissoes da página atual
	$editar = ($this->AuthBs->hasPerm('Editar',$perms))?(true):(false);
	$excluir = ($this->AuthBs->hasPerm('Excluir',$perms))?(true):(false);

?>
<div class="btn-group <?php echo $class; ?>">
	<button type="button" class="btn btn-xs btn-<?php echo $state; ?> dropdown-toggle" data-toggle="dropdown">
		<?php echo $label; ?>
	   	<span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<li <?php echo ($editar)?(''):('class="disabled"');?>>
			<?php echo ($editar)?($this->Html->link('Editar',array('action'=>'edit', $id, $menu_id))):('<a class="disabled">Editar</a>'); ?>
		</li>
		<li <?php echo ($excluir)?(''):('class="disabled"');?>>
			<?php 
			// Link para Excluir via POST para evitar exclusões acidentais pela URL
			echo ($excluir)?($this->Form->postLink('Excluir',array('action'=>'delete', $id, $menu_id),
				array('escape' => false),
				 __('Excluir ['.$desc.'] - Tem Certeza ?')
			)):('<a class="disabled">Excluir</a>'); ?>
		</li>
	</ul>
</div>
