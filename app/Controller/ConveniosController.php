<?php
class ConveniosController extends CaritasAppController {

	public $uses = array('Caritas.Convenio');
	public $paginate = array(
		'limit' => 15,
		'order' => array(
			'Convenio.data_publicacao' => 'ASC'
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
				$this->Session->write('Filtros.Convenios', $this->request->data );
			}
		}
		// Carrega sessao
		$filtros = $this->Session->read('Filtros.Convenios');
		$this->set('filters_convenios', $filtros);
		
		// Carrega listas para filtro
		$estados = array('0'=>'Todos') + $this->Convenio->Instituicao->InstituicoesEndereco->Cidade->Estado->find('list', array('fields'=>array('id','nome')));
		$cidades = array();
		$instituicoes = array();
		$this->set('filters', array('estados'=>$estados,'cidades'=>$cidades,'instituicoes'=>$instituicoes));
	}
	
	public function index() {
		// Configura Filtros
		$this->filters();
		
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Convênios - Lista');

		// Carrega dados do BD
		if ($this->Session->check('Filtros.Convenios')) {
			$filtros = $this->Session->read('Filtros.Convenios');
		} else {
			$filtros = array();
		}
		
		$Convenios = $this->Paginate('Convenio',$filtros);
		$this->set('Convenios',$Convenios);
	}

	public function add() {
		if($this->request->isPost()) {
			$data = $this->request->data;
			$this->Convenio->create();
			if ($this->Convenio->save($data)) {
				$this->Session->setFlash('Convênio salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Houve um erro ao salvar Convênio');
			}
		}

		// Configura Titulo da Pagina
		$this->set('title_for_layout','Convênios - Adicionar');
		
		$Estados = $this->Convenio->Instituicao->InstituicoesEndereco->Cidade->Estado->find('list',array('fields'=>array('id','nome')));
		$this->set('Estados',$Estados);

		$this->render('form');
	}
	
	public function edit($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				$data = $this->request->data;
				$data['Cidade']['id'] = $id;
				if ($this->Convenio->save($data)) {
					$this->Session->setFlash('Convênio salvo com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao salvar Convênio!');
				}
			}
		}
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Convênios - Editar');
		
		$Estados = $this->Convenio->Instituicao->InstituicoesEndereco->Cidade->Estado->find('list',array('fields'=>array('id','nome')));
		$this->set('Estados',$Estados);
		
		$Cidade = $this->Convenio->read(null, $id);
		$this->request->data = $Cidade;

		$this->render('form');
	}
	
	public function del($id = null) {
		if($this->request->isPost()) {
			if ($id != null) {
				if ($this->Convenio->delete($id)) {
					$this->Session->setFlash('Convênio excluído com sucesso!');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Houve um erro ao excluir Convênio!');
				}
			}
		}
	}

}