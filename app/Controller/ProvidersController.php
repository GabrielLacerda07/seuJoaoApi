<?php
App::uses('AppController', 'Controller');


class ProvidersController extends AppController {
	public function index(){
	$fields = array(
		'Provider.nome',
	  'Provider.email',
		'Provider.id',
		'Service.nome'
	);

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
		$fields = array('Service.id', 'Service.nome');
		$servicos= $this->Provider->Service->find('list', compact('fields'));
		$this->set('servicos', $servicos);
	}

	public function edit($id = null){
		if(!empty($this->request->data)){
			$this->Provider->create();
			if($this->Provider->save($this->request->data)){
				$this->Flash->set('Alteração feita com sucesso!');
				$this->redirect('/providers');
			}
		}else{
			$fields = array(
				'Provider.nome',
				'Provider.telefone',
				'Provider.email',
				'Provider.service_id',
				'Provider.service_value',
				'Provider.service_desc'
			);
			$conditions = array('Provider.id' => $id);
			$this->request->data = $this->Provider->find('first', compact('fields', 'conditions'));
		}
		$fields = array('Service.id', 'Service.nome');
		$servicos= $this->Provider->Service->find('list', compact('fields'));
		$this->set('servicos', $servicos);
	}

	public function view($id = null){
			$fields = array(
				'Provider.nome',
				'Provider.telefone',
				'Provider.email',
				'Provider.foto',
				'Provider.service_id',
				'Provider.service_value',
				'Provider.service_desc'
			);
			$conditions = array('Provider.id' => $id);
			$this->request->data = $this->Provider->find('first', compact('fields', 'conditions'));
	}
	public function  delete($id){
		$this->Provider->delete($id);
		$this->redirect('/providers');
	}
}


?>