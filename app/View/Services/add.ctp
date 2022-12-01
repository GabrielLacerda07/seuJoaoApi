<?php

$form = $this->Form->create('Service');
$form .= $this->Form->input('Service.nome');
$form .= $this->Form->submit('Gravar');
$form .= $this->Form->end();

echo $this->Html->tag('h3', 'Adicionar serviço');
echo $form;

?>
