<?php
App::uses('AppController', 'Controller');


class ServicesController extends AppController {

	public $components = array('RequestHandler');
	public function index(){
		$servicos = $this->Service->find('all');
		$this->set(array(
			'servicos'=> $servicos,
			'_serialize' => array('servicos')
		));
	}
	public function beforeFilter(){
			 parent::beforeFilter();
			 $this->Security->validatePost = false;
			 $this->Security->csrfCheck = false;
	 }
	public function add(){
		// if(!empty($this->request->data)){
		// 	$this->Service->create();
		// 	if($this->Service->save($this->request->data)){
		// 		$this->Flash->set('Serviço salvo com sucesso!');
		// 		$this->redirect('/providers');
		// 	}
		// }

		$this->autoRender = false;
		$this->response->type('application/json');
			if($this->request->is('post')){
			$this->Service->create();
			if($this->Service->save(json_decode(file_get_contents('php://input'), true))){
				$this->response->body($this->response->statusCode(201));
			}else{
				$this->response->body($this->response->statusCode(400));
			}
		}
	}

}

?>
