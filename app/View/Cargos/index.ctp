<?php
	$this->extend('Bootstrap./Common/index'); // Extend index padrao
	$this->assign('pageHeader','Cargos'); // Header da página
	$this->assign('panelStyle','primary'); // Estilo do painel da página ( 'default' como padrao )
?>

<?php $this->start('actions');
	// Lista de acoes da coluna lateral ( se não houver a coluna nao aparece )
	echo $this->Bootstrap->actions(null, $indexActions);
$this->end(); ?>

<?php $this->start('table-tr'); ?>
	<?php // Cabecalho da tabela para a listagem ?>
	<tr class="active">
		<th class="col-md-2">&nbsp;</th>
		<th><?php echo $this->Paginator->sort('nome','Nome');?></th>
	</tr>
<?php $this->end(); ?>

<?php $this->start('table-body'); ?>
<?php // Corpo da tabela para a listagem ?>
<?php foreach ($data as $Cargo) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->actions($Cargo['Cargo']['id'], $indexButtons); ?></td>
		<td><?php echo $Cargo['Cargo']['nome']; ?></td>
	</tr>
<?php } ?>
<?php $this->end(); ?>
