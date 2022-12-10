<?php
require_once ("conexion.php");
class Datos extends Conexion{
    private $serial;
    private $idpoc;
    public function __CONSTRUCT()
  {
    $this->conexion = new Conexion();
  } 
  public function insertar (string $serial, int $idpoc)
  {
    $this->strSerial = $serial;
    $this->intIdpoc = $idpoc;
    $sql = "INSERT INTO `seriales`(`id_prod_oc`, `serial`) VALUES (?,?)";
    $insert = $this->conexion->prepare($sql);
    $arrData = array ($this->strSerial, $this->intIdpoc);
    $restinsert = $insert->execute ($arrData);
    $idinsert = $this->conexion->lastInsertId();
  }
}


$serial= $_GET['serial'];
$idpoc = $_GET['idpoc'];
$data = json_decode($_GET['serial'], true);


$vector['serial']=$serial;
$vector['idpoc']=$idpoc;
//$sql="insert into seriales (id_prod_oc,serial) 
//values(:idpoc,:serial)";
//$sql = $conexion->prepare($sql);


//echo json_encode($vector );
?>