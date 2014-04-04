<?php echo $this->Bootstrap->pageHeader('Filtros de Chamadas'); ?>

<?php
$filters_panel = $this->Caritas->filters($filters_chamadas, $this->request->data);

echo $filters_panel;
?>
