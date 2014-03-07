<?php 
	if (!isset($menu_id)) $menu_id = null; 
	if (!isset($class)) $class = null; 
	// Permissoes da página atual
	$excluir = ($this->AuthBs->hasPerm('Excluir',$perms))?(true):(false);
?>
<div class="btn-group <?php echo $class; ?>">
	<button type="button" class="btn btn-xs btn-<?php echo $state; ?> dropdown-toggle" data-toggle="dropdown">
		<?php echo $label; ?>
	   	<span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<li <?php echo ($excluir)?(''):('class="disabled"');?>>
			<?php 
			// Link para Excluir via POST para evitar exclusões acidentais pela URL
			echo ($excluir)?($this->Form->postLink('Excluir',array('action'=>'delete', $id, $menu_id),
				array('escape' => false),
				 __('Excluir ['.$desc.'] - Tem Certeza ?')
			)):('<a>Excluir</a>'); ?>
		</li>
	</ul>
</div>
