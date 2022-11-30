<?php
include_once ("../conexion.php");
include_once ("../funciones.php");
//require_once ("../model/prod_oc.php");
$suma=[];
$i=0;
while($i<1000){ 
$url="https://api.alegra.com/api/v1/purchase-orders?order_direction=DESC&order_field=id&status=open&fields=deletable&start=$i";
$vector=leer_api_alegra($url);
$cuantos=count($vector);
 $suma=array_merge($suma,$vector);
 if($cuantos==30) $i+=30;
 else break;
}
//$orden = new Prod_oc ();
foreach ($suma as $fila){
    foreach ($fila['purchases'] as $value){
        if($fila['deletable']=="true"){ 
            for ($j = 0 ; $j < count($value) ; $j++){
                $id_orden=$fila['id'];
                $cantidad=$fila['purchases']['items'][$j]['quantity'];
                $id_prod=$fila['purchases']['items'][$j]['id']; 
                $mysqli = new mysqli("localhost", "root", "", "sistema");
                $consulta="INSERT INTO `prod_oc`( `id_orden`, `cantidad`, `id_producto`) VALUES ('".$id_orden."','".$cantidad."','".$id_prod."')";
                $resul=mysqli_query($mysqli, $consulta);
            }
        }
    }
}