<?php

require_once "../model/Connection.php";

function rand80(){
   return ( rand(0,100) > 81 ? false : true );
}
$conn = Connection::start();

$id_simulacao = $_POST['id'];
$tipo_parcela = $_POST['tipo'];
$success = rand80();

if($success){
    $conn = Connection::start();
    $query = "INSERT INTO pagamentos (simulacoes_id,sucesso,num_parcelas,data_time) VALUES('$id_simulacao','$success','$tipo_parcela','NOW()')";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $id = $conn->lastInsertId();
    $data = ["info"=>true, "last_id" => $id];
    die(json_encode($data)) ;

}else{
    $conn = Connection::start();
    $query = "INSERT INTO pagamentos (simulacoes_id,sucesso,num_parcelas,data_time) VALUES('$id_simulacao','$success','$tipo_parcela','NOW()')";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $id = $conn->lastInsertId();
    $data = ["info"=>false, "last_id" => $id];
    die(json_encode($data)) ;
}


        
