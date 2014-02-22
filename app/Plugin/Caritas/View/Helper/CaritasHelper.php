<?php

App::uses('Helper', 'View');

class CaritasHelper extends AppHelper {

	private function filter_type($field, $field_value) {
		switch ($field['type']) {
			case 'select':
				ob_start(); ?>
				<select class="form-control" name="data[<?php echo $field['model'].'.'.$field['field'].']';?>">
				<?php foreach($field['options'] as $key => $value) { 
					$selected = ($key == $field_value)?('selected="selected"'):('');
				?>
					<option <?php echo $selected;?> value="<?php echo $key; ?>"><?php echo $value;?></option>
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
	
	public function filters($fields = array(), $data = array()) { ob_start(); ?>
		<div class="panel panel-default">
			<div class="panel-body">
				<form method="post" class="form-inline">
					<input type="hidden" name="filter" value="1">
					<?php foreach($fields as $field) { 
						$data_field = (isset($data[$field['model'].'.'.$field['field']]))?($data[$field['model'].'.'.$field['field']]):('0');
					?>
					<?php echo $this->filter_type($field, $data_field); ?>
					<?php } ?>
					<input type="submit" class="btn btn-default" value="Filtrar">
				</form>
			</div>
		</div>
		<?php return ob_get_clean();
	}
	
}
