<?php
// Connexió a la BD
include ("../../Model/Conexion/connexio_bd.php");

class ModelPanellHoraris {

    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function mostrarHoraris() {

        //Buscar datos de continguts
        $sql = $this->conn->prepare("SELECT * FROM horarios JOIN dies ON horarios.id_dia_semana = dies.id_dia_semana JOIN franjes ON horarios.id_franja = franjes.id_franja JOIN curs ON horarios.id_curs = curs.id_curs JOIN estat_curs ON curs.estat = estat_curs.id_estat_curs"); 
        // Executem la consulta
        $sql->execute();
        //Obtenim el resultat de la consulta
        $result = $sql->get_result();
        // Retornem les dades de la consulta
        return $result;
    }
}