<?php
class prod_oc {
    function insertar_prod_oc ($id_orden,$cantidad,$id_prod) {
        try{
            $mysqli = new mysqli("localhost", "root", "", "sistema");
            $consulta="INSERT INTO `prod_oc`( `id_orden`, `cantidad`, `id_producto`) VALUES ('".$id_orden."','".$cantidad."','".$id_prod."')";
            $resul=mysqli_query($mysqli, $consulta);
            return $resul;
        }catch(\Throwable $th){
            //throw exception $th;
        }
    }
}
?>