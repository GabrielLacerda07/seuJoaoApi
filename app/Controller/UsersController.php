<?php
App::uses('AppController', 'Controller');


class UsersController extends AppController {

	public $components = array('RequestHandler');

	public function index(){
		$fields = array(
			'User.id',
			'User.nome',
			'User.email',
			'User.senha'
		);

		$users = $this->User->find('all', compact('fields')) ;
		$this->set(array(
			'users' => $users,
			'_serialize' => array('users')
		));
	}
}

?>
