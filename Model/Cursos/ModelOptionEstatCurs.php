<?php

include ("../../Model/Conexion/connexio_bd.php");

class ModelOptionEstatCurs {

    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function listadoEstats()
    {
        //realizamos la consulta de todos los profesores
        $consulta = $this->conn->prepare("SELECT * FROM estat_curs");
        $consulta->execute();
        $result = $consulta->get_result();
        $consulta->close();
        return $result;
    }

}