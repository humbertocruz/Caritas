<script type="text/javascript">$(document).ready(function(){
	// Adiciona a class "active" ao menu atual
	$('ul.dropdown-menu li.active').each(function(){
		$(this).parents('.dropdown').addClass('active');
	})
});
</script>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Alterar navigação</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/portal"><?php echo $system['name'];?> Admin</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<?php if (!empty($menus) and $usuario) {
					foreach ($menus as $link) { ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $link['Link']['texto'];?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php foreach ($link['Link']['children'] as $sublink) {
								$active = ($sublink['Link']['controller'] == $this->params['controller'] AND $sublink['Link']['action'] == $this->params['action'])?('class="active"'):('');
							?>
							<li <?php echo $active; ?>>
								<?php echo $this->Html->link($sublink['Link']['texto'], array('plugin'=>$sublink['Link']['plugin'],'controller'=>$sublink['Link']['controller'],'action'=>$sublink['Link']['action'])); ?>
							</li>
						<?php } ?>
						</ul>
					</li>
					<?php } ?>
				<?php } ?>
			</ul>
			<div class="btn-group navbar-right">
				<a href="<?php echo $system['url'];?>" type="button" class="btn btn-default navbar-btn"><?php echo $system['name'];?></a>
				<a href="/logout" type="button" class="btn btn-default navbar-btn">Sair</a>
			</div>
		</div>
	</div>
</nav>
<?php //} ?>