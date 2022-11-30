<?php

$view =$this->Html->tag('h2', 'Nome');
$view .= $this->Html->para('', $this->request->data['Provider']['nome']);
$view .= $this->Html->tag('h2', 'Telefone');
$view .=  $this->Html->para('', $this->request->data['Provider']['telefone']);
$view .= $this->Html->tag('h2', 'Email');
$view .= $this->Html->para('', $this->request->data['Provider']['email']);
$view .= $this->Html->tag('h2', 'Foto');
$view .= $this->Html->para('', $this->request->data['Provider']['foto']);
$view .= $this->Html->tag('h2', 'Valor do serviço');
$view .= $this->Html->para('', $this->request->data['Provider']['service_value']);
$view .= $this->Html->tag('h2', 'Descrição do serviço');
$view .= $this->Html->para('', $this->request->data['Provider']['service_desc']);
$voltarLink = $this->Html->link('Voltar', '/providers');
echo $this->Html->tag('h1', 'Visualizar prestador');
echo $view;
echo $voltarLink;

?>
