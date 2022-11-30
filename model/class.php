<?php
class Orden {
    private $db;  
    public function clients_model() {
            
        require_once "../model/conexion.php";
        
        $this->db = connection::connect();
    }
    function consultar($tabla,$wh=NULL){
        try {
            $mysqli = new mysqli("localhost", "root", "", "sistema");
            //$conet=new Db();
            $sql="SELECT * FROM  $tabla ".$wh;   
            
          
            //$rs=$rs->fetch_object();
           // $conet->close();
            //return $rs;
              //code...
          } catch (\Throwable $th) {
              //throw $th;
          }
    }
    function insertar($provedor,$fecha,$numero_orden){
        $this->db = connection();
        $sql="INSERT INTO orden_compra (nombre_provedor,fecha, numero_orden) VALUES (:provedor,:fecha,:numero_orden)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':provedor',$provedor, PDO::PARAM_STR);
        $sql->bindValue(':fecha',$fecha, PDO::PARAM_STR);
        $sql->bindValue(':numero_orden',$numero_orden, PDO::PARAM_STR);
        $sql->execute();
    }
    function seleccionar (){
        $seleccionar = $this->db->query("SELECT * FROM orden_compra");
        $seleccionar->execute();
    }

    function  insertar_producto($nombre,$referencia){
        try{
            $mysqli = new mysqli("localhost", "root", "", "sistema");
            $sql="INSERT INTO `productos`(`nombre`, `referencia`) VALUES ('".$nombre."','".$referencia."')"; 
            $resul=mysqli_query($mysqli,$sql);
            return $resul;
        } catch (\Throwable $th){
           // throw exception $th;
        }
    }
    function validacion($user,$pass){
        try{
            $mysqli = new mysqli("localhost", "root", "", "sistema");
            $consulta="SELECT `usuario`, `clave` FROM `usuarios` WHERE usuario='$user' AND contrasena ='$pass'"; 
            $resul=mysqli_query( $mysqli, $consulta);
            $filas=mysqli_num_rows($resul);
            return $filas;
        } catch (\Throwable $th){
            //throw exception $th;
        }
    }
      /*function seleccionar(){
        try{
            $mysqli = new mysqli("localhost", "root", "", "sistema");
            $consulta="SELECT `nombre_provedor`, `fecha`, `numero_orden` FROM `orden_compra`";
            $resul=mysqli_query($mysqli, $consulta);
            $fila=mysqli_num_rows($resul);
            return $resul;
        }   catch(\Throwable $th){
            //throw exception $th;
        }
    }*/
    function actualizar($provedor,$fecha,$numero_orden){
        try{
            $mysqli = new mysqli("localhost", "root", "", "sistema");
            $consulta="UPDATE `orden_compra` SET`nombre_provedor`='".$provedor."',`fecha`='".$fecha."',`numero_orden`='".$numero_orden."'";
            $resul=mysqli_query($mysqli, $consulta);
            return $resul;
        }catch(\Throwable $th){
            //throw exception $th;
        }
    }
}
?>