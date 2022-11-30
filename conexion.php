<?php
 class connection{
        
    public static function connect(){
        
        try {   
            
            //$conexion = new PDO("mysql:host=localhost; dbname=dbsoyasesorias", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            $conexion = new PDO("mysql:host=localhost; dbname=serializar", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


            return $conexion;
                                
        } catch (Exception $ex) {                
            echo "Error:  ". $ex->getFile();
            echo "<br>";
            echo "En la Linea: " . $ex->getLine();
        }
        
    }

}
?>