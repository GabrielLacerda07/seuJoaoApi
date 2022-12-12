<?php



$informacao = array();

foreach($prestadores as $prestador){
	$editLink = $this->Html->link('Editar', '/providers/edit/' . $prestador['Provider']['id']);
	$viewLink = $this->Html->link($prestador['Provider']['nome'], '/providers/view/' .$prestador['Provider']['id']);
	$deleteLink = $this->Html->link('Excluir', '/providers/delete/' . $prestador['Provider']['id']);
	$informacao[] = array(
		$viewLink,
		$prestador['Provider']['email'],
		$prestador['Service']['nome'],
		$editLink . ' ' . $deleteLink
	);
}
echo $this->Html->tag('h1', 'Prestadores');

$titulos = array('Nome',  'Email', 'Serviço Prestado', '');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($informacao);
$novoButton = $this->Html->link('Novo Prestador', '/providers/add');
$novoServicoButton = $this->Html->link('Adicionar novo serviço', '/services/add');
$exportarCsv = $this->Html->link('Exportar todos prestadores', '/providers/exportCsv');

echo $novoButton;
echo '<br/>';
echo $novoServicoButton;
echo '<br/>';
echo $exportarCsv;
echo $this->Html->tag('table', $header . $body);

?>
