<?php
App::uses('AppController', 'Controller');


class ProvidersController extends AppController {

	public $components = array('RequestHandler');

	public $paginate = array(
		'fields' => array(
			'Provider.nome',
			'Provider.email',
			'Provider.id',
			'Provider.telefone',
			'Service.nome'),
			'limit' => 100
	);
	 public function beforeFilter(){
        parent::beforeFilter();
        $this->Security->validatePost = false;
        $this->Security->csrfCheck = false;
    }
	public function index(){
			$prestadores = $this->paginate();
			$this->set(array(
				'prestadores'=> $prestadores,
				'_serialize' => array('prestadores')
			));
	}

	public function add(){

		// if(!empty($this->request->data)){
		// 	$this->Provider->create();
		// 	$this->Provider->save($this->request->data);
		// 	$this->Flash->set('Prestador gravado com sucesso!');
		// 	$this->redirect('/providers');
		// }
		// $fields = array('Service.id', 'Service.nome');
		// $servicos= $this->Provider->Service->find('list', compact('fields'));
		// // $this->set('servicos', $servicos);
		// $this->set(array(
		// 	'servicos' => $servicos,
		// 	'_serialize' => array('servicos')
		// ));

		$this->autoRender = false;
		$this->response->type('application/json');
			if($this->request->is('post')){
			$this->Provider->create();
			if($this->Provider->save(json_decode(file_get_contents('php://input'), true))){
				// $this->response->body(json_encode(['msg' =>  json_decode(file_get_contents('php://input'))]));
				$this->response->body($this->response->statusCode(201));
			}else{
				$this->response->body($this->response->statusCode(400));
			}
		}
	}

	public function edit($id = null){
		if(!empty($this->request->data)){
			if($this->Provider->save($this->request->data)){
				$this->Flash->set('Alteração feita com sucesso!');
				$this->redirect('/providers');
			}
		}else{
			$fields = array(
				'Provider.id',
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
		// $this->set('servicos', $servicos);
		$this->set(array(
			'servicos' => $servicos,
			'_serialize' => array('servicos')
		));
	}

	public function view($id = null){
			$fields = array(
				'Provider.nome',
				'Provider.telefone',
				'Provider.email',
				'Provider.foto',
				'Service.nome',
				'Provider.service_value',
				'Provider.service_desc'
			);
			$conditions = array('Provider.id' => $id);
			$this->request->data = $this->Provider->find('first', compact('fields', 'conditions'));
			$this->set(array(
				'dadosPrestador' => $this->request->data,
				'_serialize' => array('dadosPrestador')
			));
	}
	public function  delete($id){
		$this->Provider->delete($id);
	}
	public function exportCsv(){

		$fields = array(
		'Provider.id',
		'Provider.nome',
	  'Provider.email',
		'Service.nome',
		'Service.id',
		'Provider.service_value',

		);
		$prestadores = $this->Provider->find('all', compact('fields')) ;
		// $this->set('prestadores', $prestadores);
		$fields = array(
			'Service.nome',
			'Service.id'
		);
		$servicos = $this->Provider->find('all', compact('fields')) ;
		// $this->set(array(
		// 	'servicos' => $servicos,
		// 	'_serialize' => array('servicos')
		// ));

$cabecalho = array(
	'Id',
	'Nome',
	'Email',
	'Servico',
	'Valor'
);

foreach($prestadores as $prestador){
	$prest[] = $prestador;
	$servico_prest[] = $prestador['Service']['nome'];
}


for($i=0; $i <count($servico_prest); $i++){
	$todosPrest[] = mb_convert_encoding($prest[$i]['Provider']['id'], "UTF-16LE", "UTF-8");
	$todosPrest[] .= mb_convert_encoding($prest[$i]['Provider']['nome'], "UTF-16LE", "UTF-8");
	$todosPrest[] .= mb_convert_encoding($prest[$i]['Provider']['email'], "UTF-16LE", "UTF-8");
	$todosPrest[] .= mb_convert_encoding($servico_prest[$i], "UTF-16LE", "UTF-8");
	$todosPrest[] .= mb_convert_encoding($prest[$i]['Provider']['service_value'], "UTF-16LE", "UTF-8");
}

$todosPrest = array_chunk($todosPrest, 5, false);

$arquivo = fopen('prestadores.csv', 'w');
fputcsv($arquivo, $cabecalho, ';');

foreach($todosPrest as $prestador){
  fputcsv($arquivo, $prestador , ';');
}

fclose($arquivo);
$this->response->file('prestadores.csv', ['dowload' => true, 'name' => 'prestador.csv']);
	}
}
?>
