<?php
App::uses('AppController', 'Controller');


class ServicesController extends AppController {
	public function index(){
		$servicos = $this->Service->find('all');
		$this->set('servicos', $servicos);
	}
	public function add(){
		if(!empty($this->request->data)){
			$this->Service->create();
			if($this->Service->save($this->request->data)){
				$this->Flash->set('Serviço salvo com sucesso!');
				$this->redirect('/providers');
			}
		}
	}

}

?>
