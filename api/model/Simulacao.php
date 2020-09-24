<?php 
    require_once "Connection.php";
    class Simulacao{

        public static function insert($data){
            
            $data = (object)$data;
            $ip = $data->ip;
            $simulacao = json_encode($data->simulacao);
            $opcoes = json_encode($data->opcoes);
            $val_total = $data->valor_total;

            $conn = Connection::start();
            $query = "INSERT INTO simulacoes (ip,simulacao,opcoes,valor_total) VALUES('$ip','$simulacao','$opcoes',$val_total)";
            //echo $query;

            $stmt = $conn->prepare($query);
            $stmt->execute();
            $id = $conn->lastInsertId();
            return $id;


        }


    }




?>