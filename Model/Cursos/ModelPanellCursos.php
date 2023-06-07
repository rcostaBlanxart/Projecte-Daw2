<?php
// Connexió a la BD
include ("../../Model/Conexion/connexio_bd.php");

class ModelPanellCursos {

    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function mostrarCurs($estatCurs) {

        //Buscar datos del curs
        if($estatCurs=="undefined" || $estatCurs=="") {
            $sql = $this->conn->prepare("SELECT * FROM curs JOIN estat_curs ON curs.estat = estat_curs.id_estat_curs");
        } else {
            $sql = $this->conn->prepare("SELECT * FROM curs JOIN estat_curs ON curs.estat = estat_curs.id_estat_curs WHERE id_estat_curs = ?");
            $sql->bind_param("i",$estatCurs);
        }
        
        // Executem la consulta
        $sql->execute();
        //Obtenim el resultat de la consulta
        $result = $sql->get_result();
        // Retornem les dades de la consulta
        return $result;
    }
}
