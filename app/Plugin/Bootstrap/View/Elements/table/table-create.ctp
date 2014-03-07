<?php if (isset($this->Paginator)) {
	echo $this->Bootstrap->paginator($this->Paginator);
	} ?>
<div class="panel panel-<?php echo $state; ?>">
 	<div class="panel-heading">
  		<h3 class="panel-title"><?php echo $title; ?></h3>
 	</div>
 	<div class="panel-body">
		<table class="table table-striped table-hover table-bordered">
