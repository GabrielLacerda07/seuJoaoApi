<?php
App::uses('AppController', 'Controller');


class ProvidersController extends AppController {
	public function index(){
	$fields = array('Provider.nome', 'Provider.email', 'Provider.id');

	$prestadores = $this->Provider->find('all', compact('fields')) ;
	$this->set('prestadores', $prestadores);
	}

	public function add(){
		if(!empty($this->request->data)){
			$this->Provider->create();
			if($this->Provider->save($this->request->data)){
				$this->Flash->set('Prestador gravado com sucesso!');
				$this->redirect('/providers');
			}
		}
	}

	public function edit($id = null){
		if(!empty($this->request->data)){
			$this->Provider->create();
			if($this->Provider->save($this->request->data)){
				$this->Flash->set('Alteração feita com sucesso!');
				$this->redirect('/providers');
			}
		}else{
			$fields = array('Provider.nome', 'Provider.telefone', 'Provider.email');
			$conditions = array('Provider.id' => $id);
			$this->request->data = $this->Provider->find('first', compact('fields', 'conditions'));
		}
	}

	public function view($id = null){

	}


}


?>
