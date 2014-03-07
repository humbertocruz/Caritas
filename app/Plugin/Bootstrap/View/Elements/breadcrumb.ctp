<ol class="breadcrumb">
	<li><a href="/">Home</a></li>
	<?php if ($this->action === 'index') { ?>
	<li class="active"><?php echo $formatedName;?></li>
	<?php } else { ?>
	<li><?php echo $this->Html->link($formatedName, array('action'=>'index'));?></li>
	<li class="active"><?php echo $formatedAction;?></li>
	<?php } ?>
</ol>
