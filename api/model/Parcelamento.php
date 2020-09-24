<?php

/*
*
*
*       Parcelamentos
*
*
*
*/
require_once "Connection.php";

class Parcelamento{
    public static function GetTaxa($qtd_parcelas){
        $conn = Connection::start();
        $query = "SELECT taxa FROM taxas WHERE qtd = $qtd_parcelas LIMIT 1";
        $data = $conn->query($query);

        return $data->fetch()->taxa;
    }

    public static function geraParcelamento($valor,$qtd_parcelas){
        $valor_parcelas = self::jurosSimples($valor,SELF::GetTaxa($qtd_parcelas),$qtd_parcelas);

        $total = ($qtd_parcelas * $valor_parcelas) == 0 ? $valor: ($qtd_parcelas * $valor_parcelas) ;

        $data = ["total" => number_format($total, 2, ",", ".") , "v_parcelas"=>number_format($valor_parcelas, 2, ",", "."),"parcela"=>$qtd_parcelas];
        return $data;
    }

    public static function jurosSimples($valor, $taxa, $parcelas) {
        $juros = $taxa / 100.0; 
        $precoJuros = $valor + ($juros * $valor);
        $valorParcela = $precoJuros / $parcelas;
        
        return $taxa == 0 ? 0 : $valorParcela;
    }
    
  

    public static function JSON($valor, $parcelas){
        $data = [];
        for($i=0; $i<$parcelas;$i++){
            array_push($data,self::geraParcelamento($valor,$i+1));
        }
        return json_encode($data);
    }
}








?>