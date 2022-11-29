<?php



$informacao = array();

foreach($prestadores as $prestador){
	$editLink = $this->Html->link('Editar', '/providers/edit/' . $prestador['Provider']['id']);
	$viewLink = $this->Html->link($prestador['Provider']['nome'], '/providers/view/' .$prestador['Provider']['id']);

	$informacao[] = array(
		$viewLink,
		$prestador['Provider']['email'],
		$editLink
	);
}
echo $this->Html->tag('h1', 'Prestadores');

$titulos = array('Nome', 'Telefone', 'Email');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($informacao);
$novoButton = $this->Html->link('Novo', '/providers/add');

echo $novoButton;
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
