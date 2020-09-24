<?php

require_once "../model/Parcelamento.php";
require_once "../model/Simulacao.php";


$valor = (float)(((object)$_GET)->valor_total);

//echo var_dump((object)$_GET);

/*
*
*
*
*/


$data = ["ip"=>get_client_ip(),"opcoes" => Parcelamento::JSON($valor,12),"simulacao" => ((object)$_GET)->listaDeDebitos , "valor_total" => $valor];
$id = Simulacao::insert($data);

$data['id'] = $id;
echo json_encode($data);






?>