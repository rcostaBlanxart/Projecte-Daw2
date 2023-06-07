<?php

include ("../../Model/Conexion/connexio_bd.php");

class ModelHorari {

    private $conn;
  
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function listadoDies()
    {
        $consulta = $this->conn->prepare('SELECT * FROM dies;');
        $consulta->execute();
        $result=$consulta->get_result();
        return $result;
    }

    public function listadoFranjes()
    {
        $consulta = $this->conn->prepare('SELECT * FROM franjes;');
        $consulta->execute();
        $result=$consulta->get_result();
        return $result;
    }

    public function listadoContinguts($id_curs) 
    {
        $consulta = $this->conn->prepare('SELECT * FROM horarios JOIN continguts ON continguts.id_contingut = horarios.id_contingut WHERE id_curs = ?');
        $consulta->bind_param("i",$id_curs);
        $consulta->execute();
        $result=$consulta->get_result();
        return $result;
    }
}