<script type="text/javascript">$(document).ready(function(){
	// Adiciona a class "active" ao menu atual
	$('ul.dropdown-menu li.active').each(function(){
		$(this).parents('.dropdown').addClass('active');
	})
});
</script>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Alterar navigação</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/">Sistema Cáritas</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav navbar-left">
			<li><a href="/">Home</a></li>
			<?php if (isset($thisMenu)) { ?>
			<?php foreach ($thisMenu as $link) { ?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $link['Link']['texto'];?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<?php foreach ($link['children'] as $sublink) {
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
		<?php if (AuthComponent::user()) { ; ?>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $usuario['nome'];?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="/logout">Sair</a></li>
					<li><?php echo $this->Html->link('Alterar Dados', array('plugin'=>'caritas', 'controller'=>'status', 'action'=>'perfil')); ?></li>
					<li class="divider"></li>
					<li><?php echo $this->Html->link('Chamadas em Aberto <span class="badge badge-error">'.$emaberto.'</span>', array('controller'=>'status','action'=>'emaberto'), array('escape'=>FALSE));?></li>
					<li><a href="#">Nível: <?php echo $usuario['NiveisAcesso']['nome'];?></a></li>
					<?php if ($usuario['NiveisAcesso']['nome'] == 'Administrador') { ?>
					<li class="divider"></li>
					<li><?php echo $this->Html->link('Administração', array('plugin'=>'admin', 'controller'=>'panel', 'action'=>'index')); ?></li>
					<?php } ?>
				</ul>
			</li>
		</ul>
		<form method="post" class="navbar-form navbar-right" role="search">
		<?php if (count($projetos_atendente) > 1) { ?>
			<select class="form-control" name="data[Escolha][Projeto][id]" id="EscolhaProjetoId">
				<option value="0">Escolha o Projeto</option>
				<?php foreach($projetos_atendente as $projeto) { 
					$escolhido = ($projeto['Projeto']['id'] == $escolhido_projeto_id)?('selected="selected"'):('');
				?>
				<option <?php echo $escolhido;?> value="<?php echo $projeto['Projeto']['id']; ?>"><?php echo $projeto['Projeto']['nome']; ?></option>
				<?php } ?>
			</select>
		<?php } ?>
		</form>
		<?php } ?>
	</div>
</nav>
<?php //} ?>