<?php

include ("../../Model/Conexion/connexio_bd.php");

class DuplicarCurs {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }
  
    public function duplicarCurs($id_curs) {
        $id_curs = mysqli_real_escape_string($this->conn, $id_curs);
        // CURS
        $selectCurs = $this->conn->prepare("SELECT * FROM curs WHERE id_curs = ?");
        $selectCurs->bind_param("i", $id_curs);
        $selectCurs->execute();
        $resultCurs = $selectCurs->get_result();
        $cursData = $resultCurs->fetch_all(MYSQLI_ASSOC);
    
        $insertCurs = $this->conn->prepare("INSERT INTO curs (nom_curs, curs_descripcio, data_inici, data_fi, id_profesor, preu, estat, placesDisponibles) VALUES (?,?,?,?,?,?,?,?)");
        foreach($cursData as $row) {
            $nomCurs = $row["nom_curs"]." Copy";
            $insertCurs->bind_param("sssssiii", $nomCurs, $row["curs_descripcio"], $row["data_inici"], $row["data_fi"], $row["id_profesor"], $row["preu"], $row["estat"], $row["placesDisponibles"]);
            $insertCurs->execute();
        }
        // Guardem l'ultim id creada
        $ultimaId = $this->conn->insert_id;
        // IMG CURS
        $selectImgCurs = $this->conn->prepare("SELECT * FROM img_cursos WHERE id_curs = ?");
        $selectImgCurs->bind_param("i", $id_curs);
        $selectImgCurs->execute();
        $resultImgCurs = $selectImgCurs->get_result();
        $imgCursData = $resultImgCurs->fetch_all(MYSQLI_ASSOC);
    
        $insertCurs = $this->conn->prepare("INSERT INTO img_cursos (img, id_curs) VALUES (?,?)");
        foreach($imgCursData as $row) {
            $insertCurs->bind_param("si", $row["img"], $ultimaId);
            $insertCurs->execute();
        }
        // HORARIS
        $selectHorarios = $this->conn->prepare("SELECT * FROM horarios WHERE id_curs = ?");
        $selectHorarios->bind_param("i", $id_curs);
        $selectHorarios->execute();
        $resultHorarios = $selectHorarios->get_result();
        $horariosData = $resultHorarios->fetch_all(MYSQLI_ASSOC);

        $insertCurs = $this->conn->prepare("INSERT INTO horarios (id_dia_semana, id_franja, id_curs, id_contingut) VALUES (?,?,?,?)");
        foreach($horariosData as $row) {
            $insertCurs->bind_param("iiii", $row["id_dia_semana"], $row["id_franja"], $ultimaId, $row["id_contingut"]);
            $insertCurs->execute();
        }
        // CONTINGUTS
        $selectCursContingut = $this->conn->prepare("SELECT * FROM curs_contingut WHERE id_curs = ?");
        $selectCursContingut->bind_param("i", $id_curs);
        $selectCursContingut->execute();
        $resultCursContingut = $selectCursContingut->get_result();
        $cursContingutData = $resultCursContingut->fetch_all(MYSQLI_ASSOC);
    
        $insertCurs = $this->conn->prepare("INSERT INTO curs_contingut (id_curs, id_contingut) VALUES (?,?)");
        foreach($cursContingutData as $row) {
            $insertCurs->bind_param("ii", $ultimaId, $row["id_contingut"]);
            $insertCurs->execute();
        }
    }
}