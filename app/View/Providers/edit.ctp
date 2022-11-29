<?php

$form = $this->Form->create('Provider');
$form .= $this->Form->hidden('Provider.id');
$form .= $this->Form->input('Provider.nome');
$form .= $this->Form->input('Provider.telefone');
$form .= $this->Form->input('Provider.email');
$form .= $this->Form->submit('Gravar');
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Editar prestador');
echo $form;



?>
