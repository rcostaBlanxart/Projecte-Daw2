<?php

include ("../../Model/Conexion/connexio_bd.php");

class ModelReservesCurs {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }

    public function reservesCurs($id_curs){
        $sql=$this->conn->prepare("SELECT reserva.id_reserva, usuari.*, curs.nom_curs, curs.id_curs FROM reserva 
        JOIN usuari ON reserva.id_usuari = usuari.id_usuari 
        JOIN curs ON reserva.id_curs = curs.id_curs WHERE curs.id_curs = ?");
        $sql->bind_param("i",$id_curs);
        $sql->execute();
        return $sql->get_result();
    }
}