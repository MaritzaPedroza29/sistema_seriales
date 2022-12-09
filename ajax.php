<?php
$serial= $_GET['serial'];
$idpoc = $_GET['idpoc'];
$vector = array ();

// inserta una nueva fila en la tabla seriales con el serial y el idpoc
$sqlinsertar="INSERT INTO `seriales` (`id_serial`, `id_prod_oc`, `serial`) VALUES (NULL, '$idpoc', '$serial');";
$consulta=mysqli_query($sqlinsertar)

if($consulta)
{
    // ejecuta una consulta para traerse las cantidades de seriales registrados con el idpoc en la tabla seriales
    $sqlcontar= "SELECT COUNT(*) as suma FROM `seriales` WHERE `id_prod_oc`=$idpoc;";

    $vector['cantidad']=$lasuma;
    $vector['estado']=1;

}
else
 {
$vector['estado']=0;
$vector['mensaje']="ERROR ".mysqli_error();
}

echo json_encode($vector );
?>