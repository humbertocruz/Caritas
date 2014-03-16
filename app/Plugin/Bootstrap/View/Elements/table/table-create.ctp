<?php if (isset($this->Paginator)) {
	echo $this->Bootstrap->paginator($this->Paginator);
	} ?>
	<?php if (isset($filter_panel)) { ?>
	<div class="filter-panel hide">
		<?php echo $filter_panel; ?>
	</div>
	<?php } ?>
<div class="panel panel-<?php echo $state; ?>">
 	<div class="panel-heading">
		&nbsp;
  		<h3 class="panel-title pull-left"><?php echo $title; ?></h3>
		<?php if (isset($filter_panel)) { ?>
		<button data-toggle="tooltip" title="Filtros" class="btn-popover btn btn-sm btn-info glyphicon glyphicon-filter pull-right"></button>
		<?php } ?>
 	</div>
 	<div class="panel-body">
		<table class="table table-striped table-hover table-bordered">
			
