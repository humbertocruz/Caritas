<?php if (isset($this->Paginator)) {
	echo $this->Bootstrap->paginator($this->Paginator);
	} ?>
<div class="filter-panel hide">
	<?php echo $filter_panel; ?>
</div>
<div class="panel panel-<?php echo $state; ?>">
 	<div class="panel-heading">
		&nbsp;
  		<h3 class="panel-title pull-left"><?php echo $title; ?></h3>
		<button class="btn-popover btn btn-sm btn-info glyphicon glyphicon-cog pull-right" data-container="body" data-toggle="popover" data-html="true" data-container="body" data-placement="left"></button>
 	</div>
 	<div class="panel-body">
		<table class="table table-striped table-hover table-bordered">
			
