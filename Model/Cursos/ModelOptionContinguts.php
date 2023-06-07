<?php

include ("../../Model/Conexion/connexio_bd.php");

class ModelOptionsContinguts {

    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function listadoContinguts()
    {
        //realizamos la consulta de todos los profesores
        $consulta = $this->conn->prepare("SELECT * FROM continguts");
        $consulta->execute();
        $result = $consulta->get_result();
        $consulta->close();
        return $result;
    }

}