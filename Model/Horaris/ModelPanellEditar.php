<?php
// Connexió a la BD
include ("../../Model/Conexion/connexio_bd.php");

class ModelPanellEditar {

    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function mostrarContinguts($IDHorari) {
        //Buscar datos de horarios
        $sql = $this->conn->prepare("SELECT * FROM horarios WHERE id_horario = ?"); 
        $sql->bind_param("i",$IDHorari);
        // Executem la consulta
        $sql->execute();
        //Obtenim el resultat de la consulta
        $result = $sql->get_result();
        // Retornem les dades de la consulta
        return $result;
    }
}
