<?php

include ('../../Model/Reserva/ModelReservasTotals.php'); 

$result = new ReservasTotals($conn);

$reservas = $result->mostrar_resrves();

if($reservas){
    $div_reservas = "";
    while($reserva=$reservas->fetch_assoc()) {
        $email = $reserva["email"];
        $dni = $reserva["dni"];
        $num_telefonic = $reserva["numero_telefono"];
        $nom = $reserva["nom"];
        $cognom = $reserva["cognom"];
        $nomCurs = $reserva["nom_curs"];
        $id_reserva = $reserva["id_reserva"];
        $nom_usuari=$reserva["username"];

        $div_reservas .= '
        <div class="curs col-sm-6 mx-auto" onclick="mostrar_dades(\'confirmacion_'.$id_reserva.'\') id=reserva_'.$id_reserva.'">
            <h2 class="titol_curs">Reservat per '.$nom_usuari.'</h2>
            <br>
            <p> ID Reserva: '.$id_reserva.'</p>
            <p> Curs Reservat: '.$nomCurs.'</p>

            <p id="dades_text" style="display:none;">Dades usuari</p>
            <p id="nom_text"><input type="hidden" id="nom" value="'.$nom.'"></p>
            <p id="cognom_text"><input type="hidden" id="cognom" value="'.$cognom.'"></p>
            <p id="dni_text"><input type="hidden" id="dni" value="'.$dni.'"></p>
            <p id="email_text"><input type="hidden" id="email" value="'.$email.'"></p>
            <p id="num_telefonic_text"><input type="hidden" id="num_telefonic" value="'.$num_telefonic.'"></p>
        </div> <br>
      ';
}
echo $div_reservas;

}

mysqli_close($conn);
?>

