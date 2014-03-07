<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<?php if(isset($belongsForms) && !empty($belongsForms)) { ?>
		<div class="btn-group dropup pull-right">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			Formulários <span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
			<?php foreach($belongsForms as $key=>$value) { ?>
				<li><a href="<?php echo $belongsForms[$key]['BelongsFormUrl']; ?>"><?php echo $key; ?></a></li>
			<?php } ?>
			</ul>
		</div>
		<?php } ?>
	</div>
</nav>
