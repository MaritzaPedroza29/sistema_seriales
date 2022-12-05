<?php
class Database
{

    private $host;
    private $usuario;
    private $pass;
    private $db;

    private $connection;

    function __construct()
    {
        $this->host = HOST_NAME;
        $this->usuario = US_NAME;
        $this->pass = PSSWORD;
        $this->db = DB_NAME;
    }

    function connect()
    {

        $opciones = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::MYSQL_ATTR_FOUND_ROWS => true
        );

        $this->connection = new PDO(
            'mysql:host=' . $this->host . ';dbname=' . $this->db,
            $this->usuario,
            $this->pass,
            $opciones
        );
    }


    function getData($sql)
    {

        $data = array();
        $result = $this->connection->query($sql);

        $error = $this->connection->errorInfo();
        if ($error[0] === "00000") {
            $result->execute();
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    array_push($data, $row);
                }
            }
        } else {
            throw new Exception($error[2]);
        }
        return $data;
    }

    function numRows($sql)
    {
        $result = $this->connection->query($sql);
        $error = $this->connection->errorInfo();

        if ($error[0] === "00000") {
            $result->execute();
            return $result->rowCount();
        } else {
            throw new Exception($error[2]);
        }
    }

    function getDataSingle($sql)
    {

        $result = $this->connection->query($sql);

        $error = $this->connection->errorInfo();

        if ($error[0] === "00000") {
            $result->execute();
            if ($result->rowCount() > 0) {
                return $result->fetch(PDO::FETCH_ASSOC);
            }
        } else {
            throw new Exception($error[2]);
        }
        return null;
    }


    function getDataSingleProp($sql, $prop)
    {

        $result = $this->connection->query($sql);
        $error = $this->connection->errorInfo();

        if ($error[0] === "00000") {
            $result->execute();
            if ($result->rowCount() > 0) {
                $data = $result->fetch(PDO::FETCH_ASSOC);
                return $data[$prop];
            }
        } else {
            throw new Exception($error[2]);
        }
        return null;
    }

    function executeInstruction($sql)
    {
        $result = $this->connection->query($sql);
        $error = $this->connection->errorInfo();

        if ($error[0] === "00000") {
            $result->execute();
            return $result->rowCount() > 0;
        } else {
            throw new Exception($error[2]);
        }
    }

    function insert($table, $arrayValues)
    {
        foreach ($arrayValues as $field => $v)
            $ins[] = ':' . $field;

        $ins = implode(',', $ins);
        $fields = implode(',', array_keys($arrayValues));
        $sql = "INSERT INTO $table ($fields) VALUES ($ins)";

        $result = $this->connection->prepare($sql);
        foreach ($arrayValues as $f => $v) {
            $result->bindValue(':' . $f, $v);
        }

        $error = $this->connection->errorInfo();
        if ($error[0] === "00000") {
            $result->execute();
            return $result->rowCount() > 0;
        } else {
            throw new Exception($error[2]);
        }
    }



    function close()
    {
        $this->connection = null;
    }

    function getLastId()
    {
        return $this->connection->lastInsertId();
    }
}
?>