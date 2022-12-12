<?php

// echo '<pre/>';
// print_r($prestadores);
// echo '<pre>';

$cabecalho = array(
	'Nome',
	'Email',
	'Id',
	'Servico'
);

foreach($prestadores as $prestador){
	$prest[] = $prestador;
	$servico_prest[] = $prestador['Service']['nome'];
}


for($i=0; $i <count($servico_prest); $i++){
	$todosPrest[] = $prest[$i]['Provider']['nome'];
	$todosPrest[] .= $prest[$i]['Provider']['email'];
	$todosPrest[] .= $prest[$i]['Provider']['id'];
	$todosPrest[] .= $servico_prest[$i] ;

}
$todosPrest = array_chunk($todosPrest, 4, false);
echo '<pre>';
print_r($todosPrest);
echo '<pre/>';


$arquivo = fopen('prestadores.csv', 'w');
fputcsv($arquivo, $cabecalho, ';');

foreach($todosPrest as $prestador){
  fputcsv($arquivo, $prestador, ';');
}

fclose($arquivo);



?>
