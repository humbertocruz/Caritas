	</table>
	</div>
	<div class="panel-footer">
  		<?php 
  		// Botao Adicinoar da data-table
  		if (!isset($action)) $action = 'add';
  		if (!isset($id)) $id = null;
  		echo $this->Bootstrap->btnLink('Adicionar', array('action'=>$action, $id), 'success'); ?>
 	</div>
</div>
