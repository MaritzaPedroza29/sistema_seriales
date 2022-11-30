<?php
include_once ("../conexion.php");
include_once ("../funciones.php");
require_once ("../model/class.php");
$orden = new Orden ();
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
foreach ($suma as $fila){
    if($fila['deletable']=="true"){ 
    $provedor=$fila['provider']['name'];
    $fecha=$fila['date'];
    $numero_orden=$fila['id']; 
   //$rs=$orden->seleccionar();
    //if($numero_orden!=$row['numero_orden']){
       $row=$orden->insertar($provedor,$fecha,$numero_orden);
        //$rs=$orden->insertar($provedor,$fecha,$numero_orden); 
        //echo "se inserto el dato correctamente";
    //}
}
} 



?>