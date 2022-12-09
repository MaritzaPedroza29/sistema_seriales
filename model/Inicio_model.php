<?PHP
class Inicio_model extends Database
{
    function getAllOrden()
    {
        try {
            $this->connect();
            $sql = "SELECT *  FROM orden_compra";
            $result = $this->getData($sql);
            $this->close();
            return $result;
        } catch (\Throwable $th) {
        }
    }

    public function setProductos($item)
    {
        try {
            $this->connect();
            $l = $this->insert(
                'productos',
                array(
                    'id_producto' => $item ["id"],
                    'Nombre' => $item["name"],
                    'referencia' => $item["reference"]
                )
            );
            $this->close();
            return ($l) ? true : false;
        } catch (\Throwable $th) {
            return "error";
        }
    }

    public function setOrdenCompra($nombre_provedor, $fecha, $id_orden)
    {
        try {
            $this->connect();
            $l = $this->insert(
                'orden_compra', // nombre de la tabla
                array(
                    'id_orden' => $id_orden,
                    'nombre_provedor' => $nombre_provedor,
                    'fecha' => $fecha
                )
            );
            $this->close();
            return ($l) ? true : false;
        } catch (\Throwable $th) {
            return "error";
        }
    }
    public function setProd_oc ($item,$id_orden)
    {
        try{
            $this->connect();
            $l = $this->insert(
                'prod_oc',
                array(
                    'id_orden' => $id_orden,
                    'cantidad' => $item["quantity"],
                    'id_producto' => $item["id"]
                  
                )
                );
            $this->close();
            return ($l) ? true : false;
        } catch (\Throwable $th){
            return "error";
        }
    }

    public function getOrdenID($id)
    {
        try {
            $this->connect();
            $sql ="SELECT prod_oc.id_prod_oc, productos.nombre, productos.referencia, `cantidad`FROM prod_oc JOIN productos ON prod_oc.id_producto = productos.id_producto JOIN orden_compra ON prod_oc.id_orden = orden_compra.id_orden WHERE orden_compra.id_orden =".$id;
            $result = $this->getData($sql);
            $this->close();
            return $result;
        } catch (\Throwable $th) {
        }
    }
    public function getNombre($idpoc)
    {
        try {
            $this->connect();
             $sql ="SELECT COUNT(*) serial, prod_oc.cantidad FROM seriales JOIN prod_oc ON seriales.id_prod_oc = prod_oc.id_prod_oc WHERE prod_oc.id_prod_oc=".$idpoc;
            $result = $this->getDataSingle($sql);
            //print_r($result);
            $this->close();
            return $result;
        } catch (\Throwable $th) {
        }
    }
 
    public function getOrdenNumeroOrden($num)
    {
        try {
            $this->connect();
            $sql = "SELECT * FROM orden_compra WHERE numero_orden = " . $num;
            $result = $this->getDataSingle($sql);
            $this->close();
            return $result;
        } catch (\Throwable $th) {
        }
    }
    public function actualizar($idpoc)
    {
        try{
            $this->connect();
            $sql = "SET @COUNT_MENAJE=(SELECT COUNT(serial) FROM seriales JOIN prod_oc ON seriales.id_prod_oc = prod_oc.id_prod_oc WHERE prod_oc.id_prod_oc = .$idpoc)
            UPDATE seriales SET serial=@COUNT_MENAJE";
            $result = $this->getDataSingle($sql);
            $this->close();
            return $result;
        }catch (\Throwable $th){
        }
    }
}

?>