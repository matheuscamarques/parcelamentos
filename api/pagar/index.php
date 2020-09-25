<?php

require_once "../model/Connection.php";

function rand80(){
   return ( rand(0,100) > 81 ? false : true );
}


$conn = Connection::start(); /* FIX ME - Tratamento caso falhe a conexão */

$id_simulacao = $_POST['id']; /* FIX ME - Tratamento caso venha vazio */
$tipo_parcela = $_POST['tipo']; /* FIX ME - Tratamento caso venha vazio  */
$success = rand80();

    $query = "INSERT INTO pagamentos (simulacoes_id,sucesso,num_parcelas,data_time) VALUES('$id_simulacao','$success','$tipo_parcela',NOW())";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $id = $conn->lastInsertId();

if($success){
    $data = ["info"=>true, "last_id" => $id];
    die(json_encode($data)) ;

}else{
    $data = ["info"=>false, "last_id" => $id];
    die(json_encode($data)) ;
}


        
