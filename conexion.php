<?php
class Conexion{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "serializar";
    private $connect;

    public function __CONSTRUCT()
    {
        $connectionString = "mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";
        try{
            $this->connect =  new PDO($connectionString,$this->user,$this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "conexión exitosa";
        }catch (Exception $e){
            $this->connect = "Error de conexión";
            echo "Error:". $e->getMessage();
        }
    }
}
?>