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

    public function setProductos($arrayItems)
    {
        try {
            $this->connect();
            foreach ($arrayItems as $item)
            die("xxxx");
            print_r($item);
                $l = $this->insert(
                    'productos',
                    array(
                        'id_producto' => $item["id"],
                        'nombre' => $item["name"],
                        'referencia' => $item["reference"]
                    )
                );
            $id = $this->getLastId();
            $this->close();
            return ($l) ? $id : false;
        } catch (\Throwable $th) {
        }
    }
public function getOrdenID($id)
{
try {
    $this->connect();
    $sql = " SELECT productos.Nombre, productos.referencia, cantidad FROM `prod_oc` JOIN productos ON prod_oc.id_producto = productos.id_producto JOIN orden_compra ON prod_oc.id_orden = orden_compra.id_orden WHERE orden_compra.id_orden = ".$id;
    $result = $this->getDataSingle($sql);
    $this->close();
    return $result;
} catch (\Throwable $th) {
}
}
public function getNombre($nom)
{
try {
    $this->connect();
    $sql = " SELECT productos.Nombre, productos.referencia, cantidad FROM `prod_oc` JOIN productos ON prod_oc.id_producto = productos.id_producto JOIN orden_compra ON prod_oc.id_orden = orden_compra.id_orden WHERE productos.Nombre = ".$nom;
    $result = $this->getDataSingle($sql);
    $this->close();
    return $result;
} catch (\Throwable $th) {
}
}
public function getCantidad($nom)
{
try {
    $this->connect();
    $sql = "SELECT cantidad FROM `prod_oc` JOIN productos ON prod_oc.id_producto = productos.id_producto JOIN orden_compra ON prod_oc.id_orden = orden_compra.id_orden WHERE productos.Nombre = ".$nom;
    $result = $this->getDataSingle($sql);
    $this->close();
    return $result;
} catch (\Throwable $th) {
}
}
    public function getOrdenNumeroOrden($num)
    {
        try {
            $this->connect();
            $sql = "SELECT * FROM orden_compra WHERE numero_orden = ".$num;
            $result = $this->getDataSingle($sql);
            $this->close();
            return $result;
        } catch (\Throwable $th) {
        }
    }
}

?>