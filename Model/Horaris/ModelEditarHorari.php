<?php

include ("../../Model/Conexion/connexio_bd.php");

class ModelEditarHorari {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }

    public function editarHorari($IdDiaSetmana,$IdFranja,$IdHorari){
        $IdDiaSetmana = mysqli_real_escape_string($this->conn, $IdDiaSetmana);
        $IdFranja = mysqli_real_escape_string($this->conn, $IdFranja);
        $IdHorari = mysqli_real_escape_string($this->conn, $IdHorari);

        $sql=$this->conn->prepare("UPDATE horarios SET id_dia_semana = ?, id_franja = ? WHERE id_horario = ?");
        $sql->bind_param("iii",$IdDiaSetmana,$IdFranja,$IdHorari);
        $sql->execute();
    }

}
?>