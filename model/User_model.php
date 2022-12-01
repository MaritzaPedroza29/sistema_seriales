<?PHP
class User_model extends Database
{
    function getUser($usuario, $clave)
    {
        try {
            $this->connect();
            $sql = "SELECT id_usuario FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
            $result = $this->getDataSingle($sql);
            $this->close();
            return $result;
        } catch (\Throwable $th) {
        }
    }

    public function newUser($usuario, $clave)
    {
        try {
            $this->connect();
            $l = $this->insert(
                'usuarios',
                array(
                    'usuario' => $usuario,
                    'clave' => $clave
                )
            );
            $id = $this->getLastId();
            $this->close();
            return ($l) ? $id : false;
        } catch (\Throwable $th) {
        }
    }
}

?>