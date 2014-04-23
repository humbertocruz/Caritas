<?php
class CidadesController extends CaritasAppController {

	public $uses = array('Caritas.Cidade');
	public $paginate = array(
		'limit' => 15,
		'order' => array(
			'Cidade.nome' => 'ASC'
		)
	);

	private function filters() {
		// Filtros
		
		// Zera
		//$this->Session->delete('Filtros.Cidades');
		
		// Configura sessao
		if ($this->request->isPost()) {
			if (isset($this->request->data['filter'])) {
				unset($this->request->data['filter']);
				foreach($this->request->data as $key=>$value) {
					if ($value == '0' or $value == '' or $value == null) {
						unset ($this->request->data[$key]);
					}
					if (strstr(' like', $key)) {
						$this->request->data[$key] = '%'+$value+'%';
					}
				}
				//pr($this->request->data);
				$this->Session->write('Filtros.Cidades', $this->request->data );
			}
		}
		// Carrega sessao
		$filtros = $this->Session->read('Filtros.Cidades');
		$this->set('filters_cidades', $filtros);
		
		// Carrega listas para filtro
		$estados = array('0'=>'Todos') + $this->Cidade->Estado->find('list', array('fields'=>array('id','nome')));
		$this->set('filters', array('estados'=>$estados));
		
	}
	
	public function index() {
		// Configura Filtros
		$this->filters();
		
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Cidades - Lista');

		// Carrega dados do BD
		if ($this->Session->check('Filtros.Cidades')) {
			$filtros = $this->Session->read('Filtros.Cidades');
		} else {
			$filtros = array(
				'Cidade.estado_id' => 'XX'
			);
		}
		
		$cidades = $this->Paginate('Cidade',$filtros);
		$this->set('Cidades',$cidades);

	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->Cidade->create();
			if ($this->Cidade->save($data)) {
				$this->Session->setFlash('Cidade salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Cidade');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Cidades - Adicionar');
		
		$Estados = $this->Cidade->Estado->find('list',array('fields'=>array('id','nome')));
		$this->set('Estados',$Estados);

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Cidade']['id'] = $id;
				if ($this->Cidade->save($data)) {
					$this->Session->setFlash('Cidade salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Cidade!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Cidades - Editar');
		
		$Estados = $this->Cidade->Estado->find('list',array('fields'=>array('id','nome')));
		$this->set('Estados',$Estados);
		
		$Cidade = $this->Cidade->read(null, $id);
		$this->request->data = $Cidade;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->Cidade->delete($id)) {
					$this->Session->setFlash('Cidade excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Cidade!');
				}
			}
		}
	}

}