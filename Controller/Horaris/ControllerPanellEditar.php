<?php

include ('../../Model/Horaris/ModelPanellEditar.php'); 

$mostrarCursos = new ModelPanellEditar($conn);

$IDHorari = $_GET["id"];

$result = $mostrarHorari->mostrarHorari($IDHorari);
// Declarem la variable $div_cusos com a una cadena de string buïda
$div_horari = "";
// Fem un bucle per que creï aquesta estructura HTML per a cada horari existent a la taula horari
while($row=$result->fetch_assoc()) {
    $desc = $row["id_franja"];
    $dataInici = $row["id_curs"];
    $dataFi = $row["id_contingut"];
    $preu = $row["preu"];
    $placesDisponibles = $row["placesDisponibles"];

    $div_horari .= '
        <div class="input-group mb-3">
            <input type="text" name="nom_curs" class="form-control" placeholder="Nom del curs" aria-label="Nom del curs" aria-describedby="basic-addon2" value="'.$nomCurs.'">
        </div>

        <div class="input-group mb-3">
            <textarea name="curs_descripcio" class="form-control" placeholder="Descripció del curs" aria-label="Descripció del curs" aria-describedby="basic-addon2">'.$desc.'</textarea>
        </div>
        
        <div class="input-group mb-3">
            <input type="date" name="data_inici" class="form-control" placeholder="dd-mm-yyyy" aria-label="Data Inici" aria-describedby="basic-addon2" value="'.$dataInici.'">
        </div>

        <div class="input-group mb-3">
            <input type="date" name="data_fi" class="form-control" placeholder="dd-mm-yyyy" aria-label="Data Fi" aria-describedby="basic-addon2" value="'.$dataFi.'">
        </div>

        <div class="input-group mb-3">
            <input type="text" name="placesDisponibles" class="form-control" aria-label="Places disponibles" aria-describedby="basic-addon2" value="'.$placesDisponibles.'">
        </div>

        <div class="input-group mb-3">
            <input type="text" name="preu" class="form-control" placeholder="Preu" aria-label="Preu" aria-describedby="basic-addon2" value="'.$preu.'">
        </div>';
}
echo $div_horari;
?>