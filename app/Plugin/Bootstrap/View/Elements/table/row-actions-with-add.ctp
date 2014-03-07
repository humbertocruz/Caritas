<?php
// Permissoes da página atual
	$adicionar_filho = ($this->AuthBs->hasPerm('Adicionar Filho',$perms))?(true):(false);
	$editar = ($this->AuthBs->hasPerm('Editar',$perms))?(true):(false);
	$excluir = ($this->AuthBs->hasPerm('Excluir',$perms))?(true):(false);
?>
<div class="btn-group">
	<button type="button" class="btn btn-xs btn-<?php echo $state; ?> dropdown-toggle" data-toggle="dropdown">
		<?php echo $label; ?>
	   	<span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<li <?php echo ($adicionar_filho)?(''):('class="disabled"'); ?>>
			<?php echo ($adicionar_filho)?($this->Html->link('Adicionar Filho',array('action'=>'add', $id, $menu_id))):('<a>Adicionar Filho</a>'); ?>
		</li>
		<li <?php echo ($editar)?(''):('class="disabled"'); ?>>
			<?php echo $this->Html->link('Editar',array('action'=>'edit', $id, $menu_id)); ?>
		</li>
		<li <?php echo ($excluir)?(''):('class="disabled"'); ?>>
			<?php 
			// Link para Excluir via POST para evitar exclusões acidentais pela URL
			echo ($excluir)?($this->Form->postLink('Excluir',array('action'=>'delete', $id, $menu_id),
				array('escape' => false),
				 __('Excluir ['.$desc.'] - Tem Certeza ?')
			)):('<a>Excluir</a>'); ?>
		</li>
	</ul>
</div>
