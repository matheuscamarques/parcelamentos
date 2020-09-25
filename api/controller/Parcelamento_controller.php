<?php

require_once "../model/Parcelamento.php";
require_once "../model/Simulacao.php";


$valor = (float)(((object)$_GET)->valor_total);

//echo var_dump((object)$_GET);

/*
*       opções - JSON contendo opções de pagamento ($valor , $quantidade_de_parcelas)
*       simulação - JSON contendo a Simulação , sendo ela uma Lista de Debitos , 
*       valor_total - Soma do valor da Lista de Debitos.
*/


$data = ["ip"=>get_client_ip(),"opcoes" => Parcelamento::JSON($valor,12),"simulacao" => ((object)$_GET)->listaDeDebitos , "valor_total" => $valor];
$id = Simulacao::insert($data);

$data['id'] = $id;
echo json_encode($data);






?>
