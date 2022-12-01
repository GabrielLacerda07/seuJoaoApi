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

echo $novoButton;
echo '<br/>';
echo $novoServicoButton;
echo $this->Html->tag('table', $header . $body);

?>
<!--
<h1>Prestadores</h1>
<table>
	<thead>
		<tr>
			<th>Nome</th>
			<th>Ano</th>
			<th>Duração</th>
			<th>Idioma</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Avengers</td>
			<td>2019</td>
			<td>5:00</td>
			<td>Inglês</td>
		</tr>
	</tbody>
</table>
-->
