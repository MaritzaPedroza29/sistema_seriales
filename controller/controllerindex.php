<?php
require_once "../conexion.php";
require_once "../model/class.php";
session_start();

if(isset($_GET['salir'])){
  session_destroy();
  header("location: login.php");
}
$orden= new Orden ();
$user=$_POST['usuario'];
$pass=$_POST ['clave'];
$dato=$orden->validacion($user, $pass);
    
if(isset($_POST['login'])){
    $_SESSION ['usuario']= $user;
    header("location: ../views/inicio.php");
}else{
  ?>
  <?php
  header("location: ../index.php");
 
}

?>