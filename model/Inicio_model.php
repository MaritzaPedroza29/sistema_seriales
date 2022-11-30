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

}

?>