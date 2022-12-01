<?PHP
class Inicio_model extends Database
{
    function getAllOrden()
    {
        try {
            $this->connect();
            $sql = "SELECT `nombre_provedor`, `fecha`, `numero_orden` FROM `orden_compra`";
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
                $l = $this->insert(
                    'productos',
                    array(
                        'Nombre' => $item["name"],
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
            $sql = "SELECT * FROM orden_compra WHILE id_orden = ".$id;
            $result = $this->getDataSingle($sql);
            $this->close();
            return $result;
        } catch (\Throwable $th) {
        }
    }
}

?>