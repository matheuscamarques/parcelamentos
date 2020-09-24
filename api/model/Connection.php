<?php
    

    class Connection{
         private static $host = "localhost";
         private static $username = "root";
         private static $password = "";
         private static $driver = "mysql";
         private static $database = "parcelamentos";
         public  static $conn ;

         public function __construct(){
                self::$conn = new PDO(self::$driver.":host=".self::$host.";dbname=".self::$database, self::$username, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
         }

        public static function start():object{
                try{    
                        self::$conn = new PDO(self::$driver.":host=".self::$host.";dbname=".self::$database, self::$username, self::$password);
                        // set the PDO error mode to exception
                        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                }
                catch (PDOException $e) {
                        echo 'Connection failed: ' . $e->getMessage();
                        //self::$conn = null;
                }

                    return self::$conn;
            
        }
         

}

    


   

function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}