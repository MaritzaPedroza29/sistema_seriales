<?php
require_once ("../conexion.php");
include_once ("../funciones.php");
require_once ("../model/class.php");
$suma=[];
$i=0;
$j=0;
while($i<1000){ 
$url="https://api.alegra.com/api/v1/purchase-orders?order_direction=DESC&order_field=id&status=open&fields=deletable&start=$i";
$vector=leer_api_alegra($url);
$cuantos=count($vector);
 $suma=array_merge($suma,$vector);
 if($cuantos==30) $i+=30;
 else break;
}
$orden= new Orden();
foreach ($suma as $fila){
    foreach ($fila['purchases'] as $value){
    if($fila['deletable']=="true"){ 
        for ($j = 0 ; $j < count($value) ; $j++){
            $nombre=$fila['purchases']['items'][$j]['name'];
            $reference=$fila['purchases']['items'][$j]['reference'];
            //$rs=$orden->insertar_producto($nombre,$reference);
        }
        }
        }
        echo $rs;
    }
?>