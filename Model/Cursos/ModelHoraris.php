<?php
include ("../../Model/Conexion/connexio_bd.php");

class CrearHoraris {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }

    public function crearHoraris($dia,$franja,$contingut,$id_curs){
        $dia = mysqli_real_escape_string($this->conn, $dia);
        $franja = mysqli_real_escape_string($this->conn, $franja);
        $contingut = mysqli_real_escape_string($this->conn, $contingut);
        $id_curs = mysqli_real_escape_string($this->conn, $id_curs);

        $sql=$this->conn->prepare("INSERT INTO horarios (id_dia_semana,id_franja,id_contingut,id_curs) VALUES(?,?,?,?)");
        $sql->bind_param("ssss",$dia,$franja,$contingut,$id_curs);
        $sql->execute();

        $sql2=$this->conn->prepare("INSERT INTO curs_contingut (id_curs, id_contingut) VALUES(?,?)");
        $sql2->bind_param("ii",$id_curs,$contingut);
        $sql2->execute();
    }

}