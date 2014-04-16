<?php echo $this->Bootstrap->pageHeader($this->fetch('pageHeader')); ?>
<?php echo $this->fetch('form-create'); ?>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				Ações
			</div>
			<ul class="list-group">
				<li class="list-group-item"><?php echo $this->Bootstrap->submit('Gravar',array('class'=>'btn btn-primary btn-block','div'=>false)); ?></li>
				<li class="list-group-item"><?php echo $this->Bootstrap->btnLink('Cancelar', array('action'=>'index'),array('type'=>'btn-block')); ?></li>
			</ul>
		</div>
		<div class="panel panel-danger" id="historico">
			<div class="panel-heading">Histórico</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading"><h3 class="panel-title"><?php echo $this->fetch('pageHeader');?></h3></div>
			<div class="panel-body">
                <?php echo $this->fetch('form-body'); ?>
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>
</div>
<?php echo $this->Bootstrap->end(); ?>

