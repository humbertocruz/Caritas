<?php
App::uses('Helper', 'View');

class CaritasHelper extends AppHelper {

	private function filter_type($field, $field_value) {
		switch ($field['type']) {
			case 'select':
				ob_start(); ?>
				<div class="form-group" title="<?php echo $field['label'];?>">
					<select class="form-control input-sm" name="data[<?php echo $field['model'].'.'.$field['field'].']';?>">
						<?php foreach($field['options'] as $key => $value) { 
							$selected = ($key == $field_value)?('selected="selected"'):('');
						?>
						<option <?php echo $selected;?> value="<?php echo $key; ?>"><?php echo $value;?></option>
						<?php } ?>
					</select>
				</div>
				<?php return ob_get_clean();
				break;
			case 'calendar':
				ob_start(); ?>
					<div class="form-group" title="<?php echo $field['label'];?>">
						<div class="row">
							<div class="col-xs-6"><input type="date" name="data_inicio_ini" class="form-control input-sm"></div>
							<div class="col-xs-6"><input type="date" name="data_inicio_fim" class="form-control input-sm"></div>
						</div>
					</div>
				<?php return ob_get_clean();
			break;
			case 'text':
				ob_start(); ?>
				<input type="text" class="form-control input-sm" name="data[<?php echo $field['model'].'.'.$field['field'].']';?>">
				<?php return ob_get_clean();
				break;
		}
	}
	
	public function filters($fields = array(), $data = array()) {
		ob_start(); ?>
		<div class="panel panel-default">
			<form method="post" role="form">
			<div class="panel-body">
				<input type="hidden" name="filter" value="1">
				<?php foreach($fields as $field) { 
					$data_field = (isset($data[$field['model'].'.'.$field['field']]))?($data[$field['model'].'.'.$field['field']]):('0');
				?>
				<?php echo $this->filter_type($field, $data_field); ?>
				<?php } ?>
				
			</div>
			<div class="panel-footer">
				<input type="submit" class="btn btn-sm btn-success" value="Filtrar">
				<input type="button" class="btn btn-sm pull-right btn-danger" value="Zerar">
			</div>
			</form>
		</div>
		<?php return ob_get_clean();
	}
	
}
