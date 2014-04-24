<?php
	$this->extend('Bootstrap./Common/index'); // Extend index padrao
	$this->assign('pageHeader','Atas de Preços'); // Header da página
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
		<th><?php echo $this->Paginator->sort('data','Data');?></th>
		<th><?php echo $this->Paginator->sort('Edital.numero','Edital');?></th>
	</tr>
<?php $this->end(); ?>

<?php $this->start('table-body'); ?>
<?php // Corpo da tabela para a listagem ?>
<?php foreach ($data as $AtasPrecos) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->actions($AtasPrecos['AtasPreco']['id'], $indexButtons); ?></td>
		<td><?php echo $AtasPrecos['AtasPreco']['nome']; ?></td>
		<td><?php echo $AtasPrecos['AtasPreco']['data']; ?></td>
		<td><?php echo $AtasPrecos['Edital']['numero']; ?></td>
	</tr>
<?php } ?>
<?php $this->end(); ?>
