<?php
class GruposController extends AdminAppController {

	public $uses = array('Admin.Grupo');
	
	function save($id = null) {
		if ($this->request->isPost()) {
			if ( $this->action == 'edit' ) {
				$this->request->data['Grupo']['id'] = $id;
			}
			if ( $this->Grupo->save( ( $this->request->data ) ) ) {
				$this->Bootstrap->setFlash('Registro salvo com successo!');
				$this->redirect( array( 'action'=>'index' ));
			} else {
				$this->Bootstrap->setFlash('Erro ao salvar Registro!');
			}
		}
	}

	public function index() {
		// Configura Titulo da Pagina
		$this->set('title_for_layout','Grupo');
		// Carrega dados do BD
		$this->set('data', $this->Paginator->paginate('Grupo'));
	}
	
	public function add() {
		$this->save();
		$this->render('form');
	}
	public function edit($id = null) {
		$this->save($id);
		if (!$id) {
			$this->Session->setFlash('Grupo não existente!');
			$this->redirect(array('action'=>'index')); 
		} else {
			$Grupo = $this->Grupo->read(null, $id);
			$this->request->data = $Grupo;
		}
		$this->render('form');
	}
	
	public function del($id = null) {
		if ($this->request->isPost()) {
			$Grupo = $this->Grupo->delete($id);
			$this->Bootstrap->setFlash('Registro excluido com successo!');
			$this->redirect( array( 'action'=>'index' ));
		}
	}
}