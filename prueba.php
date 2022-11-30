<?php
include_once "funciones.php";
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
$archivo = 'productos.csv';
$fh = fopen($archivo,'w') or die("No se puede abrir el archivo: $archivo");
$info = array("nombre_provedor","fecha","numero_orden");
fputcsv($fh,$info,",");
foreach ($suma as $fila) {
  if($fila['deletable']=="true"){ 
  $lista = array ($fila['provider']['name'],$fila['date'],$fila['id']);
                                              fputcsv($fh, $lista, ",");                               
}
}
fclose($fh) or die("No se puede cerrar el archivo: $archivo");

?>






