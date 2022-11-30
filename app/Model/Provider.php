<?php
App::uses('AppModel', 'Model');

class Provider extends AppModel{
		public $belongsTo = array(
			'Service'
		);
}

?>
