<?php

App::uses('Helper', 'View');

class CaritasHelper extends AppHelper {

	private function filter_type($filter) {
		switch ($filter['type']) {
			case 'select':
				ob_start(); ?>
				<select class="form-control" name="data[<?php echo $filter['model'].'.'.$filter['field'].']';?>">
				<?php foreach($filter['options'] as $key => $value) { ?>
					<option value="<?php echo $key; ?>"><?php echo $value;?></option>
				<?php } ?>
				</select>
				<?php return ob_get_clean();
				break;
			case 'text':
				ob_start(); ?>
				<input type="text" class="form-control">
				<?php return ob_get_clean();
				break;
		}
	}
	
	public function filters($fields = array()) { ob_start(); ?>
		<div class="panel panel-default">
			<div class="panel-body">
				<form method="post" class="form-inline">
					<input type="hidden" name="filter" value="1">
					<?php foreach($fields as $field) { ?>
					<?php echo $this->filter_type($field); ?>
					<?php } ?>
					<input type="submit" class="btn btn-default" value="Filtrar">
				</form>
			</div>
		</div>
		<?php return ob_get_clean();
	}
	
}
