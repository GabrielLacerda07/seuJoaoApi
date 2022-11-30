<?php
$form = $this->Form->create('Provider');
$form .= $this->Form->input('Provider.nome');
$form .= $this->Form->input('Provider.telefone');
$form .= $this->Form->input('Provider.email');
$form .= $this->Form->input('Provider.foto', array('type' => 'file'));
$form .= $this->Form->input('Provider.service_id', array(
	'type' => 'select',
	'options' => $servicos
));
$form .= $this->Form->input('Provider.service_value');
$form .= $this->Form->input('Provider.service_desc');
$form .= $this->Form->submit('Gravar');
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Adicionar prestador');
echo $form;


?>
