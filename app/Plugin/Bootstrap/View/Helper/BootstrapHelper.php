<?php

App::uses('AppHelper', 'View/Helper');

class BootstrapHelper extends AppHelper {

	public $helpers = array('Html','Paginator','Form','Bootstrap.AuthBs');

	public function pageHeader($header = '') { ob_start(); ?>

		<div class="page-header">
		<h3><?php echo $header;?></h3>
		</div>

	<?php return ob_get_clean(); }

	public function btnLink($text = 'Adicionar', $url = array(), $type = 'default') {
	
		$Permissoes = $this->_View->viewVars['UserPermissoes'];
		$user = $this->_View->viewVars['usuario'];
		
		$controller = (isset($url['controller']))?($url['controller']):($this->params['controller']);
		$action = (isset($url['action']))?($url['action']):(null);
		
		if ( isset( $Permissoes[$controller][$action] ) or $user['NiveisAcesso']['admin'] == 1 ) {
			$link = $url;
			$disabled = '';
		} else {
			$link = '#';
			$disabled = array('disabled'=>'disabled');
		}
		return $this->Html->link($text, $link, array($disabled, 'class'=>'btn btn-'.$type));
	}
	
	public function save_cancel() {
	ob_start(); ?>
		<div class="btn-group">
			<?php
			echo $this->Form->submit('Gravar', array('class'=>'btn btn-primary','div'=>false));
			echo $this->Html->link('Cancelar', array('action'=>'index'), array('class'=>'btn btn-default'));
			?>
		</div>
		<?php return ob_get_clean(); }
	
	public function sorter($field = '', $text = '', $options = array()) {
		if ( $this->Paginator->sortKey() == $field ) {
			if ( $this->Paginator->sortDir() == 'desc') {
				$chevron = '&nbsp;<span class="glyphicon glyphicon-chevron-down">';
			} else {
				$chevron = '&nbsp;<span class="glyphicon glyphicon-chevron-up">';
			}
			$options['escape'] = false;
		} else {
			$chevron = '';
		}
		return $this->Paginator->sort($field, $text.$chevron, $options);
	}

	// Formularios Bootstrap
	
	public function create($name = null, $options = array()) {
		echo $this->Form->create($name, $options + array(
			'inputDefaults' => array(
				'div' => array(
					'class' => 'form-group'
				),
				'class' => 'form-control',
				'error' => array(
					'attributes' => array(
						'class'=>'text-danger',
						'wrap' => 'p',
						'scape' => false
					)
				)
			)
		));
	}
	
	public function input($name=null, $options = array()) {
		echo $this->Form->input($name, $options);
	}

	public function oldinput($name = null, $options = array()) {
		$defaults = array(
			'label' => $name,
			'defaultValue' => '',
			'id' => Inflector::classify( $this->params['controller']).$name,
			'type' => 'text',
			'disabled'=>null,
			'readonly'=>null,
			'model'=> Inflector::classify( $this->params['controller'])
		);
		$options = array_merge(
			$defaults,
			$options
		);
		$options['value'] = (isset($this->request->data[$options['model']][$name]))?($this->request->data[$options['model']][$name]):('');
		// defaultValue se nao tiver valor 
		if ($options['value'] == '') {
			if ($options['defaultValue'] != '') {
				$options['value'] = $options['defaultValue'];
			}
		}
		
		if ($options['disabled'] != null) {
			$disabled = 'disabled="disabled"';
		} else {
			$disabled = '';
		}
		
		if ($options['readonly'] != null) {
			$readonly = 'readonly="readonly"';
		} else {
			$readonly = '';
		}
		
		ob_start(); ?>
		<?php if ($options['type'] != 'hidden') { ?>
		<div class="form-group">
			<lable><?php echo $options['label']; ?></lable>
		<?php } ?>
			<input <?php echo $readonly; ?> <?php echo $disabled; ?> id="<?php echo $options['id'];?>" value="<?php echo $options['value'];?>" type="<?php echo $options['type'];?>" class="form-control" name="data[<?php echo $options['model'];?>][<?php echo $name; ?>]">
		<?php if ($options['type'] != 'hidden') { ?>
		</div>
		<?php } ?>

		<?php return ob_get_clean(); 
	}

	public function select($name, $options = array()) {
		$defaults = array(
			'label' => $name,
			'options' => array(),
			'id' => Inflector::classify( $this->params['controller']).$name,
			'disabled'=>'',
			'hide'=>'',
			'model'=> Inflector::classify( $this->params['controller'])
		);
		$options = array_merge(
			$defaults,
			$options
		);
		$hide = ($options['hide'] === 'hide')?('none'):('block');
		$options['value'] = (isset($this->request->data[$options['model']][$name]))?($this->request->data[$options['model']][$name]):('');
		ob_start(); ?>

		<div class="form-group" style="display:<?php echo $hide;?>">
			<lable><?php echo $options['label']; ?></lable>
			<select <?php echo $options['disabled'];?> id="<?php echo $options['id'];?>" class="form-control" name="data[<?php echo $options['model'];?>][<?php echo $name; ?>]">
			<?php foreach ($options['options'] as $key => $value) { 
				$selected = ($key == $options['value'])?('selected="selected"'):('');
			?>
				<option <?php echo $selected; ?> value="<?php echo $key;?>"><?php echo $value;?></option>
			<?php } ?>
			</select>
		</div>

		<?php return ob_get_clean(); 
	}
	
	public function belongs($name, $options = array()) {
		$defaults = array(
			'label' => $name,
			'options' => array(),
			'id' => Inflector::classify( $this->params['controller']).$name,
			'disabled'=>'',
			'url'=>'',
			'hide'=>'',
			'model'=> Inflector::classify( $this->params['controller'])
		);
		$options = array_merge(
			$defaults,
			$options
		);
		$hide = ($options['hide'] === 'hide')?('none'):('block');
		$options['value'] = (isset($this->request->data[$options['model']][$name]))?($this->request->data[$options['model']][$name]):('');
		ob_start(); ?>
		<div class="form-group" style="display:<?php echo $hide;?>">
			<lable><?php echo $options['label']; ?></lable>
			<div class="row">
				<div class="col-md-11">
					<select <?php echo $options['disabled'];?> id="<?php echo $options['id'];?>" class="form-control" name="data[<?php echo $options['model'];?>][<?php echo $name; ?>]">
						<?php foreach ($options['options'] as $key => $value) { 
							$selected = ($key == $options['value'])?('selected="selected"'):('');
						?>
						<option <?php echo $selected; ?> value="<?php echo $key;?>"><?php echo $value;?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-1">
					<a href="#" class="btn btn-success btn-belongs" data-plugin="<?php echo strtolower( $this->plugin ); ?>" data-url="<?php echo $options['url'];?>"><span class="glyphicon glyphicon-list-alt"></a>
				</div>
			</div>
		</div>

		<?php return ob_get_clean(); 
	}
	
	public function text($name, $options = array()) {
		$defaults = array(
			'label' => $name,
			'id' => Inflector::classify( $this->params['controller']).$name,
			'model'=> Inflector::classify( $this->params['controller'])
		);
		$options = array_merge(
			$defaults,
			$options
		);
		
		$options['value'] = (isset($this->request->data[$options['model']][$name]))?($this->request->data[$options['model']][$name]):('');

		ob_start(); ?>
		
		<div class="form-group">
			<lable><?php echo $options['label']; ?></lable>
			<textarea rows="10" id="<?php echo $options['id'];?>" class="form-control" name="data[<?php echo $options['model'];?>][<?php echo $name; ?>]"><?php echo $options['value'];?></textarea>
		</div>

		
		<?php return ob_get_clean();
	}
	
	public function radios($name, $options = array()) {
		
		$options = array_merge(
			array(
				'options' => array(),
				'id' => Inflector::classify( $this->params['controller']).$name,
				'value' => (isset($this->request->data[Inflector::classify( $this->params['controller'] )][$name]))?($this->request->data[Inflector::classify( $this->params['controller'] )][$name]):($options['value']),
				'model'=> Inflector::classify( $this->params['controller'])
			),
			$options
		);
		
		ob_start(); ?>
		<div class="form-group">
		<div class="radio <?php echo $options['id'];?>">
			<?php foreach($options['options'] as $key=>$value) { 
				$checked = ($key == $options['value'])?('checked="checked"'):('');
			?>
			<label>
				<input <?php echo $checked; ?> id="<?php echo $options['id'];?>" type="radio" name="data[<?php echo $options['model'];?>[<?php echo $name; ?>]" value="<?php echo $key;?>"> <?php echo $value; ?>
			</label>
			<?php } ?>
		</div>
		</div>
		
		<?php return ob_get_clean();
	}

	public function paginator($paginator) {  ob_start(); ?>
		<?php //pr($paginator->pageCount); ?>
		<ul class="pagination">
			<li><a href="#">&laquo;</a></li>
		<?php echo $paginator->numbers(
			array(
				'separator' => null,
				'tag' => 'li',
				'currentClass' => 'active',
				'currentTag' => 'a',
				'escape' => false
			)
		); ?>
			<li><a href="#">&raquo;</a></li>
			<li><a href="#"><?php echo $this->Paginator->counter('{:page} de {:pages}'); ?></a></li>
		</ul>
		<?php //echo $this->Paginator->counter();?>
		<?php return ob_get_clean();
	}
	
	public function chamadaActions($id = 1) { ob_start(); ?>
		<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			Ações&nbsp;<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Html->Link('Editar', array('action'=>'edit', $id));?></li>
				<li><?php echo $this->Form->postLink('Excluir', array('action'=>'del', $id), null, 'Tem Certeza?');?></li>
				<li class="divider"></li>
				<li><?php echo $this->Html->Link('Adicionar Filha', array('action'=>'add', $id));?></li>
				<li><?php echo $this->Html->Link('Finalizar', array('action'=>'finalizar', $id));?></li>
			</ul>
		</div>
	<?php return ob_get_clean();	
	}
	
	public function chamadaAtendenteActions($id = 1) { ob_start(); ?>
		<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			Ações&nbsp;<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Html->Link('Editar', array('controller'=>'chamadas', 'action'=>'edit', $id));?></li>
				<li><?php echo $this->Form->postLink('Excluir', array('controller'=>'chamadas', 'action'=>'del', $id), null, 'Tem Certeza?');?></li>
				<li class="divider"></li>
				<li><?php echo $this->Html->Link('Adicionar Filha', array('controller'=>'chamadas', 'action'=>'add', $id));?></li>
				<li><?php echo $this->Html->Link('Finalizar', array('controller'=>'chamadas', 'action'=>'finalizar', $id));?></li>
			</ul>
		</div>
	<?php return ob_get_clean();	
	}
	
	public function chamadaFilhaActions($id = 1) { ob_start(); ?>
		<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			Ações&nbsp;<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Html->Link('Editar', array('action'=>'edit', $id));?></li>
				<li><?php echo $this->Form->postLink('Excluir', array('action'=>'del', $id), null, 'Tem Certeza?');?></li>
				<li class="divider"></li>
				<li><?php echo $this->Html->Link('Finalizar', array('action'=>'finalizar', $id));?></li>
			</ul>
		</div>
	<?php return ob_get_clean();	
	}
	
	public function contatoActions($id = 1, $del_hasMany) { 
		$okToDel = true;
		foreach($del_hasMany as $hM) {
			if (count($hM) != 0) {
				$okToDel = false;
			}
		}
		ob_start();
		?>
		<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			Ações&nbsp;<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Html->Link('Editar', array('action'=>'edit', $id));?></li>
				<?php if($okToDel) { ?>
				<li><?php echo $this->Form->postLink('Excluir', array('action'=>'del', $id), null, 'Tem Certeza?');?></li>
				<?php } else { ?>
				<li><a href="#"><span class="label label-danger">Não é possível Excluir!</span></a></li>
				<?php } ?>
			</ul>
		</div>
	<?php return ob_get_clean();	
	}
	
	public function atendenteActions($id = 1) { ob_start(); ?>
		<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			Ações&nbsp;<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Html->Link('Editar', array('action'=>'edit', $id));?></li>
				<li><?php echo $this->Form->postLink('Excluir', array('action'=>'del', $id), null, 'Tem Certeza?');?></li>
			</ul>
		</div>
	<?php return ob_get_clean();	
	}
	
	public function basicActions($id = 1, $actionPrefix = '') { ob_start(); ?>
		<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			Ações&nbsp;<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Html->Link('Editar', array('action'=>'edit'.$actionPrefix, $id));?></li>
				<li><?php echo $this->Form->postLink('Excluir', array('action'=>'del'.$actionPrefix, $id), null, 'Tem Certeza?');?></li>
			</ul>
		</div>
	<?php return ob_get_clean();	
	}

	public function menuActions($id = 1, $actionPrefix = '') { ob_start(); ?>
		<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			Ações&nbsp;<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Html->Link('Editar', array('action'=>'editLink'.$actionPrefix, $id));?></li>
				<li><?php echo $this->Form->postLink('Excluir', array('action'=>'delLink'.$actionPrefix, $id), null, 'Tem Certeza?');?></li>
			</ul>
		</div>
	<?php return ob_get_clean();	
	}
	
	public function niveisActions($id = 1, $actionPrefix = '') { ob_start(); ?>
		<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			Ações&nbsp;<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Html->Link('Editar', array('action'=>'editPermissao'.$actionPrefix, $id));?></li>
				<li><?php echo $this->Form->postLink('Excluir', array('action'=>'delPermissao'.$actionPrefix, $id), null, 'Tem Certeza?');?></li>
			</ul>
		</div>
	<?php return ob_get_clean();	
	}



}
