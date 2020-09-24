<?php

    /*
    *
    *
    *               Authenticação da API 
    *
    *
    *
    *
    */

    class Authentication{

             private static $key;


             /** 
             *
             *      Start deve retornar um JSON se a chave for padrão será retornado boolean.
             * 
             * 
             * 
             * */
             public function start($data) :bool {
                return $this->verifyKey($data);
             }

             private function verifyKey($data){
                 return true;
             }


    }



?>