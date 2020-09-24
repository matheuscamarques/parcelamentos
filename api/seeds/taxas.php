<?php


require_once "../model/Connection.php";

$conn = Connection::start();

$query = ' ';
for($i=0 ; $i<12; $i++){
    $taxa = $i/3;
    $qtd = $i+1;
    $query = $query . "INSERT INTO taxas (qtd,taxa) VALUES($qtd,$taxa);";
    
}
echo $query;
$data = $conn->query($query);
@$data->fetch();